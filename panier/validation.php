<?php
session_start();
include_once '../bdd/bdd_connec.php';
echo '<p>Vous etes sur le point de commander :<br></p>';
if($_SESSION['panier'])
{
  foreach ($_SESSION['panier'] as $v)
  {
    $sql = "SELECT * FROM article WHERE article_id='$v';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($row = mysqli_fetch_assoc($result))
    {
      echo '<p>'.$row['title'].'<br></p>';
    }
  }
}
?>
<form action="commande.php" method="POST">
<button type="submit" name="submit" value="valid">Commander</button>
</form>