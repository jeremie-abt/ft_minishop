<?php
    include_once "bdd/bdd_connec.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>42_minishop</title>

</head>
<body>
<?php
    include_once "template/header.php";
    print_r($_SESSION['panier']);
?>
<form action="#" method="POST">
<?php
    $sql = "SELECT * FROM categories;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        if ($row = mysqli_fetch_assoc($result)) {
            foreach ($row as $key => $elem) 
            {
                if ($key !== "categories_id") {
                ?>
                    <?php echo $key ?>: <input type="checkbox" name="<?php echo $key ?>" value="<?php echo $row['categories'] ?>">
                <?php
                }
            }
        }
    }
?>
<input name="submit" type="submit" value="OK">
</form>

<?php
    if (isset($_POST) && $_POST['submit'] == "OK")
    {
        foreach ($_POST as $key => $elem) {
            if ($key != "submit") {
                $str[] = " ".$key."=1";
            }
        }
        $str = implode(" OR ", $str);
        $sql = "SELECT article.*, categories.* FROM article INNER JOIN categories ON article.categories_id=categories.categories_id WHERE $str";
    }
    else
    {
        $sql = "SELECT * FROM article";
    }
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?><div class="article-container">
                <?php echo "<div><h1>".$row['title']."</h1></div>\n";?>
                <img width='150px' height='150px' src="<?php echo $row['img_path'] ?>">
                <?php echo "<div>".$row['description']."</div>";?> 
                </div> 
                <form action="panier/panier.php" method="POST">
                    <button name="submit" type="submit" value='<?php echo $row['article_id'] ?>'>ajouter au panier</button>
        </form>
                <?php
        }

    }

?>
</body>
</html>