<?php
    session_start();
    include_once '../bdd/bdd_connec.php';
    if (isset($_SESSION['loggued_on_user']))
        unset($_SESSION['loggued_on_user']);
    header("location: ../index.php");
?>