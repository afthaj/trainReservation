<?php
require_once('connectvars.php');

session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['adminID'])) {
    if (isset($_COOKIE['adminID']) && isset($_COOKIE['adminID'])) {
      $_SESSION['adminID'] = $_COOKIE['adminID'];
      $_SESSION['username'] = $_COOKIE['username'];
    }
	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . 'index.php';
	header('Location: ' . $home_url);
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Check Train Schedule | TrainReserve Admin</title>
<link href="styles.css" type="text/css" rel="stylesheet" />
<script src="formscripts.js"></script>
</head>

<body>
<div class="mainContainer">
  
  <div class="headerContainer">
  	
    <?php 
		if (isset($_SESSION['passengerID'])) {
			echo('<p>You are logged in as ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '. | <a href="logout.php">Log Out</a></p>');
  			}
			else if (isset($_SESSION['adminID'])) {
				echo('<p>You are logged in as ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '. | <a href="logout.php">Log Out</a></p>');
				}
			else {
			  	echo '<p>You are not currently logged in. | <a href="userLogin.php">Log In</a> | <a href="signup.php">Sign Up</a></p>';
				}
	?>
    <p id="heading">TrainReserve Admin</p>
  </div>
  
  <div class="bodyContainer">
      <ul id="navBar">
      	<li><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST']; ?>/adminIndex.php">Home</a></li>
        <li><a href="adminEditProfile.php">View/Edit Admin User Profile</a></li>
        <li><a href="adminAddNewAdmin.php">Add New Admin</a></li>
        <li><a href="adminAddNewPassenger.php">Add New Passenger</a></li>
        <li><a href="adminAddNewTrainRoute.php">Add New Train Route</a></li>
        <li><a href="adminCheckTrainSchedule.php">Check Train Schedule</a></li>
        <!--<li><a href="adminSubmitReservation.php">Submit Reservation</a></li>-->
      </ul>

    <div class="mainContentContainer">
	 <div class="mainContent">
      <h3>Check the Train Schedule</h3>
     </div>
       <div class="mainContent">
      <p>
      <?php
      	 if (!isset($_POST['submit'])){
      ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="checkTrainScheduleForm" id="checkTrainScheduleForm">
        
        <fieldset>
      	<legend><span>Choose the Departure and Arrival Station</span></legend>
        <ol>
          <li>
          <label for="from">Departure Station:</label>
          <select id="from" name="from">
            <option value="">--Select--</option>
            <option value="Aluthgama">Aluthgama</option>
            <option value="Anuradhapura">Anuradhapura</option>
            <option value="Batticaloa">Batticaloa</option>
            <option value="Badulla">Badulla</option>
            <option value="Bandarawela">Bandarawela</option>
            <option value="Colombo-Fort">Colombo-Fort</option>
            <option value="Maradana">Maradana</option>
            <option value="Galle">Galle</option>
            <option value="Hali Ela">Hali Ela</option>
            <option value="Hatton">Hatton</option>
            <option value="Kurunegala">Kurunegala</option>
            <option value="Kandy">Kandy</option>
            <option value="Matale">Matale</option>
            <option value="Matara">Matara</option>
            <option value="Maradana">Maradana</option>
            <option value="Trincomalee">Trincomalee</option>
            <option value="Vavuniya">Vavuniya</option>
          </select>
          </li>
          <li>
          <label for="to">Arrival Station:</label>
          <select id="to" name = "to">
            <option value="">--Select--</option>
            <option value="Aluthgama">Aluthgama</option>
            <option value="Anuradhapura">Anuradhapura</option>
            <option value="Batticaloa">Batticaloa</option>
            <option value="Badulla">Badulla</option>
            <option value="Bandarawela">Bandarawela</option>
            <option value="Colombo-Fort">Colombo-Fort</option>
            <option value="Maradana">Maradana</option>
            <option value="Galle">Galle</option>
            <option value="Hali Ela">Hali Ela</option>
            <option value="Hatton">Hatton</option>
            <option value="Kurunegala">Kurunegala</option>
            <option value="Kandy">Kandy</option>
            <option value="Matale">Matale</option>
            <option value="Matara">Matara</option>
            <option value="Maradana">Maradana</option>
            <option value="Trincomalee">Trincomalee</option>
            <option value="Vavuniya">Vavuniya</option>
          </select>
          </li>
          </ol>
          </fieldset>
          
          <fieldset>
          <legend><span>Choose the Departure and Arrival Time (optional)</span></legend>
          <ol>
          <li>
          <label for="deptime">Departure time:</label>
          <select id="deptime" name="deptime">
            <option value="">--Select--</option>
            <option value="00:00:00">00:00</option>
            <option value="01:00:00">01:00</option>
            <option value="02:00:00">02:00</option>
            <option value="03:00:00">03:00</option>
            <option value="04:00:00">04:00</option>
            <option value="05:00:00">05:00</option>
            <option value="06:00:00">06:00</option>
            <option value="07:00:00">07:00</option>
            <option value="08:00:00">08:00</option>
            <option value="09:00:00">09:00</option>
            <option value="10:00:00">10:00</option>
            <option value="11:00:00">11:00</option>
            <option value="12:00:00">12:00</option>
            <option value="13:00:00">13:00</option>
            <option value="14:00:00">14:00</option>
            <option value="15:00:00">15:00</option>
            <option value="16:00:00">16:00</option>
            <option value="17:00:00">17:00</option>
            <option value="18:00:00">18:00</option>
            <option value="19:00:00">19:00</option>
            <option value="20:00:00">20:00</option>
            <option value="21:00:00">21:00</option>
            <option value="22:00:00">22:00</option>
            <option value="23:00:00">23:00</option>
            <option value="24:00:00">24:00</option>
          </select> 
          </li>
          <li>
          <label for="arrivetime">Arrival time:</label>
          <select id="arrivetime" name="arrivetime">
            <option value="">--Select--</option>
            <option value="00:00:00">00:00</option>
            <option value="01:00:00">01:00</option>
            <option value="02:00:00">02:00</option>
            <option value="03:00:00">03:00</option>
            <option value="04:00:00">04:00</option>
            <option value="05:00:00">05:00</option>
            <option value="06:00:00">06:00</option>
            <option value="07:00:00">07:00</option>
            <option value="08:00:00">08:00</option>
            <option value="09:00:00">09:00</option>
            <option value="10:00:00">10:00</option>
            <option value="11:00:00">11:00</option>
            <option value="12:00:00">12:00</option>
            <option value="13:00:00">13:00</option>
            <option value="14:00:00">14:00</option>
            <option value="15:00:00">15:00</option>
            <option value="16:00:00">16:00</option>
            <option value="17:00:00">17:00</option>
            <option value="18:00:00">18:00</option>
            <option value="19:00:00">19:00</option>
            <option value="20:00:00">20:00</option>
            <option value="21:00:00">21:00</option>
            <option value="22:00:00">22:00</option>
            <option value="23:00:00">23:00</option>
            <option value="24:00:00">24:00</option>
          </select>
          </li>
          </ol>
          </fieldset>
          
          <fieldset class="submit">
          <input type="submit" value="Search" name="submit" />
          <input type="reset" value="Reset" />
          </fieldset>
          
  	    </form>
        <?php
		 } else {
			 //getting values that user entered
			$strt = $_POST['from'];
			$stp = $_POST['to'];
			//$dtime = $_POST['deptime'];
			//$atime = $_POST['arrivetime'];
			
			//connecting to the database
			$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Could not connect' . mysql_error());
			
			//checking what are the entered values
			
			if(!empty($strt) && !empty($stp) && !empty($dtime) && !empty($atime)) {
				//query if the user entered all the values
				$query = "SELECT trainNo, trainName, departureStation, departureTime , arrivalStation, arrivalTime, frequency, otherInformation FROM train_schedule WHERE stationsIncluded LIKE '%$strt%' && stationsIncluded LIKE '%$stp%'";
				} 
				//check what are the entered values
			    else if(!empty($strt) && !empty($stp) && empty($dtime) && empty($atime)) {
				//$query if user gives only departure and arrival stations
				$query = "SELECT trainNo, trainName, departureStation, departureTime , arrivalStation, arrivalTime, frequency, otherInformation FROM train_schedule WHERE stationsIncluded LIKE '%$strt%' && stationsIncluded LIKE '%$stp%'";
				}
			
			//store the result from the query
			$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error());
			$num_rows = mysqli_num_rows($result);
			
			//check number of result rows
			if ($num_rows>=1) {
				echo "<h4>Trains For Your Selection </h4>";
				echo "<table border='1' cellpadding='5em 10em'>";
				echo "<thead>";
				echo "<tr>";
				echo "<th>Train No.</th>";
				echo "<th>Name</th>";
				echo "<th>Departure Station</th>";
				echo "<th>Departure Time</th>";
				echo "<th>Arrival Station</th>";
				echo "<th>Arrival Time</th>";
				echo "<th>Frequency</th>";
				echo "<th>Other Infomation</th>";
				echo "<th>Reservation</th>";				
				echo "</tr>";
				echo "</thead>";
				
				// print values in the table
				while($row = mysqli_fetch_array($result))
				{
				echo "<tbody>";
				echo "<tr>";
				echo "<td>" . $row['trainNo'] . "</td>";
				echo "<td>" . $row['trainName'] . "</td>";
				echo "<td>" . $row['departureStation'] . "</td>";
				echo "<td>" . $row['departureTime'] . "</td>";
				echo "<td>" . $row['arrivalStation'] . "</td>";
				echo "<td>" . $row['arrivalTime'] . "</td>";
				echo "<td>" . $row['frequency'] . "</td>";
				echo "<td>" . $row['otherInformation'] . "</td>";
				echo "<td><a href=\"adminSubmitReservation.php?trainNo=" . $row['trainNo'] . "\">Submit Reservation</a></td>";
				echo "</tr>";
				echo "</tbody>";
				}
				echo "</table>";
				mysql_free_result($result);
					} else if ($num_rows==0) {
						echo 'No train is available for your search.';
						}
			 }
		?>
      </p>
     </div>
    </div>
    </div>
  <div class="footerContainer">
    <?php
	require_once('footerconstants.php');
	
	echo '<p>' . COPYRIGHT . '</p>';
	?>
  </div>
</div>
</body>
</html>