<?php
session_start();
include_once 'includes/dhb.inc.php';
if(isset($_POST['submit']))
{
  $_SESSION['panier'] = array();
  header("Location: index.php?comand=success");
  exit();
}
else {
  header("Location: index.php");
  exit();
}
?>