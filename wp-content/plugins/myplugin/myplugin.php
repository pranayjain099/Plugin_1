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

}

// Activation hook 
register_activation_hook(__FILE__, 'my_plugin_activation');

// function of deactivation hook
function my_plugin_deactivation()
{

}
register_deactivation_hook(__FILE__, 'my_plugin_deactivation');


?>