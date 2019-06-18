<?php
  // from https://www.youtube.com/watch?v=LC9GaXkdxF8
  // To make sure we don't need to create the header section of the website on multiple pages, we instead create the header HTML markup in a separate file which we then attach to the top of every HTML page on our website. In this way if we need to make a small change to our header we just need to do it in one place. This is a VERY cool feature in PHP!
require "header.php";
?>

<main>
  <div class="wrapper-main">
    <section class="section-default">
          <!--
          We can choose whether or not to show ANY content on our pages depending on if we are logged in or not. I talk more about SESSION variables in the login.inc.php file!
        -->
        <?php

        if ($_GET["login"] == "wronguidpwd") {
          echo '<p class="signuperror">Utilisateur inconnu</p> </BR>';
        }


        if (!isset($_SESSION['id'])) {

          // Here we create an error message if the user made an error trying to sign up.
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "invaliduidmail") {
              echo '<p class="signuperror">Remplissez les champs avant de cliquer sur "Entrer", svp</p> </BR>';
            }

            if (isset($_GET["error"])) {
              if ($_GET["error"] == "wrongpwd") {
                echo '<p class="signuperror">Mot de passe invalide</p> </BR>';
              }
            }

          }

          echo '<p class="login-status">Identifiez vous</BR>pour acceder à la base de données</p>';

        }


        else if (isset($_SESSION['id'])) {
         // echo '<p class="login-status">Vous êtes dedans !</p>';
         require "dbview.php";
        }


        ?>
      </section>
    </div>
  </main>

  <?php
  // And just like we include the header from a separate file, we do the same with the footer.
  require "footer.php";
  ?>
