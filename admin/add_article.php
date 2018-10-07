<?php
include_once '../bdd/bdd_connec.php';

if (isset($_POST['add']) && $_POST['add']="ok")
{
  if(!empty($_POST['titre']) && !empty($_POST['cate']) && !empty($_POST['desc']) && !empty($_POST['prix']) && !empty($_POST['img']))
  {
    if (preg_match("/[0-9]/", $_POST['prix']) && preg_match("/[0-9]/", $_POST['cate']))
    {
      $cate = mysqli_real_escape_string($conn, $_POST['cate']);
      $sql = "SELECT * FROM categories WHERE categories_id=$cate";
      $req = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($req);
      if ($resultCheck < 1)
      {
        header("Location: add_article.php?badcategories");
        exit();
      }
      else {
        $titre = mysqli_real_escape_string($conn, $_POST['titre']);
        $desc = mysqli_real_escape_string($conn, $_POST['desc']);
        $prix = mysqli_real_escape_string($conn, $_POST['prix']);
        $img = mysqli_real_escape_string($conn, $_POST['img']);
        $sql = "INSERT INTO article(categories_id, title, description, prix, img_path) VALUES ('$cate','$titre','$desc','$prix','$img')";
        mysqli_query($conn, $sql);
        header("Location: index.php?adding=success");
        exit();
      }
    }
    else {
      header("Location: add_article.php?wrongprice");
      exit();
    }
  }
  else {
    header("Location: add_article.php?empty");
    exit();
  }
}
else
{
  ?>
  <form action="add_article.php" method="post">
      <input type="text" name="cate" placeholder="Categories, voir fiche"/><br>
      <input type="text" name="titre" placeholder="Titre"/><br>
      <input type="text" name="desc" placeholder="Description"/><br>
      <input type="text" name="prix" placeholder="Prix"/><br>
      <input type="text" name="img" placeholder="image path"/><br>
      <button type="submit" name="add">Ajouter</button>
  </form>
  <?php
}
?>
