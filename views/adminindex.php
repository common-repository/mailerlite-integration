<div class="wrap">
  <h2>MailerLite</h2>
  
  <?php if ( ! class_exists('soapclient') ) { ?>
    <div class="updated" id="message">
		  <p><strong>Required PHP SoapClient class not found, contact your system administrator to fix this problem.</strong></p>
		</div>
  <?php } ?>
  
  <p>
    MailerLite is a powerfull E-mail marketing tool, with this plugin you can add subscribe forms in to your themes via widgets and shortcodes.
  </p>
  <p>
    First step is to configure you account. Go to the <a href="<?php echo $config->getItem('plugin_configuration_url'); ?>" title="Configuration">configuration page to set your credentials.</a>
  </p>
  <p>
    Second step is to add shortcode into your post, pages, sidebars. Go to the <a href="<?php echo $config->getItem('plugin_shortcode_url'); ?>" title="Shortcode">shortcode page to get shortcodes.</a>
  </p>
  <p>
    If you need help visit the <a href="<?php echo $config->getItem('plugin_help_url'); ?>" title="MailerLite Help">Help</a> page.
  </p>
</div><!-- .wrap -->