<?php

/*
 * Textpattern Content Management System
 * http://textpattern.com
 *
 * Copyright (C) 2014 The Textpattern Development Team
 *
 * This file is part of Textpattern.
 *
 * Textpattern is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation, version 2.
 *
 * Textpattern is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Textpattern. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Hashes and verifies a password.
 *
 * <code>
 * echo Txp::get('PasswordHash')->hash('password');
 * </code>
 *
 * @since   4.6.0
 * @package Password
 */

class Textpattern_Password_Hash extends Textpattern_Adaptable_Providable
{
	/**
	 * {@inheritdoc}
	 */

	public function getDefaultAdapter()
	{
		return new Textpattern_Password_Adapter_PasswordHash();
	}
}
