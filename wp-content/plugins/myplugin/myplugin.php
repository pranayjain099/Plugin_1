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
    $path_style = plugins_url('css/style.css', __FILE__);

    $dep = array('jquery');

    $ver_style = filemtime(plugin_dir_path(__FILE__) . 'css/style.css');
    $ver_js = filemtime(plugin_dir_path(__FILE__) . 'js/main.js');

    $is_login = is_user_logged_in() ? 1 : 0;   // if logged in then 1 else 0.

    wp_enqueue_style('my-custom-css', $path_style, '', $ver_style);

    wp_add_inline_script('my-custom-js', 'var is_login = ' . $is_login . ';', 'before');

    // Add this script only if the slug is home page not title slug you can check slug by clicking on quick edits.
    if (is_page('home')) {
        wp_enqueue_script('my-custom-js', $path_js, $dep, $ver_js, true);
    }

}
add_action('wp_enqueue_scripts', 'my_scripts');


// Retrieve data

function retrieve_fn()
{
    global $wpdb, $table_prefix;
    $wp_emp = $table_prefix . 'emp';

    $q = "SELECT * FROM `$wp_emp`";
    $results = $wpdb->get_results($q);

    ob_start();
    ?>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($results as $row):
                ?>
                <tr>
                    <td>
                        <?php echo $row->ID; ?>
                    </td>
                    <td>
                        <?php echo $row->name; ?>
                    </td>
                    <td>
                        <?php echo $row->email; ?>
                    </td>
                    <td>
                        <?php echo $row->status; ?>
                    </td>
                </tr>
                <?php
            endforeach;
            ?>
        </tbody>
    </table>

    <?php

}
add_shortcode('retrieve', 'retrieve_fn');

function my_posts()
{
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3, // Number of posts you want to display
        'offset' => 2, // Will skip/offset the first 2 posts and start retrieving posts from the third post onwards.
        'orderby' => 'ID',  // jo post sabse pehle banai uski id 1 then order wise
        'order' => 'ASC',
        // 'tag' => 'Birthday'


    );
    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()):
        ?>
        <ul>
            <?php
            while ($query->have_posts()) {
                $query->the_post();  // this will retrieve one post at a time
                echo '<li>' . get_the_title() . ' -> ' . get_the_content() . '</li>';
            }
            ?>
        </ul>
        <?php
    endif;
    $html = ob_get_clean();
    return $html;
}

add_shortcode('my-posts', 'my_posts');




?>