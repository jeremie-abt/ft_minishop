<?php
include_once '../bdd/bdd_connec.php';
$id = $_POST['submit'];
print_r($_POST);
if (isset($_POST['modif']))
{
  if(!empty($_POST['titre']) && !empty($_POST['cate']) && !empty($_POST['desc']) && !empty($_POST['prix']) && !empty($_POST['img']))
  {
    if (preg_match("/[0-9]/", $_POST['prix']) && preg_match("/[0-9]/", $_POST['cate']))
    {
      $id = $_POST['modif'];
      $cate = mysqli_real_escape_string($conn, $_POST['cate']);
      $sql = "SELECT * FROM categories WHERE categories_id=$cate";
      $req = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($req);
      if ($resultCheck < 1)
      {
        header("Location: modif_article.php?badcategories");
        exit();
      }
      else {
        $titre = mysqli_real_escape_string($conn, $_POST['titre']);
        $desc = mysqli_real_escape_string($conn, $_POST['desc']);
        $prix = mysqli_real_escape_string($conn, $_POST['prix']);
        $img = mysqli_real_escape_string($conn, $_POST['img']);
        $sql = "UPDATE article SET categories_id='$cate',title='$titre',description='$desc',prix='$prix',img_path='$img' WHERE article_id='$id'";
        mysqli_query($conn, $sql);
        header("Location: index.php?modif=success");
        exit();
      }
    }
    else {
      header("Location: modif_article.php?wrongprice");
      exit();
    }
  }
  else {
    header("Location: modif_article.php?empty");
    exit();
  }
}
else
{
  $sql = "SELECT * FROM article WHERE article_id=$id";
  $req = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($req);
  ?>
  <form action="modif_article.php" method="post">
      <input type="text" name="cate" value="<?php echo $row['categories_id']?>"/><br>
      <input type="text" name="titre" value="<?php echo $row['title']?>"/><br>
      <input type="text" name="desc" value="<?php echo $row['description']?>"/><br>
      <input type="text" name="prix" value="<?php echo $row['prix']?>"/><br>
      <input type="text" name="img" value="<?php echo $row['img_path']?>"/><br>
      <button type="submit" name="modif" value='<?php echo $row['article_id']?>'>Modifier</button>
  </form>
  <?php
}
?>
