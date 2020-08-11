<?php

  //force the user to be logged in or redirect
  function ForceLogin() {
    if(isset($_SESSION['user_id'])) {
      //the user is allow here
    } else {
      //the user is not allowed here
      header("Location: /php_login_system/login.php"); exit;
    }
  }

  function ForceDashboard() {
    if(isset($_SESSION['user_id'])) {
      //the user is allow here but redirect anyway
      header("Location: /php_login_system/dashboard.php"); exit;
      echo $_SESSION['user_id'];
    } else {
      //the user is not allowed here
    }
  }
?>
