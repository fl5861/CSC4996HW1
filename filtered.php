<!DOCTYPE html>
<html>
<body>

<h1>To Do List</h1>
<p>Please enter the information below:</p>

<form name ="form1" method = "GET"Action="connect.php"">
Task:<br>
<input type="text" name="task"><br>
Status:<br>
<select name="status">
  <option value="Pending">Pending</option>
  <option value="Started">Started</option>
  <option value="Complete">Completed</option>
  <option value="Late">Late</option>
</select><br>
Due Date:<br>
<input id="date" type="date" name="date"><br>
<input type="Submit" name = "Submit1" value="Submit"><br>
</form>
<br>
<br>


<?php

$user = 'root';
$pass = '';
$db = 'tasks';

$connection = new mysqli('localhost', $user, $pass, $db);
$pendingCount = 0;
$startedCount = 0;
$completeCount = 0;
$lateCount = 0;
$row = 0;
if (mysqli_connect_error()){
die("Connection failed");
}
$getstatus = $_GET['status'];
if (isset($_GET['task']) && isset($_GET['date'])){
$taskname = $_GET["task"];
$taskdate = $_GET["date"];
$taskstatus = $_GET["status"];
//Obtain status from home page to be filtered


if($taskdate < date("Y-m-d"))
$insert = "INSERT INTO tasks (name, status, date) VALUES ('$taskname', 'Late', '$taskdate')";

else
$insert = "INSERT INTO tasks (name, status, date) VALUES ('$taskname', '$taskstatus', '$taskdate')";

$connection->query($insert);
}


$query1 = "SELECT * FROM tasks";
$data = $connection->query($query1);
$rows = mysqli_num_rows($data);

if ($rows == 0)
echo "There are no tasks!";

else{
$i = 0;

while ($i < $rows){
$row = $data->fetch_assoc();

if($row["status"] == $getstatus){

echo "| Task:  " . $row["name"] . "   |  Status:  " . $row["status"] . "   |  Due Date:  " . $row["date"];
echo "  | ";
echo "<a href=\"removetask.php?id=".$row['id']."\">Remove</a>";
echo "  | ";
$Complete= "Complete";
echo "<a href=\"changestatus.php?status=".$Complete."\">Mark Complete</a>";
echo "  | ";
$Pending = "Pending";
echo "<a href=\"changestatus.php?status=".$Pending."\">Mark Pending</a>";
echo "  | ";
$Started = "Started";
echo "<a href=\"changestatus.php?status=".$Started."\">Mark Started</a>";
echo "  | ";
$Late = "Late";
echo "<a href=\"changestatus.php?status=".$Late."\">Mark Late</a>";
echo "<br>";
}

if($row["status"] == "Pending")
$pendingCount++;

if($row["status"] == "Started")
$startedCount++;

if($row["status"] == "Complete")
$completeCount++;

if($row["status"] == "Late")
$lateCount++;

$i++;
}


}





echo "<br>";
$Late = "Late";
echo "<a href=\"filtered.php?status=".$Late."&id=".$row['id']."\">Number of Late tasks:  </a>";
echo $lateCount;
echo "<br>";
$Pending = "Pending";
echo "<a href=\"filtered.php?status=".$Pending."&id=".$row['id']."\">Number of Pending tasks:  </a>";
echo $pendingCount;
echo "<br>";
$Started = "Started";
echo "<a href=\"filtered.php?status=".$Started."&id=".$row['id']."\">Number of Started tasks:  </a>";
echo $startedCount;
echo "<br>";
$Complete = "Complete";
echo "<a href=\"filtered.php?status=".$Complete."&id=".$row['id']."\">Number of Completed tasks:  </a>";
echo $completeCount;
echo "<br>";
echo "<a href=\"connect.php?status=".$Complete."&id=".$row['id']."\">Total Number of tasks:  </a>";
echo $rows;

$connection->close();

?>



</body>
</html>
