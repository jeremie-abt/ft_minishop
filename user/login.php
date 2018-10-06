<?php
    session_start();
    include_once '../bdd/bdd_connec.php';
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
                header("location: ../index.php?logging=success");
            }
        }
        header("Location: /ft_minishop/index.php?error=fail_to_logging");
    }
    else
        header("Location: /ft_minishop/index.php?logging=error");
?>