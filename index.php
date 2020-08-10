<?php
  //allow the config
  define('_CONFIG_', true);
  //require the config
  require_once "inc/config.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow">

    <title>Page Title</title>

    <base href="/" />
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/css/uikit.min.css" />
  </head>

  <body>

    <div class="uk-section uk-container">
      <?php
        echo "Hello world! Today is: ";
        echo date("Y m d");
      ?>
      <p>
        <a href="php_login_system/login.php">Login</a>
        <a href="php_login_system/register.php">Register</a>
      </p>
    </div>

    <?php require_once "inc/footer.php" ?>
  </body>

</html>
