<?php

$connect = new mysqli('localhost', 'root', '', 'tasks');

if(mysqli_connect_error()){
die("Connection failed");
}

$task = $_GET['status'];
$id = $_GET['id'];
$sql = "UPDATE tasks SET status= '$task' WHERE id = '$id'";
$connect->query($sql);

mysqli_close($connect);
header("Location: connect.php");



?>