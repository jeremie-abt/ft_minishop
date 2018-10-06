<?php
    session_start();
    include_once '../includes/db.inc.php';
    if (isset($_SESSION['loggued_on_user']))
    {
        if (isset($_POST['oldlogin']) && isset($_POST['newlogin']) && isset($_POST['submit']))
        {
            $sql = "SELECT username FROM users";
            $req = mysqli_query($conn, $sql);
            $olduser_name = $_POST['oldlogin']; 
            while ($row = mysqli_fetch_array($req))
            {
                if ($row['username'] == $newuser_name)
                    die("Error Username already exist");
            }
            $new_username = mysqli_real_escape_string($conn, $_POST['newlogin']); 
            $sql = "UPDATE users set username='".$new_username."'WHERE username='".$olduser_name."'";
            $req = mysqli_query($conn, $sql);
            $_SESSION['loggued_on_user'] = $new_username;
            $i = 1;
        }
        if (isset($_POST['oldpw']) && isset($_POST['newpw']) && isset($_POST['submit']))
        {
            $sql = "SELECT username, passwd FROM users";
            $req = mysqli_query($conn, $sql);
            $oldpw = hash("whirlpool", $_POST['oldpw']); 
            $newpw = mysqli_real_escape_string($conn, hash("whirlpool", $_POST['newpw'])); 
            while ($row = mysqli_fetch_array($req))
            {
                if ($row['passwd'] == $newpw)
                    die("same password as the previous one");
                if ($row['username'] == $_SESSION['loggued_on_user'] && $row['passwd'] == $oldpw)
                {
                    $sql = "UPDATE users set passwd='".$newpw."'WHERE passwd='".$oldpw."'";
                    $req = mysqli_query($conn, $sql);
                    $i = 1;
                    break;
                }
            }
        }
        if ((isset($_POST['newpasswd']) || isset($_POST['newlogin'])) && $i == 1)
            header("location: ../index.html?modification=success");
    }
?>