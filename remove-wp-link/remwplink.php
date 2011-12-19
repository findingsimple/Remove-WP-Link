<?php
/*
Plugin Name: Remove WP Link from Admin Bar
Plugin URI: http://findingsimple.com/
Description: Simply removes the WP link and dropdown from the admin bar in 3.3.
Version: 0.1
Author: Finding Simple
Author URI: http://findingsimple.com/
License: GPL2

Copyright 2011  Finding Simple  (email : michael@findingsimple.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function remInit() {
	global $wp_version;
	if (version_compare($wp_version, '3.3', '<')) {
		exit('This plugin requires WP 3.3 or higher.');
	}
}
register_activation_hook( __FILE__, 'remInit' );

function remWPLink() {
	global $wp_version;
	if (version_compare($wp_version, '3.3', '>=')) {
		if(has_action('admin_bar_menu'))
			remove_action('admin_bar_menu', 'wp_admin_bar_wp_menu');
	}
}
add_action('init', 'remWPLink');

?>