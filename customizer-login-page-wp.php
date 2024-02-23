<?php
    /**
     * Plugin Name:       Customizer Login Page
     * Plugin URI:        https://wordpress.org/plugins/customizer-login-page-wp/
     * Description:       The Customizer Login Page plugin will help you to enable a custom login page to your WordPress website.
     * Version:           1.0.0
     * Requires at least: 5.2
     * Requires PHP:      7.2
     * Author:            MD.AL-AMIN
     * Author URI:        https://mdalamin.vercel.app/
     * License:           GPL v2 or later
     * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
     * Text Domain:       clpwp
     */

    /*
    * Plugin Option Page Function
    */
    function clpwp_add_theme_page(){
        add_menu_page('Login Option for Admin', 'Login Option', 'manage_options', 'clpwp-plugin-option', 'clpwp_create_page', 'dashicons-unlock', 101);
    }
    add_action('admin_menu', 'clpwp_add_theme_page'); 

 ?>