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
    //Make sure user does not exist.
    $findUser = $con->prepare("SELECT user_id FROM users WHERE email = LOWER(:email) LIMIT 1");
    $findUser->bindParam('email', $email, PDO::PARAM_STR);
    $findUser->execute();

    if($findUser->rowCount() == 1){
      //user exists
      //we can also check to see if they are able to log in
      $return['error'] = "You already have an account.";
      $return['is_logged_in'] = false;
    } else {
      //user does not exist. add them now

      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $addUser = $con->prepare("INSERT INTO users(email, password) VALUES(LOWER(:email), :password)");
      $addUser->bindParam(':email', $email, PDO::PARAM_STR);
      $addUser->bindParam(':password', $password, PDO::PARAM_STR);
      $addUser->execute();

      $user_id = $con->lastInsertId();

      $_SESSION['user_id'] = (int) $user_id;

      $return['redirect'] = 'php_login_system/dashboard.php?message=welcome';
      $return['is_logged_in'] = true;
    }

    //Make sure the user CAN be added AND is added

    //Return the proper information back to JavaScript to redirect us

    //$return['redirect'] = 'php_login_system/dashboard.php'; //not sure
    //$return['name'] = "Alex Costache";

    echo json_encode($return, JSON_PRETTY_PRINT); exit;
  } else {
    //die. kill the script. redirect the user. do something regardless
    exit('Invalid URL');
  }



?>
