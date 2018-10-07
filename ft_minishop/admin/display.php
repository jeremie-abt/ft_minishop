<?php
    include_once "../bdd/bdd_connec.php";

    function    ft_print_article() {
        echo "sisi\n";
        $sql = "SELECT * FROM users";
        $req = mysqli_query($conn, $sql);
        print_r($req);
        while ($row = mysqli_fetch_assoc($req))
        {
            echo "le titre : ".$row['title'];
            ?>
            <form action="delete_article.php" method="post">
                <button type="submit" name="submit" value="<?php echo $row['id_article']; ?>"></button>
            </form>
            <?php
        }
    }
?>