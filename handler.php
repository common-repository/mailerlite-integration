<?php
/**
 * Handling subscriptions
 */
 
if ( count($_POST) == 0 || ! isset($_POST['for_bots']) || $_POST['for_bots'] != 0 )
 exit;

require('../../../wp-load.php');
  
/**
 * Handle new subscription
 */
if ( isset($_POST['action']) && $_POST['action'] == 'subscribe' ) {
  $mailerlite = new soapclient('http://mailerlite.com/soapserver.php?wsdl');
  
  if ( isset($_POST['name']) )
    $result = $mailerlite->addSubscriber('N9XYF5toUKCS8qBvkjLqbDMm7MIdlR2e', $_POST['group'], $_POST['email'], $_POST['name']);
  else
    $result = $mailerlite->addSubscriber('N9XYF5toUKCS8qBvkjLqbDMm7MIdlR2e', $_POST['group'], $_POST['email'], '');
    
  echo '<pre>';
  print_r($result);
  
  $message = '';
  if ( $result->code == 0 )
    $message = 'message='.get_option('mailerlite_default_success_message').'&error=0';
  elseif ( $result->code == 1 )
    $message = 'message='.get_option('mailerlite_default_wrong_email').'&error=1';
    
  
  if ( strpos($_POST['embed_url'], '?') === FALSE )
    header('Location: '.$_POST['embed_url'].'?'.$message.'&embed_url='.$_POST['embed_url']);
  else
    header('Location: '.$_POST['embed_url'].'&'.$message.'&embed_url='.$_POST['embed_url']);
    
}