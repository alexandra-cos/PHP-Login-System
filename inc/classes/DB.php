<?php
  //if there is no constant defined called _CONFIG_, do not load this file
  if(!defined('_CONFIG_')){ //additional security because of db login info
    exit('You do not have a config file.');
  }

  class DB {
    protected static $con;

    private function __construct() {
      try {
        self::$con = new PDO( 'mysql:host=localhost:3308;dbname=login_system', 'alexandra', 'databasePass312');
        self::$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        self::$con->setAttribute( PDO::ATTR_PERSISTENT, false );

      } catch (PDOException $e) {
        echo "Could not connect to database."; exit;
      }
    }

    public static function getConnection() {
      //if this instance has not been started, start it
      if (!self::$con) {
        new DB();
      }
      //return the writeable db connection
      return self::$con;
    }
  }

?>
