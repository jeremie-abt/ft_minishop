<?php
    session_start();
    include_once '../bdd/bdd_connec.php';
    if (isset($_SESSION['loggued_on_user']))
    {
        if ($_POST['oldlogin'] !== '' && $_POST['newlogin'] !== '' && isset($_POST['submit']))
        {
            $sql = "SELECT username FROM users";
            $req = mysqli_query($conn, $sql);
            $olduser_name = $_POST['oldlogin']; 
            while ($row = mysqli_fetch_array($req))
            {
                if ($row['username'] == $newuser_name)
                {
                    header("location: ../index.php?modification=failure_same_passwd");
                    exit();
                }
            }
            $new_username = mysqli_real_escape_string($conn, $_POST['newlogin']); 
            $sql = "UPDATE users set username='".$new_username."'WHERE username='".$olduser_name."'";
            $req = mysqli_query($conn, $sql);
            $_SESSION['loggued_on_user']['login'] = $new_username;
            $i = 1;
        }
        if ($_POST['oldpw'] !== "" && $_POST['newpw'] !== "")
        {
            $sql = "SELECT username, passwd FROM users";
            $req = mysqli_query($conn, $sql);
            $oldpw = hash("whirlpool", $_POST['oldpw']); 
            $newpw = mysqli_real_escape_string($conn, hash("whirlpool", $_POST['newpw'])); 
            while ($row = mysqli_fetch_array($req))
            {
                if ($row['passwd'] == $newpw)
                {
                    header("location: ../index.php?modification=failure/passwd");
                    exit();
                }
                if ($row['username'] == $_SESSION['loggued_on_user']['login'] && $row['passwd'] == $oldpw)
                {
                    $sql = "UPDATE users set passwd='".$newpw."'WHERE passwd='".$oldpw."'";
                    $req = mysqli_query($conn, $sql);
                    $i = 1;
                    break;
                }
            }
        }
        if ((isset($_POST['newpasswd']) || isset($_POST['newlogin'])) && $i == 1)
        {
            header("location: ../index.php?modification=success");
            exit();
        }
    }
    header("location: ../index.php?modification=please_log_first");
?>