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

    // if you want to insert the data two way

    // first way
    // $q1="INSERT INTO `$wp_emp` ( `name`, `email`, `status`) VALUES ('Pranay Jain', 'pranayjain2001@gmail.com', 1);";

    // second way
    $data = array(
        'name' => 'Astha',
        'email' => 'pranayjain2001@gmail.com',
        'status' => 1
    );

    // executing it
    $wpdb->insert($wp_emp, $data);

}

// Activation hook 
register_activation_hook(__FILE__, 'my_plugin_activation');

// function of deactivation hook
function my_plugin_deactivation()
{


}
register_deactivation_hook(__FILE__, 'my_plugin_deactivation');



?>