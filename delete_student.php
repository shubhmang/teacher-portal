<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

require 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM students WHERE id=$id";
$conn->query($sql);

header('Location: home.php');
exit();
?>
