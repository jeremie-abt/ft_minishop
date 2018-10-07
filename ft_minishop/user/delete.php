<?php
    session_start();
    include_once '../bdd/bdd_connec.php';
    if (isset($_SESSION['loggued_on_user']))
    {
        if (isset($_POST['submit']))
        {
            $username_session = $_SESSION['loggued_on_user']['login'];
            $sql = "SELECT * FROM users";
            $req = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($req))
            {
                if ($row['username'] == $username_session)
                {
                    $user_id = $row['user_id'];
                    break;
                }
            }
            $sql = "DELETE FROM transaction WHERE user_id='".$user_id."'";
            mysqli_query($conn, $sql);
            $sql = "DELETE FROM users WHERE username='".$username_session."'";
            mysqli_query($conn, $sql);
            unset($_SESSION['loggued_on_user']);
            header("location: ../index.php?deleting=successfull");
            exit();
        }
    }
    header("location: ../index.php?deleting=failure");
?>