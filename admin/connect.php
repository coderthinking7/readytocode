<?php

$conn = mysqli_connect('localhost','root','','gravity');

$db_name = 'mysql:host=localhost;dbname=gravity';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

?>

