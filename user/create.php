<?php
    include_once '../includes/db.inc.php';
if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['login']) && !empty($_POST['passwd']))
{
    $sql = "SELECT username FROM users";
    $req = mysqli_query($conn, $sql);
    $user_name = $_POST['login'];
    while ($row = mysqli_fetch_array($req))
    {
        $sql = "SELECT username FROM users";
        $req = mysqli_query($conn, $sql);
        $user_name = $_POST['login'];
        while ($row = mysqli_fetch_array($req))
        {
            if ($row['username'] == $user_name)
            {
                header("Location: ../template/create.html?error=user_already_exist");
                exit ();
            }
        }
        if ($_POST['passwd'] == $first_name || $_POST['passwd'] == $last_name || $_POST['passwd'] == $user_name)
        {
           header("Location: ../template/create.html?error_create=wrong_passwd");
           exit ();
        }
        $user_name = mysqli_real_escape_string($conn, $_POST['login']); 
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $passwd = hash("whirlpool", $_POST['passwd']);
        $pass_wd = mysqli_real_escape_string($conn, $passwd);

        $sql = "INSERT INTO users (firstname, lastname, username, passwd) VALUES ('$first_name', '$last_name', '$user_name', '$pass_wd')";
        mysqli_query($conn, $sql);
        header("location: ../index.php?signup=success");
        exit ();
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
    header("location: ../index.php?signup=success");
}
else {
  header("location: ../template/create.html?signup=fail");
}
?>
