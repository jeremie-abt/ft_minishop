<?php
include_once '../bdd/bdd_connec.php';
if (isset($_POST['submit']))
{
  $id = $_POST['submit'];
  $sql = "UPDATE users SET admin=1 WHERE user_id='$id';";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $row['admin'] = 1;
  header("Location: index.php?promote=success");
}
