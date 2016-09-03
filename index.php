<?php
/*
Plugin Name: CFS - DateTime Add-on
Plugin URI: https://github.com/sectsect/cfs-datetime
Description: Add Powerful Datetimepicker field type for Custom Field Suite using flatpickr.js.
Author: SECT INTERACTIVE AGENCY
Version: 1.1.0
Author URI: https://www.ilovesect.com/
License: GPL2
*/

$cfs_date_time_addon = new cfs_datetime_picker_addon();

class cfs_datetime_picker_addon
{
    function __construct() {
        add_filter('cfs_field_types', array($this, 'cfs_field_types'));
		add_action('plugins_loaded', 'cfsdatetime_load_textdomain');
        function cfsdatetime_load_textdomain() {
			load_plugin_textdomain('cfs-datetime', false, plugin_basename(dirname(__FILE__)) . '/languages');
        }
    }

    function cfs_field_types($field_types) {
        $field_types['datetime_picker'] = dirname(__FILE__) . '/datetime.php';
        return $field_types;
    }
}
