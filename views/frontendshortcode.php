<div id="mailerlite-subscribe-form">
  
  <?php if ( isset($_GET['error']) ) { ?>
    <div id="mailerlite-subscribe-form-errors">
      <?php if ( isset($_GET['error']) && $_GET['error'] == 1 ) { ?>
        <p class="mailerlite-subscribe-form-error"><?php echo $_GET['message']; ?></p>
      <?php } elseif ( isset($_GET['error']) && $_GET['error'] == 0 ) { ?>
        <p class="mailerlite-subscribe-form-success"><?php echo $_GET['message']; ?></p>
      <?php } ?>
    </div><!-- #mailerlite-subscribe-form-errors -->
  <?php } ?>
  
  <form method="post" action="<?php echo $config->getItem('plugin_handler_url'); ?>">
    <p>
      <?php if ( ! isset($atts['email_label']) ) { ?>
        <label for="mailerlite-subscribe-username">E-mail*</label>
      <?php } ?>
      <input type="text" name="email" id="mailerlite-subscribe-username" class="mailerlite-subscribe-input" value="<?php echo isset($atts['email_value']) ? $atts['email_value'] : ''; ?>" />
    </p>
    <?php if ( ! isset($atts['disable_name']) ) { ?>
      <p>
        <?php if ( ! isset($atts['name_label']) ) { ?>
          <label for="mailerlite-subscribe-name">Name</label>
        <?php } ?>
        <input type="text" name="name" id="mailerlite-subscribe-name" class="mailerlite-subscribe-input" value="<?php echo isset($atts['name_value']) ? $atts['name_value'] : ''; ?>" />
      </p>
    <?php } ?>
    <p>
      <input type="hidden" name="return_url" value="<?php echo isset($atts['return_url']) ? $atts['return_url'] : 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" />
      <input type="hidden" name="embed_url" value="<?php echo isset($_GET['embed_url']) ? $_GET['embed_url'] : 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" />
      <input type="hidden" name="for_bots" value="0" />
      <input type="hidden" name="action" value="subscribe" />
      <?php if ( isset($atts['group']) ) { ?>
        <input type="hidden" name="group" value="<?php echo $atts['group']; ?>" />
      <?php } else { ?>
        <input type="hidden" name="group" value="<?php echo get_option('mailerlite_default_group'); ?>" />
      <?php } ?>
      <input type="submit" id="mailerlite-subscribe-submit" class="mailerlite-subscribe-submit" value="<?php echo isset($atts['submit_value']) ? $atts['submit_value'] : 'Subscribe'; ?>" />
    </p>
  </form>
  
</div><!-- #mailerlite-subscribe-form -->