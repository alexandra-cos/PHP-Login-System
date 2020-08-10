<?php
  //allow the config
  define('_CONFIG_', true);
  //require the config
  require_once "../inc/config.php";


  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //always return JSON format
    header('Content-Type: application/json');

    $return = [];
    //Make sure user does not exist.

    //Make sure the user CAN be added AND is added

    //Return the proper information back to JavaScript to redirect us

    $return['redirect'] = '/dashboard.php';
    $return['name'] = "Alex Costache";

    echo json_encode($return, JSON_PRETTY_PRINT); exit;
  } else {
    //die. kill the script. redirect the user. do something regardless
    exit('test');
  }



?>
