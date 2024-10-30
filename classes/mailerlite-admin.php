<?php
/**
 * Our main class
 */
if ( ! class_exists('HCCoder_MailerLiteAdmin') ) {
  class HCCoder_MailerLiteAdmin {
  
    /**
     * Admin interface > overview
     */
    public function adminIndex() {
      $config = HCCoder_MailerLiteConfig::getInstance();
      require $config->getItem('views_path').'adminindex.php';
    }
    
    /**
     * Admin interface > configuration
     */
    public function adminConfiguration() {
      $config = HCCoder_MailerLiteConfig::getInstance();
      
      /* Save configuration */
      if ( count($_POST) ) {
        
        if ( isset($_POST['mailerlite_api_key']) ) {
          update_option('mailerlite_api_key', $_POST['mailerlite_api_key']);
          $config_saved = TRUE;
        }
        
        if ( isset($_POST['mailerlite_default_group']) ) {
          update_option('mailerlite_default_group', $_POST['mailerlite_default_group']);
          $config_saved = TRUE;
        }
        
        if ( isset($_POST['mailerlite_default_success_message']) ) {
          update_option('mailerlite_default_success_message', $_POST['mailerlite_default_success_message']);
          $config_saved = TRUE;
        }
        
        if ( isset($_POST['mailerlite_default_wrong_email']) ) {
          update_option('mailerlite_default_wrong_email', $_POST['mailerlite_default_wrong_email']);
          $config_saved = TRUE;
        }
        
      }
      
      // MailerLite groups
      if ( get_option('mailerlite_api_key') != FALSE ) {
        if ( class_exists('soapclient') ) {
          $mailerlite = new soapclient('http://mailerlite.com/soapserver.php?wsdl');
          $groups = $mailerlite->getGroups(get_option('mailerlite_api_key'));
        }
      }
      
      require $config->getItem('views_path').'adminconfiguration.php';
    }
    
    /**
     * Admin interface > shortcode
     */
    public function adminShortcode() {
      $config = HCCoder_MailerLiteConfig::getInstance();
      require $config->getItem('views_path').'adminshortcode.php';
    }
    
    /**
     * Admin interface > help
     */
    public function adminHelp() {
      $config = HCCoder_MailerLiteConfig::getInstance();
      require $config->getItem('views_path').'adminhelp.php';
    }
    
    /**
     * Set default variables
     */
    public static function setDefaults() {
      if ( get_option('mailerlite_default_success_message') === FALSE )
        update_option('mailerlite_default_success_message', 'Thank you for subscribing our list!');
        
      if ( get_option('mailerlite_default_wrong_email') === FALSE )
        update_option('mailerlite_default_wrong_email', 'The E-mail address you entered is invalid!');
    }
    
  }
}