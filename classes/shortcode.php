<?php
/**
 * Shortcode class
 *
 * usage:
 * add_shortcode('your_shortcode_name', array('HCCoder_MailerLiteShortcode', 'frontendIndex'));
 */
if ( ! class_exists('HCCoder_MailerLiteShortcode') ) {

  class HCCoder_MailerLiteShortcode {
  
    public function frontendIndex($atts) {
      ob_start();
      
      $config = HCCoder_MailerLiteConfig::getInstance();
      
      require $config->getItem('views_path').'frontendshortcode.php';
      
      return ob_get_clean();
    }
  
  }
  
}