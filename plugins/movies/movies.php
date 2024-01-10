<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also app all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 * @package           Movies
 *
 * @wordpress-plugin
 * Plugin Name:       Movies
 * Plugin URI:
 * Description:       Movie custom post type
 * Version:           1.0.0
 * Author:            Josip Mucak
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

use movies\MoviesCore;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MOVIES_LOCAL_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

require_once __DIR__ . '/vendor/autoload.php';

$core = new MoviesCore();
$core->load();
