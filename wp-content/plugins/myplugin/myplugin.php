<?php
/*
Plugin Name: MY Plugin
Description: This is my first plugin.
Version: 1.0;
Author:Pranay
Author URI:https://pranayjain099.github.io/Mywebsite/
*/

if (!defined("ABSPATH")) {
    header("Location:/Plugin_1");  // Redirect to root folder 
    die();
}


// function of activation hook
function my_plugin_activation()
{
    // to communicate with database we use variable "wpdb".
    global $wpdb, $table_prefix;
    $wp_emp = $table_prefix . 'emp';

    // now generating query
    $q = "CREATE TABLE IF NOT EXISTS`$wp_emp` (`ID` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `email` VARCHAR(100) NOT NULL , `status` BOOLEAN NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";

    // now executing it.
    $wpdb->query($q);

    // insert the data 
    $data = array(
        'name' => 'Astha',
        'email' => 'pranayjain2001@gmail.com',
        'status' => 1
    );

    // executing it 
    $wpdb->insert($wp_emp, $data);  // here insert is inbuilt function which takes two parameter

}

// Activation hook 
register_activation_hook(__FILE__, 'my_plugin_activation');

// function of deactivation hook
function my_plugin_deactivation()
{
    global $wpdb, $table_prefix;
    $wp_emp = $table_prefix . 'emp';

    $q = "TRUNCATE`$wp_emp`";
    $wpdb->query($q);

}
register_deactivation_hook(__FILE__, 'my_plugin_deactivation');

// Shortcode
function my_sc_fun($atts)
{
    // Converting all the key input by user in lower case and storing it in same array.

    $atts = array_change_key_case($atts, CASE_LOWER);

    $default_atts = array('name' => 'Chotu', 'age' => '90');

    $atts = shortcode_atts($default_atts, $atts);

    ob_start();
    ?>
    <h2> Incluing Content from Html Tag </h2>
    <?php
    $myHtmlContent = ob_get_clean();
    include 'img_gallery.php';
    return "Hello " . $atts['name'] . " your age is " . $atts['age'] . $myHtmlContent;


}
add_shortcode('my-sc', 'my_sc_fun');


// Adding scripts and styles

function my_scripts()
{
    $path_js = plugins_url('js/main.js', __FILE__);
    $dep = array('jquery');
    $ver_js = filemtime(plugin_dir_path(__FILE__) . 'js/main.js');

    $is_login = is_user_logged_in() ? 1 : 0;   // if logged in then 1 else 0.

    wp_add_inline_script('my_custom_js', 'var is_login = ' . $is_login . ';', 'before');

    // Add this script only in home page.
    if (is_page('home')) {
        wp_enqueue_script('my_custom_js', $path_js, $dep, $ver_js, true);
    }
}
add_action('wp_enqueue_scripts', 'my_scripts');


?>