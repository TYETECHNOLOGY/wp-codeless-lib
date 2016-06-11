<?php
/**
 * Codeless Library.
 * An helper library with functionalities that are common among my WP projects.
 *
 * Copyright (c) 2016 Alessandro Tesoro
 *
 * Codeless Library is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Codeless Library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * @author     Alessandro Tesoro
 * @version    1.0.0
 * @copyright  (c) 2016 Alessandro Tesoro
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU LESSER GENERAL PUBLIC LICENSE
 * @package    wp-codeless-lib
*/

namespace TDP;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Codeless Class
 * @since 1.0.0
 */
class Codeless {

	/**
	 * Whether or not this site is in debug mode.
	 * @return boolean
	 */
	public static function is_development() {
		return ( defined( 'WP_DEBUG' ) && WP_DEBUG );
	}

	/**
	 * Whether or not this site is in script and debug mode.
	 * @return boolean
	 */
	public static function is_script_debug() {
		return self::is_development() && ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG );
	}

}
