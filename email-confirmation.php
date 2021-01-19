<?php // Assign3-plugin

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
const PREFIX = 'email-confirmation-';
function send($to, $subject, $message, $headers)
{
   $token = sha1(uniqid());

   $oldData = get_option(PREFIX .'data') ?: array();
   $data = array();
   $data[$token] = $_POST;
   update_option(PREFIX .'data', array_merge($oldData, $data));

   wp_mail($to, $subject, sprintf($message, $token), $headers);
}

 function check($token)
 {
   $data = get_option(PREFIX .'data');
   $userData = $data[$token];

   if (isset($userData)) {
     unset($data[$token]);
     update_option(PREFIX .'data', $data);
   }

   return $userData;
 }
 ?>