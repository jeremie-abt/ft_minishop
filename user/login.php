<?php
    session_start();
    include_once '../includes/db.inc.php';
    if (isset($_POST['login']) && isset($_POST['passwd']) && isset($_POST['submit']))
    {
        $pass_word = hash("whirlpool", $_POST['passwd']);
        $login = $_POST['login'];
        $sql = "SELECT username, passwd FROM users";
        $req = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($req))
        {
            if ($login == $row['username'] && $pass_word == $row['passwd'])
            {
                $_SESSION['loggued_on_user'] = $login;
                $_SESSION['panier'] = 0;
                header("location: ../index.html?logging=success");
            }
        }
        if (isset($_SESSION['loggued_on_user']))
            die("Error logging un");
    }
?>