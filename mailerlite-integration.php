<?php
/*
Plugin Name: MailerLite integration
Plugin URI: http://hccoder.info/
Description: Integrate MailerLite(mailerlite.com) into your website, use widget or shortcode to create subscribe forms.
Author: hccoder - Sándor Fodor
Version: 1.0
Author URI: http://hccoder.info/
*/

require ABSPATH.'wp-content/plugins/mailerlite-integration/classes/config.php';
require ABSPATH.'wp-content/plugins/mailerlite-integration/classes/shortcode.php';
require ABSPATH.'wp-content/plugins/mailerlite-integration/classes/mailerlite-admin.php';

/* Set default variables if needed */
HCCoder_MailerLiteAdmin::setDefaults();

/* Set base configuration */
$config = HCCoder_MailerLiteConfig::getInstance();

$config->addItem('plugin_id', 'mailerlite-integration');
$config->addItem('plugin_configuration_id', 'mailerlite-integration-configuration');
$config->addItem('plugin_shortcode_id', 'mailerlite-integration-shortcode');
$config->addItem('plugin_help_id', 'mailerlite-integration-help');

$config->addItem('plugin_path', plugin_dir_path(__FILE__));
$config->addItem('views_path', $config->getItem('plugin_path').'views/');

$config->addItem('plugin_url', home_url('/wp-admin/admin.php?page='.$config->getItem('plugin_id')));
$config->addItem('plugin_configuration_url', home_url('/wp-admin/admin.php?page='.$config->getItem('plugin_configuration_id')));
$config->addItem('plugin_shortcode_url', home_url('/wp-admin/admin.php?page='.$config->getItem('plugin_shortcode_id')));
$config->addItem('plugin_help_url', home_url('/wp-admin/admin.php?page='.$config->getItem('plugin_help_id')));

$config->addItem('plugin_handler_url', home_url('/wp-content/plugins/'.$config->getItem('plugin_id').'/handler.php'));


/**
 * Create admin menus
 */
function mailerlite_integration_admin_menu() {
  $config = HCCoder_MailerLiteConfig::getInstance();
  
  add_menu_page('MailerLite', 'MailerLite', 'level_10', $config->getItem('plugin_id'), array('HCCoder_MailerLiteAdmin', 'adminIndex'), home_url('/wp-content/plugins/'.$config->getItem('plugin_id').'/static/images/icon.jpg'));
  add_submenu_page($config->getItem('plugin_id'), 'Configuration', 'Configuration', 'level_10', $config->getItem('plugin_configuration_id'), array('HCCoder_MailerLiteAdmin', 'adminConfiguration'));
  add_submenu_page($config->getItem('plugin_id'), 'Shortcode', 'Shortcode', 'level_10', $config->getItem('plugin_shortcode_id'), array('HCCoder_MailerLiteAdmin', 'adminShortcode'));
  add_submenu_page($config->getItem('plugin_id'), 'Help', 'Help', 'level_10', $config->getItem('plugin_help_id'), array('HCCoder_MailerLiteAdmin', 'adminHelp'));
}
add_action('admin_menu', 'mailerlite_integration_admin_menu');

/**
 * Create shortcode
 */
add_shortcode('mailerlite', array('HCCoder_MailerLiteShortcode', 'frontendIndex'));