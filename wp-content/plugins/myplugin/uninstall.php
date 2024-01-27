<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    header("Location:/Plugins/Plugin1");  // root folder mein redirect karwane ke liye
    die();
}

// deleting the table

global $wpdb, $table_prefix;
$wp_emp = $table_prefix . 'emp';

// query for deleting
$q = "DROP TABLE `$wp_emp`";

$wpdb->query($q);
?>