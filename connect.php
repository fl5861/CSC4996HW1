<!DOCTYPE html>
<html>
<body>

<h1>To Do List</h1>
<p>Please enter the information below:</p>

<form name ="form1" method = "GET"Action="connect.php"">
Task:<br>
<input type="text" name="task"><br>
Due Date:<br>
<input id="date" type="date" name="date"><br>
<input type="Submit" name = "Submit1" value="Submit"><br>
</form>



<?php

$user = 'root';
$pass = '';
$db = 'tasks';

$connection = new mysqli('localhost', $user, $pass, $db);

if (mysqli_connect_error()){
die("Connection failed");
}

$taskname = $_GET["task"];
$taskdate = $_GET["date"];
$insert = "INSERT INTO tasks (name, status, date) VALUES ('$taskname', 'Pending', '$taskdate')";

$connection->query($insert);

$query1 = "SELECT * FROM tasks";
$data = $connection->query($query1);
$rows = mysqli_num_rows($data);

if ($rows == 0)
echo "There are no tasks!";

else{
$i = 0;

while ($i < $rows){
$row = $data->fetch_assoc();
echo "Task:" . $row["name"] . "     Status:" . $row["status"] . "     Due Date:" . $row["date"];
echo "<br>";

$i++;
}

}
echo "Total Number of tasks:  " . $rows;





$connection->close();

?>



</body>
</html>
