<?php
/*
Plugin Name: Seed Top Bar
Plugin URI: https://wordpress.org/plugins/seed-top-bar/
Description: A plugin for Add top bar on WordPress Site.
Version: 0.0.9
Author: K @ Seed Webs
Author URI: https://seedwebs.com/
License: GPL2
Text Domain: seed-top-bar
*/

/*
Copyright 2016-2020 Seed Webs Co., Ltd.  (email : info@seedwebs.com)

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

if(!class_exists('Seed_Top_Bar')) {
    class Seed_Top_Bar {

        /**
         * Construct the plugin object
         */
        public function __construct() {
            // register actions
        } 
    
        /**
         * Activate the plugin
         */
        public static function activate() {
            // Do nothing
        }
    
        /**
         * Deactivate the plugin
         */     
        public static function deactivate() {
            // Do nothing
        }
    }
}

if(class_exists('Seed_Top_Bar')) {
    // Installation and uninstallation hooks
    register_activation_hook(__FILE__, array('Seed_Top_Bar', 'activate'));
    register_deactivation_hook(__FILE__, array('Seed_Top_Bar', 'deactivate'));

    // instantiate the plugin class
    $Seed_Top_Bar = new Seed_Top_Bar();
}

add_action('wp_head', 'seed_top_bar_scripts');

function seed_top_bar_scripts() {
    ?>
        test top bar
    <?php
}


add_action( 'admin_menu', 'seed_top_bar_setup_menu' );

function seed_top_bar_setup_menu() {
	$seed_top_bar_page = add_submenu_page ( 'themes.php', __( 'Seed Top Bar', 'seed-top-bar' ), __( 'Top Bar', 'seed-top-bar' ), 'manage_options', 'seed-top-bar', 'seed_top_bar_init' );

    add_action( 'load-' . $seed_font_page, 'seed_top_bar_admin_styles' );
}

function seed_top_bar_admin_styles() {
	wp_enqueue_style( 'seed-top-bar', plugin_dir_url( __FILE__ ) . 'seed-top-bar-admin.css' , array(), '2020-1' );
	wp_enqueue_script( 'seed-top-bar', plugin_dir_url( __FILE__ ) . 'seed-top-bar-admin.js' , array( 'jquery', 'jquery-ui-tabs' ), '2018-1', true );
}

function seed_top_bar_init() { 

    echo 'test setting page';
}




