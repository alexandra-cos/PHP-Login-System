<?php
  //if there is no constant defined called _CONFIG_, do not load this file
  if(!defined('_CONFIG_')){
    exit('You do not have a config file.');
  }

  //sessions are always turned on
  if(!isset($_SESSION)) {
    session_start();
  }

  //our config is below
  //allow errors
  error_reporting(-1);
  ini_set('display_errors', 'On');

  //include the DB.php file
  include_once "classes/DB.php";
  include_once "classes/Filter.php";
  include_once "functions.php";
  $con = DB::getConnection();

?>
