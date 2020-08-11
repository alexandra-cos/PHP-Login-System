<?php
  //if there is no constant defined called _CONFIG_, do not load this file
  if(!defined('_CONFIG_')){ //additional security because of db login info
    exit('You do not have a config file.');
  }

  class Page {
    //force the user to be logged in or redirect
    static function ForceLogin() {
      if(isset($_SESSION['user_id'])) {
        //the user is allow here
      } else {
        //the user is not allowed here
        header("Location: /php_login_system/login.php"); exit;
      }
    }

    static function ForceDashboard() {
      if(isset($_SESSION['user_id'])) {
        //the user is allow here but redirect anyway
        header("Location: /php_login_system/dashboard.php"); exit;
        echo $_SESSION['user_id'];
      } else {
        //the user is not allowed here
      }
    }

  }

?>
