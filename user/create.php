<?php
    include_once '../bdd/bdd_connec.php';
    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['login']) && !empty($_POST['passwd']))
    {
        $sql = "SELECT username FROM users";
        $req = mysqli_query($conn, $sql);
        $user_name = $_POST['login']; 
        while ($row = mysqli_fetch_array($req))
        {
            if ($row['username'] == $user_name)
                header("Location: ../template/create.html?error=user_already_exist");
        }
        if ($_POST['passwd'] == $first_name || $_POST['passwd'] == $last_name || $_POST['passwd'] == $user_name)
           header("Location: ../template/create.html?error_create=wrong_passwd");
        $user_name = mysqli_real_escape_string($conn, $_POST['login']); 
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $passwd = hash("whirlpool", $_POST['passwd']);
        $pass_wd = mysqli_real_escape_string($conn, $passwd);

        $sql = "INSERT INTO users (firstname, lastname, username, passwd) VALUES ('$first_name', '$last_name', '$user_name', '$pass_wd')";
        print_r();
        mysqli_query($conn, $sql);
        header("location: ../index.php?signup=success");
    }
    else
        header("Location: ../template/create.html?error=empty");
?>