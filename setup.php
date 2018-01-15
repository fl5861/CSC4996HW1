<?php

$user = 'root';
$pass = '';
$db = 'tasks';

$connect = new mysqli('localhost', $user, $pass);

if ($connect->connect_error)
die("Failed to connect!");

$sql = "CREATE DATABASE tasks";

if ($connect->query($sql) === TRUE){
echo "Database created successfully!";
}
else{
echo "Error creating database (db may already exist)";
}

$sql2 = "CREATE TABLE tasks.tasks (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name text, status char(255), date date)";

if ($connect->query($sql2) === TRUE)
echo "Table created successfully!";

else
echo "Error creating table";




$connect->close();


?>