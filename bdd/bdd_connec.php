<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "mystas";
$dbName = "ft_minishop";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connexion failed\n");
}