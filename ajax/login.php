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

    //Make sure user does not exist.
    $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = LOWER(:email) LIMIT 1");
    $findUser->bindParam('email', $email, PDO::PARAM_STR);
    $findUser->execute();

    if($findUser->rowCount() == 1){
      //user exists. try and sign them in
      $User = $findUser->fetch(PDO::FETCH_ASSOC);

      $user_id = (int) $User['user_id'];
      $hash = $User['password'];

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
