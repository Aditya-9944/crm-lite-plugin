<?php
/**
<?php
/**
 * Plugin Name: CRM Lite
 * Plugin URI: https://yourwebsite.com/crm-lite
 * Description: A lightweight CRM plugin to manage customers and leads.
 * Version: 1.0
 * Author: Aditya Pratap Singh
 * Author URI: https://yourwebsite.com
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: crm-lite
 * Requires at least: 5.0
 * Tested up to: 6.8
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
