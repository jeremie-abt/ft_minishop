<?php
session_start();
include_once '../bdd/bdd_connec.php';
echo '<p>Vous etes sur le point de commander :<br></p>';
$i = 0;
$tmp = array();
$tmp[0][0] = 0;
$tmp[0][1] = "yo";
$d = "nok";
if($_SESSION['panier'])
{
  foreach ($_SESSION['panier'] as $v)
  {
    $sql = "SELECT * FROM article WHERE article_id='$v';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $row['title'] = trim($row['title']);
      foreach ($tmp as $k => $ele)
      {
        $d = "nok";
        if ($ele[1] == $row['title'])
        {
          $tmp[$k][0] = $tmp[$k][0] + 1;
          $d = "ok";
          break;
        }
      }
      if ($d != "ok")
      {
        $i++;
        $tmp[$i][1] = $row['title'];
        $tmp[$i][0] = 1;
      }
  }
  foreach ($tmp as $k => $v)
  {
    if ($k !== 0)
    {
      echo '<p>'.$v[1]."______".$v[0].'x<br></p>';
    }
  }
}
?>
<form action="commande.php" method="POST">
<button type="submit" name="submit" value="valid">Commander</button>
</form>
