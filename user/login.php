<?php
    session_start();
    include_once '../bdd/bdd_connec.php';
    if (isset($_SESSION['loggued_on_user']))
    {
        header("location: ../index.php?error=already_loggued");
        exit();
    }
    if (isset($_POST['login']) && isset($_POST['passwd']) && isset($_POST['submit']))
    {
        $pass_word = hash("whirlpool", $_POST['passwd']);
        $login = $_POST['login'];
        $sql = "SELECT * FROM users";
        $req = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($req))
        {
            if ($login == $row['username'] && $pass_word == $row['passwd'])
            {
                $_SESSION['loggued_on_user']['login'] = $login;
                if ($row['admin'])
                    $_SESSION['loggued_on_user']['admin'] = 1;
                header("Location: ../index.php?success=OK");
                exit ();
            }
        }
        header("Location: ../index.php?error=fail_to_logging");
        exit ();
    }
    else
        header("Location: ../index.php?logging=error");

?>  