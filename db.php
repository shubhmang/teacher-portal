<?php
$host = 'localhost';
$db = 'teacher_portal';
$user = 'root';  
$pass = '';      

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
