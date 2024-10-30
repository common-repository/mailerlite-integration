<div class="wrap">
  <h2>MailerLite - Configuration</h2>
  
  <p>
    If you need help visit the <a href="<?php echo $config->getItem('plugin_help_url'); ?>" title="MailerLite Help">Help</a> page.
  </p>
  
  <?php if ( ! class_exists('soapclient') ) { ?>
    <div class="updated" id="message">
		  <p><strong>Required PHP SoapClient class not found, contact your system administrator to fix this problem.</strong></p>
		</div>
  <?php } else { ?>
  
    <?php if ( isset($config_saved) && $config_saved === TRUE ) { ?>
      <div class="updated" id="message">
        <p><strong>Configuration updated.</strong></p>
      </div>
    <?php } ?>
    
    <h3>MailerLite API</h3>
    <form method="post" action="<?php echo $config->getItem('plugin_configuration_url'); ?>">
      <table class="form-table">
        <tbody>
          <tr class="form-field form-required">
            <th scope="row"><label for="mailerlite_api_key">API Key <span class="description">(required)</span></label></th>
            <td><input type="text" aria-required="true" value="<?php echo get_option('mailerlite_api_key'); ?>" id="mailerlite_api_key" name="mailerlite_api_key"></td>
          </tr>
        </tbody>
      </table>
      <p class="submit">
        <input type="submit" value="Save" class="button-primary" />
      </p>
    </form>
    
    <h3>Default group</h3>
    <p><i>If you set this option you don't have to specifiy the group ID in the shortcode.</i></p>
    <form method="post" action="<?php echo $config->getItem('plugin_configuration_url'); ?>">
      <table class="form-table">
        <tbody>
          <tr class="form-field form-required">
            <th scope="row"><label for="mailerlite_default_group">Group</label></th>
            <td>
              <select name="mailerlite_default_group">
                <option value="">No group selected</option>
                <?php foreach ( $groups['Groups'] as $g ) { ?>
                  <option <?php echo get_option('mailerlite_default_group') == $g->id ? 'selected="selected"' : ''; ?> value="<?php echo $g->id; ?>"><?php echo $g->name; ?>(<?php echo $g->total; ?>)</option>
                <?php } ?>
              </select>
            </td>
          </tr>
        </tbody>
      </table>
      <p class="submit">
        <input type="submit" value="Save" class="button-primary" />
      </p>
    </form>
    
    <h3>Messsages</h3>
    <form method="post" action="<?php echo $config->getItem('plugin_configuration_url'); ?>">
      <table class="form-table">
        <tbody>
          <tr class="form-field form-required">
            <th scope="row"><label for="mailerlite_default_success_message">After successful subscription</label></th>
            <td>
              <input type="text" aria-required="true" value="<?php echo get_option('mailerlite_default_success_message'); ?>" id="mailerlite_default_success_message" name="mailerlite_default_success_message">  
            </td>
          </tr>
          <tr class="form-field form-required">
            <th scope="row"><label for="mailerlite_default_wrong_email">Failed subscription, wron E-mail</label></th>
            <td>
              <input type="text" aria-required="true" value="<?php echo get_option('mailerlite_default_wrong_email'); ?>" id="mailerlite_default_wrong_email" name="mailerlite_default_wrong_email">  
            </td>
          </tr>
        </tbody>
      </table>
      <p class="submit">
        <input type="submit" value="Save" class="button-primary" />
      </p>
    </form>
  <?php } ?>
</div><!-- .wrap -->