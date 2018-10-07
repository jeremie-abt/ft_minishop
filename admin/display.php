<?php
    function    ft_print_article($conn) {
        $sql = "SELECT * FROM article";
        $req = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($req);
        if ($resultCheck < 1)
        {
          echo "trouve pas";
        }
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

    function    ft_print_categories($conn) {
        $sql = "SELECT * FROM categories";
        $req = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($req);
        if ($resultCheck < 1)
        {
          echo "trouve pas";
        }
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

    function    ft_print_transaction($conn) {
        date_default_timezone_set("Europe/Paris");
        $sql = "SELECT * FROM transaction";
        $req = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($req))
        {
          $login = $row['user_id'];
          $sqle = "SELECT * FROM users WHERE user_id='$login'";
          $reqe = mysqli_query($conn, $sqle);
          $tab = mysqli_fetch_assoc($reqe);
          $login = $tab['username'];
          $date = "le ".date("j/m/y", $row['date'])." a ".date("\[H:i\]", $row['date']);
          $user = " <b>".$login."</b>: ";
          $title = $row['article_id'];
          $sqle = "SELECT * FROM article WHERE article_id='$title'";
          $reqe = mysqli_query($conn, $sqle);
          $tab = mysqli_fetch_assoc($reqe);
          $title = $tab['title'];
          $titre = $title;
          $nb = $row['nb_of_article'];
          echo "$date$user$titre (x$nb)<br />";
        }
    }

    function    ft_print_users($conn) {
        $sql = "SELECT * FROM users";
        $req = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($req);
        if ($resultCheck < 1)
        {
          echo "trouve pas";
        }
        while ($row = mysqli_fetch_assoc($req))
        {
            echo "login : ".$row['username'];
            if ($row['admin'] == NULL)
            {
            ?>
            <form action="promote.php" method="post">
                <button type="submit" name="submit" value="<?php echo $row['user_id']; ?>">Promote</button>
            </form>
            <?php
            }
            if ($row['admin'] == 1)
            {
            ?>
            <form action="demote.php" method="post">
                <button type="submit" name="submit" value="<?php echo $row['user_id']; ?>">Demote</button>
            </form>
            <?php
          }
        }
    }
?>
