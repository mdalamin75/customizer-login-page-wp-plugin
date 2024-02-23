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

    // Plugin Option Page Style
    function clpwp_add_theme_css(){
        wp_enqueue_style('clpwp_admin_style', plugins_url("/css/clpwp-admin-style.css", __FILE__), false, '1.0.0');
    }
    add_action('admin_enqueue_scripts', 'clpwp_add_theme_css');

    /*
    * Plugin Callback 
    */ 
    function clpwp_create_page(){
        ?>
        <div class="clpwp_main_area">
            <div class="clowo_body_area clpwp_common">
                <h3 id="title"><?php print esc_attr('Login Page Customizar');?></h3>
                <form action="options.php" metheod="post">
                    <?php wp_nonce_field('update-options');?>
                    <!-- Primary Color -->
                    <label for="clpwp-primary-color" name="clpwp-primary-color">
                        <?php print esc_attr('Primary Color');?>
                    </label>
                    <input type="color" name="clpwp-primary-color" value="<?php print get_option('clpwp-primary-color');?>">
                    <!-- Main Logo -->
                    <label for="clpwp-logo-image-url" name="clpwp-logo-image-url">
                        <?php print esc_attr('Upload your logo');?>
                    </label>
                    <input type="text" name="clpwp-logo-image-url" value="<?php print get_option('clpwp-logo-image-url');?>" placeholder="Past your Logo URL here">
                    <!-- Background Image -->
                    <label for="clpwp-custom-bg-image" name="clpwp-custom-bg-image">
                        <?php print esc_attr('Upload your background image');?>
                    </label>
                    <input type="text" name="clpwp-custom-bg-image" value="<?php print get_option('clpwp-custom-bg-image');?>" placeholder="Past your Background Image URL here">
                    <!-- Background Brightness -->
                    <label for="clpwp-custom-bg-brightness" name="clpwp-custom-bg-brightness">
                        <?php print esc_attr('Background Brightness');?>
                    </label>
                    <input type="number" name="clpwp-custom-bg-brightness" value="<?php print get_option('clpwp-custom-bg-brightness');?>" placeholder="Background Brightness">

                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="page_options" value="clpwp-primary-color, clpwp-logo-image-url, clpwp-custom-bg-image">
                    <input type="submit" name="submit" value="<?php _e('Save Changes', 'clpwp');?>" class="button button-primary">
                </form>
            </div>
            <div class="clpwp_sidebar_area clpwp_common">
                <h3 id="title"><?php print esc_attr('About Author');?></h3>
                <p>I'm <strong><a href="https://mdalamin.vercel.app/" target="_blank">MD.AL-AMIN</a></strong> a Front End Web developer who is passionate about making error-free websites with 100% client satisfaction. I have a passion for learning and sharing my knowledge with others as publicly as possible. I love to solve real-world problems.</p>
            </div>
        </div>
        <?php
    }
    
    // Loading css file
    function clpwp_login_enqueue_register(){
        wp_enqueue_style('clpwp_login_enqueue', plugins_url("/css/clpwp-styles.css", __FILE__), false, '1.0.0');
    }
    add_action('login_enqueue_scripts', 'clpwp_login_enqueue_register');

    // Changing Login form logo
    function clpwp_login_logo_change(){
        ?>
        <style>
            #login h1 a, .login h1 a {
                background-image: url(<?php print plugin_dir_url(__FILE__). '/img/logo-sm.png';?>);
            }
        </style>
        <?php
    }
    add_action('login_enqueue_scripts', 'clpwp_login_logo_change');

    // Changing Login form url
    function clpwp_login_logo_url_change(){
        return home_url();
    }
    add_filter('login_headerurl', 'clpwp_login_logo_url_change');

 ?>