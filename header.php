<?php
// First we start a session which allow for us to store information as SESSION variables.
session_start();
// "require" creates an error message and stops the script. "include" creates an error and continues the script.
require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>DB Entreprise CASUD / SAT</title>
  <meta name="description" content="This is an atempt at the dead simple DB UI.">
  <meta name=viewport content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- Here is the header where I decided to include the login form for this tutorial. -->
  <header>
    <nav class="nav-header-main">
      <a class="header-logo" href="index.php">
        <img src="img/logoII.png" alt="mmtuts logo">
      </a>
      <ul>
        <li><a href="index.php">Recensement SAT</a></li>
        <!--<li><a href="#">Portfolio</a></li>
          <li><a href="#">About me</a></li>
          <li><a href="#">Contact</a></li>-->
      </ul>
    </nav>
    <div class="header-login">
      <!--
        Here is the HTML login form.
        Notice that the "method" is set to "post" because the data we send is sensitive data.
        The "inputs" I decided to have in the form include username/e-mail and password. The user will be able to choose whether to login using e-mail or username.

        Also notice that using PHP, we can choose whether or not to show the login/signup form, or to show the logout form, if we are logged in or not. We do this based on SESSION variables which I explain in more detail in the login.inc.php file!
        -->
      <?php
      if (!isset($_SESSION['id'])) {
        echo '
          <form action="includes/login.inc.php" method="post">
          <input type="text" name="mailuid" placeholder="E-mail/Username">
          <input type="password" name="pwd" placeholder="Password">
          <button type="submit" name="login-submit">Entrer</button>
          </form>';
        //<a href="signup.php" class="header-signup">Signup</a>';
      } else if (isset($_SESSION['id'])) {
        echo '
          <form action="includes/logout.inc.php" method="post">
          <button type="submit" name="login-submit">Déconnecter</button>
          </form>';
      }
      ?>
    </div>
  </header>