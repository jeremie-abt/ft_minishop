<?php
/*session_start();
include_once '../bdd/bdd_connec.php';
if(isset($_POST['submit']) && isset($_SESSION['loggued_on_user']))
{
  // ajouter la transaction
  $username_session = $_SESSION['loggued_on_user'];
  $sql = "SELECT user_id FROM users WHERE username='$username_session'";
  $req = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($req);
  $user_id = $row['user_id'];
  echo "user_id : $user_id";
  $sql = "INSERT INTO transaction (user_id, article_id) VALUES ($user_id)";
  print_r($sql);
  exit ();
  //INSERT INTO users (firstname, lastname, username, passwd) VALUES ('$first_name', '$last_name', '$user_name', '$pass_wd')";
  unset($_SESSION['panier']);
  header("Location: ../index.php?comand=success");
  exit();
}
else {
  header("Location: ../template/login.html?error=not_logged");
  exit();
}*/
?>
