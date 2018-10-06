<?php
session_start();
if (isset($_POST['submit']))
{
  if ($_POST['submit'] === "vider")
  {
    $_SESSION['panier'] = array();
    header("Location: index.php?empty");
    exit();
  }
  elseif ($_POST['submit'] === "OK")
  {
    if ($_SESSION['login'])
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
    $_SESSION['panier'][] = $_POST['submit'];
    header("Location: /ft_minishop/index.php?adding=success");
    exit();
  }
}
else {
  header("Location: /ft_minishop/index.php?adding=error");
  exit();
}
?>