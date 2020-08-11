<?php
  //allow the config
  define('_CONFIG_', true);
  //require the config
  require_once "../inc/config.php";


  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //always return JSON format
    //header('Content-Type: application/json');

    $return = [];

    $email = Filter::String($_POST['email']);
    $password = $_POST['password'];

    $user_found = User::Find($email, true);

    if($user_found){
      //user exists. try and sign them in
      $user_id = (int) $user_found['user_id'];
      $hash = (string) $user_found['password'];

      if(password_verify($password, $hash)){
        //user is signed in
        $return['redirect'] = 'php_login_system/dashboard.php';

        $_SESSION['user_id'] = $user_id;
      } else {
        //invalid user email/password combo
        $return['error'] = "Invalid user email/password combo";
      }

    } else {
      //user does not exist. they need to create a new account
      $return['error'] = "You do not have an account. <a href='php_login_system/register.php'>Create one now?</a>";

    }

    echo json_encode($return, JSON_PRETTY_PRINT); exit;
  } else {
    //die. kill the script. redirect the user. do something regardless
    exit('Invalid URL');
  }


?>
