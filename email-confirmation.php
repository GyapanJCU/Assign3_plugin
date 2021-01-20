<?php // Assign3-plugin

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
header('Content-Type: application/json');

    $aResult = array();

    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['functionname']) {
            case 'send':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 4) ) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   $aResult['result'] = send(string($_POST['arguments'][0]), string($_POST['arguments'][1]),
                  string($_POST['arguments'][2]),string($_POST['arguments'][3]));
               }
              break;
            case 'check':
                if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) {
                    $aResult['error'] = 'Error in arguments!';
                }
                else {
                    $aResult['result'] = check(string($_POST['arguments'][0]));
                }
              break;
 
            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }

    echo json_encode($aResult);

const PREFIX = 'email-confirmation-';

function send($to, $subject, $message, $headers)
{
   $token = sha512(uniqid());

   $oldData = get_option(PREFIX .'data') ?: array();
   $data = array();
   $data[$token] = $_POST;
   update_option(PREFIX .'data', array_merge($oldData, $data));

   wp_mail($to, $subject, sprintf($message, $token), $headers);
   return $token;
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