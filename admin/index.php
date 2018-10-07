<?php
    //date_default_timezone_set("Europe/Paris");
    session_start();
    include_once '../bdd/bdd_connec.php';
    if ($_SESSION['loggued_on_user']['admin'] !== 1)
    {
        header("Location: ../index.php?error=not_authorized");
        exit ();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
</head>
<body>
    <?php include_once "../template/header.php"; ?>

    <form action="#" method="POST">
        Article :<input name="article" type="checkbox">
        Transaction :<input name="transaction" type="checkbox">
        Users :<input name="users" type="checkbox">
        <button type="submit" name="submit" Value="select_display">submit</button>
    </form>
</body>
</html>
<?php
    include_once "display.php";
    if ($_POST['submit'] === "select_display") {
        if (isset($_POST['article']))
        {
            ft_print_article($conn);
        }
        if (isset($_POST['transaction']))
        {
            ft_print_transaction($conn);
        }
        if (isset($_POST['users']))
        {
            ft_print_users($conn);
        }
    }
?>
