<?php

$connect = new mysqli('localhost', 'root', '', 'tasks');

if(mysqli_connect_error()){
die("Connection failed");
}

$task = $_GET['id'];


$sql = "DELETE FROM tasks WHERE id = '$task' ";
$connect->query($sql);




//mysqli_query($connect,"DELETE FROM tasks WHERE id='".$task."'");


mysqli_close($connect);


header("Location: connect.php");



?>