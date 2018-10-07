<?php
include_once '../bdd/bdd_connec.php';
$id = $_POST['submit'];
$sql = "SELECT * FROM article WHERE article_id=$id";
$req = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($req);
$sql = "DELETE FROM transaction WHERE article_id=$id";
mysqli_query($conn, $sql);
$sql = "DELETE FROM article WHERE article_id=$id";
mysqli_query($conn, $sql);
header("Location: index.php?del=success");
