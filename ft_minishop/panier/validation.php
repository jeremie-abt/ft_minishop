<?php
session_start();
include_once '../bdd/bdd_connec.php';
echo '<p>Vous etes sur le point de commander :<br></p>';
$i = 0;
$tmp = array();
/*$tmp[0][0] = 0;
$tmp[0][2] = 0;
$tmp[0][1] = "yo";*/
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
        $tmp[$i][1] = $row['title'];
        $tmp[$i][0] = $v;
        $tmp[$i][2] = $row['prix'];
        $i++;
      }
  }
  print_r($tmp);
  foreach ($tmp as $k => $v)
  {
    if ($k !== 0)
    {
      $prix = $v[0] * $v[2];
      $total = $total + $prix;
      echo "<p>(".$v[0].'x) '.$v[1].' : '.$prix.'euros <br></p>';
    }
  }
  echo '<p>Total = '.$total.'e<br></p>';
}
?>
<form action="#" method="POST">
  <button type="submit" name="submit" value="command">Commander</button>
</form>
<form action="panier.php" method="POST">
  <button type="submit" name="submit" value="reset">Reset</button>
</form>


<?php
  
  if(isset($_POST['submit']) && $_POST['submit'] === "command" && isset($_SESSION['loggued_on_user']))
  {
    $username_session = $_SESSION['loggued_on_user'];
    $sql = "SELECT user_id FROM users WHERE username='$username_session'";
    $req = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($req);
    $user_id = $row['user_id'];
    foreach ($tmp as $elem) {
      $sql = "INSERT INTO transaction (user_id, article_id, nb_of_article) VALUES ($user_id, $elem[2], $elem[1])";
      echo "sql : $sql\n";
      exit();
    }
    exit ();
    //INSERT INTO users (firstname, lastname, username, passwd) VALUES ('$first_name', '$last_name', '$user_name', '$pass_wd')";
    unset($_SESSION['panier']);
    header("Location: ../index.php?comand=success");
    exit();
  }
  else if ($_POST['submit'] === "command"){
    header("Location: ../template/login.html?error=not_logged");
  exit();
  }
?>