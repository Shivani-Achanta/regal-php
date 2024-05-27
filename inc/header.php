<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . "/../lib/Session.php";
Session::init();

spl_autoload_register(function ($classes) {

  include 'classes/' . $classes . ".php";
});

$users = new Users();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REGAL</title>
  <link rel="stylesheet" href="assets/bootstrap.min.css">
  <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
</head>

<body>


  <body>
    <?php

    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
      Session::destroy();
    }

    ?>


    <div class="container">

      <nav class="navbar navbar-expand-md navbar-dark bg-dark card-header">
        <a class="navbar-brand" href="index.php"><i class="fas fa-home mr-2"></i>REGAL</a>
        <button class="navbar-toggler" type="button" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav ml-auto">
            <?php if (Session::get('id') == TRUE) { ?>
              <li class="nav-item
            <?php

              $path = $_SERVER['SCRIPT_FILENAME'];
              $current = basename($path, '.php');
              if ($current == 'profile') {
                echo "active ";
              }

            ?>

            ">

                <button class="nav-link btn btn-link" onclick="window.location.href='profile.php?id=<?php echo Session::get("id"); ?>'"><i class="fab fa-500px mr-2"></i>Profile <span class="sr-only">(current)</span></button>
              </li>

              <li class="nav-item">
                <button class="nav-link btn btn-link" onclick="window.location.href='?action=logout'"><i class="fas fa-sign-out-alt mr-2"></i>Logout</button>
              </li>
            <?php } else { ?>

              <li class="nav-item
              <?php

              $path = $_SERVER['SCRIPT_FILENAME'];
              $current = basename($path, '.php');
              if ($current == 'register') {
                echo " active ";
              }

              ?>">
                <button class="nav-link btn btn-link" onclick="window.location.href='register.php'"><i class="fas fa-user-plus mr-2"></i>Register</button>
              </li>
              <li class="nav-item
              <?php

              $path = $_SERVER['SCRIPT_FILENAME'];
              $current = basename($path, '.php');
              if ($current == 'login') {
                echo " active ";
              }

              ?>">
                <button class="nav-link btn btn-link" onclick="window.location.href='login.php'"><i class="fas fa-sign-in-alt mr-2"></i>Login</button>
              </li>

            <?php } ?>


          </ul>

        </div>
      </nav>