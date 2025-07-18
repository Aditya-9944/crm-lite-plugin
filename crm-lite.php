<?php
/**
 * Plugin Name: CRM Lite
 * Description: A simple CRM plugin to collect leads and view them in the admin panel.
 * Version: 1.0
 * Author: Aditya Pratap Singh
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Create DB table on plugin activation
register_activation_hook(__FILE__, 'crm_lite_create_table');

function crm_lite_create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'crm_leads';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        message text NOT NULL,
        submitted_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
