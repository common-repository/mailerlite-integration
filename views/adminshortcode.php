<div class="wrap">
  <h2>MailerLite - Shortcode</h2>
  
  <p>
    If you need help visit the <a href="<?php echo $config->getItem('plugin_help_url'); ?>" title="MailerLite Help">Help</a> page.
  </p>
  
  <?php if ( ! class_exists('soapclient') ) { ?>
    <div class="updated" id="message">
		  <p><strong>Required PHP SoapClient class not found, contact your system administrator to fix this problem.</strong></p>
		</div>
  <?php } else { ?>
  
    <?php if ( get_option('mailerlite_api_key') == FALSE ) { ?>
      <div class="updated" id="message">
        <p><strong>Before using MailerLite shortcode you need to enter you API key at the <a href="<?php echo $config->getItem('plugin_configuration_url'); ?>" title="Configuration page">configuration page</a>.</strong></p>
      </div>
    <?php } else { ?>
    
      <h3>Subscribe form with default group</h3>
      <?php if ( get_option('mailerlite_default_group') == FALSE ) { ?>
        <div class="updated" id="message">
          <p><strong>Currently you cannot use this solution, because you did not set your default group, go to the <a href="<?php echo $config->getItem('plugin_configuration_url'); ?>" title="Configuration page">configuration page</a> to fix this.</strong></p>
        </div>
      <?php } else { ?>
        <p>
          [mailerlite]<br />
          <strong>Output:</strong><br />
          <?php echo do_shortcode('[mailerlite]'); ?>
        </p>
      <?php } ?>
      
      <h3>Subscribe form without default group</h3>
      <p>
        [mailerlite group="yourgroupid"]<br />
        <strong>Output:</strong><br />
        <?php echo do_shortcode('[mailerlite group="yourgroupid"]'); ?>
      </p>
      
      <h3>Subscribe form without name field</h3>
      <p>
        [mailerlite group="yourgroupid" disable_name=1]<br />
        <strong>Output:</strong><br />
        <?php echo do_shortcode('[mailerlite group="yourgroupid" disable_name=1]'); ?>
      </p>
      
      <h3>Subscribe form with custom values</h3>
      <p>
        [mailerlite group="yourgroupid" email_label=0 email_value="Your E-mail..." name_label=0 name_value="Your Name..." submit_value="Subscribe now!"]<br />
        <strong>Output:</strong><br />
        <?php echo do_shortcode('[mailerlite group="yourgroupid" email_label=0 email_value="Your E-mail..." name_label=0 name_value="Your Name..." submit_value="Subscribe now!"]'); ?>
      </p>
      
    <?php } ?>
  <?php } ?>
</div><!-- .wrap -->