<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "roooot";
$dbName = "minishop";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connexion failed\n");
}
