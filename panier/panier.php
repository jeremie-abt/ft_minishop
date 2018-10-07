<?php
session_start();
if (isset($_POST['submit']))
{
  if ($_POST['submit'] === "reset")
  {
    unset($_SESSION['panier']);
    header("Location: ../index.php?empty");
    exit();
  }
  elseif ($_POST['submit'] === "OK")
  {
    if ($_SESSION['loggued_on_user'])
    {
      header("Location: validation.php");
      exit();
    }
    else
    {
      header("Location: login.html");
      exit();
    }
  }
  else
  {
    if (!isset($_SESSION['panier']))
      $_SESSION['panier'] = Array();
    $_SESSION['panier'][] = $_POST['submit'];
    header("Location: ../index.php?adding=success");
    exit();
  }
}
else {
  header("Location: ../index.php?adding=error");
  exit();
}
?>