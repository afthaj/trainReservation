<?php

//getting values that user entered
$strt = $_POST['from'];
$stp = $_POST['to'];
$dtime = $_POST['deptime'];
$atime = $_POST['arrivetime'];

//connecting to the database
$link = mysql_connect('localhost', 'root', 'aftha', 'train_schedule') or die('Could not connect' . mysql_error());

//checking what are the entered values

if(!empty($strt) && !empty($stp) && !empty($dtime) && !empty($atime)) {
	//query if the user entered all the values
	$query = "SELECT train_No,Name,Depature_time ,Arrival_time,Frequency,Other_infomations FROM train_shedule WHERE Depature_station LIKE '%" . $strt . "%' || Arrival_station  = '%" . $stp . "%' && Depature_time >= '$dtime' && Arrival_time <= '$atime' ";
	} 
	//check what are the entered values
else if(!empty($strt) && !empty($stp) && empty($dtime) && empty($atime)) {
	//$query if user only depature and arrival stations only
	$query = "SELECT train_No,Name,Depature_time ,Arrival_time,Frequency,Other_infomations FROM train_shedule WHERE Depature_station LIKE '%" . $strt . "%' || Arrival_station  = '%" . $stp . "%'";
	}

//store the result from the query
$result = mysql_query($link, $query) or die('Query failed: ' . mysql_error());
$num_rows = mysql_num_rows($result);

//check number of result rows
		if ($num_rows>=1) {
			echo "<table border='1'>
			<tr>
			<th>Train_No</th>
			<th>Name</th>
			<th>Depature_time</th>
			<th>Arrival_time</th>
			<th>Frequency</th>
			<th>Other Infomation</th>
			</tr>";
			
			// print values in the table
			while($row = mysql_fetch_array($result, MYSQL_BOTH))
			{
			echo "<tr>";
			echo "<td>" . $row['train_No'] . "</td>";
			echo "<td>" . $row["Name"] . "</td>";
			echo "<td>" . $row["Depature_time"] . "</td>";
			echo "<td>" . $row["Arrival_time"] . "</td>";
			echo "<td>" . $row["Frequency"] . "</td>";
			echo "<td>" . $row["Other_infomations"] . "</td>";
			echo "</tr>";
			echo"<br/>";
			}
echo "</table>";
mysql_free_result($result);
	} else if ($num_rows==0) {
		echo 'No train is available for your search.';
		}
?>



<html>
<head>

<body bgcolor="#996600">
<h4>Trains For Your Selection </h4>
</body>
</head>
</html>


