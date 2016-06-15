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
	 * Includes path.
	 *
	 * @var string
	 */
	private $includes_path = '';

	/**
	 * Get thing started.
	 */
	public function __construct() {

		// Set includes path.
		$this->includes_path = untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/includes/';

		spl_autoload_register( array( $this, 'autoload' ) );

	}

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

	/**
	 * Shows an admin notice.
	 *
	 * @param  string $type   the type of message accepted types are success, error, warning, info.
	 * @param  string $text   the content of the message.
	 * @param  string $id     optional ID, if passed, notice will be sticky.
	 */
	public static function show_admin_notice( $content, $type, $id = '' ) {
		new \TDP\Notice( $type, $content, $id );
	}

	/**
	 * Adds an action link for the specified plugin into the plugin's page.
	 *
	 * @param string $plugin_slug the slug of the plugin.
	 * @param string $label       the label of the link.
	 * @param string $link        the link.
	 */
	public static function add_plugin_action_link( $plugin_slug, $label, $link ) {

		$link  = esc_html( $link );
		$label = esc_html( $label );

		add_filter( 'plugin_action_links_'.$plugin_slug, function( $links ) use ( $link, $label ) {

			if( ! empty ( $link ) && ! empty( $label ) ) {
				$custom_link = '<a href="'. $link .'">'. $label .'</a>';
				array_push( $links, $custom_link );
			}

			return $links;

		}, 10 );

	}

	/**
	 * Autoload classes.
	 *
	 * @since 1.0.0
	 * @param  string $class class to load.
	 * @return void.
	 */
	public function autoload( $class_name ) {

		// Autoload classes with this namespace.
		if ( false === strpos( $class_name, __NAMESPACE__ ) ) {
			return;
		}

		// Remove namespace from class name.
		$class_file = str_replace( __NAMESPACE__ . '\\', '', $class_name );

		// Convert class name to filename.
		$class_file = strtolower( $class_file );
		$class_file = str_replace( '_', '-', $class_file );

		// If there's any subnamespace convert that to a path.
		$class_path = explode( '\\', $class_file );
		$class_file = array_pop( $class_path );
		$class_path = implode( '/', $class_path );

		// Finally load the file.
		require_once $this->includes_path . $class_path . '/class-' . $class_file . '.php';

	}

}
