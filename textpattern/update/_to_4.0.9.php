<?php

/*
$HeadURL$
$LastChangedRevision$
*/

	if (!defined('TXP_UPDATE'))
	{
		exit("Nothing here. You can't access this file directly.");
	}

	$cols = getThings('describe `'.PFX.'txp_prefs`');
 	if (!in_array('user_name', $cols)) 
 	{
 	    // support for per-user prefs
		safe_alter('txp_prefs',
		"ADD `user_name` varchar(64) NOT NULL, DROP INDEX `prefs_idx`, ADD UNIQUE `prefs_idx` (`prefs_id`, `name`, `user_name`), ADD INDEX `user_name` (`user_name`)");
 	}

 	// remove a few global prefs in favour of future private ones. 
	safe_delete('txp_prefs', 
		"user_name = '' AND name in ('article_list_pageby', 'author_list_pageby', 'comment_list_pageby', 'file_list_pageby', 'image_list_pageby', 'link_list_pageby', 'log_list_pageby')");
 	
	// default event admin pref
	if (!safe_field('name', 'txp_prefs', "name = 'default_event'"))
	{
		safe_insert('txp_prefs', "prefs_id = 1, name = 'default_event', val = 'article', type = '1', event = 'admin', html = 'default_event', position = '150'");
	}
?>