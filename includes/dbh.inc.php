<?php
$dBServername = "localhost";
$dBUsername = "phpmyadminuser";
$dBPassword = "mypsw";
$dBName = "richDB";

// Create connection
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
