<?php
    include_once '../includes/db.inc.php';

    $sql = "SELECT username FROM users";
    $req = mysqli_query($conn, $sql);
    $user_name = $_POST['login']; 
    while ($row = mysqli_fetch_array($req))
    {
        if ($row['username'] == $user_name)
            die("Error Username already exist");
    }
    if ($_POST['passwd'] == $first_name || $_POST['passwd'] == $last_name || $_POST['passwd'] == $user_name)
       die("wrong password");
    $user_name = mysqli_real_escape_string($conn, $_POST['login']); 
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $passwd = hash("whirlpool", $_POST['passwd']);
    $pass_wd = mysqli_real_escape_string($conn, $passwd);
    $sql = "INSERT INTO users (firstname, lastname, username, passwd) VALUES ('$first_name', '$last_name', '$user_name', '$pass_wd')";
    mysqli_query($conn, $sql);
    header("location: ../index.html?signup=success");
?>