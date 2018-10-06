<?php
    session_start();
    include_once '../bdd/bdd_connec.php';
    if (isset($_POST['login']) && isset($_POST['passwd']) && isset($_POST['submit']))
    {
        $pass_word = hash("whirlpool", $_POST['passwd']);
        $login = $_POST['login'];
        $sql = "SELECT * FROM users";
        $req = mysqli_query($conn, $sql);
        $i = 0;
       // print_r($_SESSION);
/*        $row = mysqli_fetch_assoc($req);
        print_r($row);
        $row = mysqli_fetch_assoc($req);
        print_r($row);
        echo "login $login passwd : $pass_word\n";
        if ($login == $row['username'] && $pass_word == $row['passwd'])
            echo "OK\n";
        else
            echo "NON\n";
        die();*/
        while ($row = mysqli_fetch_assoc($req))
        {
            if ($login == $row['username'] && $pass_word == $row['passwd'])
            {
                $_SESSION['loggued_on_user'] = $login;
                echo "c quoi cette merede";
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