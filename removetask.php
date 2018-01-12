<?php

$connect = new mysqli('localhost', 'root', '', 'tasks);

if(mysqli_connect_error()){
die("Connection failed");
}

$task = $_GET['id'];

$delete = "'$connect',"DELETE FROM tasks WHERE id=;".$task."'";

mysqli_query($delete);
mysqli_close($connect);




?>