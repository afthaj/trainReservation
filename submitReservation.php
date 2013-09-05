<?php
  require_once('connectvars.php');

  session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['passengerID'])) {
    if (isset($_COOKIE['passengerID']) && isset($_COOKIE['username'])) {
      $_SESSION['passengerID'] = $_COOKIE['passengerID'];
      $_SESSION['username'] = $_COOKIE['username'];
    }
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Submit Reservation | TrainReserve</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script src="formscripts.js"></script>
</head>

<body>
<div class="mainContainer">
  
  <div class="headerContainer">
  	<p>
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
    </p>
    <p id="heading">TrainReserve</p>
  </div>
  
  <div class="bodyContainer">
      <ul id="navBar">
      	<li><a href="<?php echo 'http://' . $_SERVER['HTTP_HOST']; ?>">Home</a></li>
        <li><a href="signup.php">Sign Up</a></li>
        <li><a href="userLogin.php">User Login</a></li>
        <li><a href="editProfile.php">View/Edit User Profile</a></li>
        <li><a href="adminLogin.php">Admin Login</a></li>
        <li><a href="checkTrainSchedule.php">Check Train Schedule</a></li>
        <li><a href="info.php">Train Route Information</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <!--<li><a href="submitReservation.php">Submit Reservation</a></li>-->
      </ul>

    <div class="mainContentContainer">
	  
      <div class="mainContent">
      <h2>Submit Reservation</h2>
      </div> 
      
      <div class="mainContent">
      <p>
      
<?php

  $train_number = $_GET['trainNo'];

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
   	if (isset($_SESSION['passengerID'])) {
		$user_id =  $_SESSION['passengerID'];
		$train_number = mysqli_real_escape_string($dbc, trim($_POST['trainnumber']));
		$class = mysqli_real_escape_string($dbc, trim($_POST['class']));
    	$number_of_passengers = mysqli_real_escape_string($dbc, trim($_POST['noofpassengers']));
	
    	$error = false;
	
	// Update the profile data in the database
    if (!$error) {
		
		if (!empty($class) && !empty($number_of_passengers)) {
			$query = "INSERT INTO reservation (passengerID, trainNo, class, noOfPassengers, dateSubmitted) VALUES ('$user_id', '$train_number', '$class', '$number_of_passengers', NOW())";
			mysqli_query($dbc, $query);
			// Confirm success with the user
			$error_msg = 'The Reservation has been successfully submitted. Would you like to <a href="editProfile.php">view</a> your profile and check your reservations? Alternatively, you can <a href="checkTrainSchedule.php">make another reservation</a>';
			mysqli_close($dbc);
			} else {
				$error_msg = 'You must enter a Class and a specific amount of passengers in the relevant fields.';
				}
		}
	} else if (isset($_SESSION['adminID'])) {
			$user_id =  $_SESSION['adminID'];
			$train_number = mysqli_real_escape_string($dbc, trim($_POST['trainnumber']));
			$class = mysqli_real_escape_string($dbc, trim($_POST['class']));
    		$number_of_passengers = mysqli_real_escape_string($dbc, trim($_POST['noofpassengers']));
	
    $error = false;
	
	// Update the profile data in the database
    if (!$error) {
		
		if (!empty($class) && !empty($number_of_passengers)) {
			$query = "INSERT INTO reservation (adminID, trainNo, class, noOfPassengers, dateSubmitted) VALUES ('$user_id', '$train_number', '$class', '$number_of_passengers', NOW())";
			mysqli_query($dbc, $query);
			// Confirm success with the user
			$error_msg = 'The Reservation has been successfully submitted. Would you like to <a href="editProfile.php">view</a> your profile and check your reservations? Alternatively, you can <a href="checkTrainSchedule.php">make another reservation</a>';
			mysqli_close($dbc);
			} else {
				$error_msg = 'You must enter a Class and a specific amount of passengers in the relevant fields.';
				}
		}
	}
} // End of check for form submission
else {
    // Grab the profile data from the database
    $query = "SELECT trainName, departureStation, departureTime, arrivalStation, arrivalTime, frequency, otherInformation FROM train_schedule WHERE trainNo = $train_number";
    $data = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($data);

    if ($row != NULL) {
      $train_name = $row['trainName'];
	  $departure_station = $row['departureStation'];
      $departure_time = $row['departureTime'];
      $arrival_station = $row['arrivalStation'];
      $arrival_time = $row['arrivalTime'];
      $frequency = $row['frequency'];
      $other_information = $row['otherInformation'];
    } else {
      $error_msg = 'There was a problem accessing the database.';
    }
  }
  mysqli_close($dbc);
?>

		<?php
			// Confirm the successful log-in
			if (isset($_SESSION['passengerID'])) {
			echo '<p>You are logged in as ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . ' - <a href="logout.php">Log Out</a></p>';
			echo '<p>' . $error_msg . '</p>';
		?>
        
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="submitReservationForm" id="submitReservationForm" onsubmit="return submitReservation(this.form)">
        
        <fieldset>
        <legend><span>Train Details</span></legend>
        <ol>
          <li>  
          <label for="trainnumber">Train Number :</label>
          <input type="text" id="trainnumber" name="trainnumber" value="<?php if (!empty($train_number)) echo $train_number; ?>" readonly="readonly" size="5"/>
          <br />
          </li>
          <li>
          <label for="trainname">Train Name :</label>
          <input type="text" id="trainname" name="trainname" value="<?php if (!empty($train_name)) echo $train_name; ?>" readonly="readonly" size="20"/>
          <br />
          </li>
          <li>
          <label for="departurestation">Departure Station :</label>
          <input type="text" id="departurestation" name="departurestation" value="<?php if (!empty($departure_station)) echo $departure_station; ?>" readonly="readonly" size="20"/>
          <br />
          </li>
          <li>
          <label for="departuretime">Departure Time:</label>
          <input type="text" id="departuretime" name="departuretime" value="<?php if (!empty($departure_time)) echo $departure_time; ?>" readonly="readonly" size="8"/>
          <br />
          </li>
          <li>
          <label for="arrivalstation">Arrival Station:</label>
          <input type="text" id="arrivalstation" name="arrivalstation" value="<?php if (!empty($arrival_station)) echo $arrival_station; ?>" readonly="readonly" size="20"/>
          <br />
          </li>
          <li>
          <label for="arrivaltime">Arrival Time :</label>
          <input type="text" id="arrivaltime" name="arrivaltime" value="<?php if (!empty($arrival_time)) echo $arrival_time; ?>" readonly="readonly" size="8"/>
          <br />
          </li>
          <li>
          <label for="frequency">Frequency :</label>
          <input type="text" id="frequency" name="frequency" value="<?php if (!empty($frequency)) echo $frequency; ?>" readonly="readonly" size="20"/>
          <br />
          </li>
          <li>
          <label for="otherinformation">Other Information :</label>
          <textarea rows="5" cols="40" id="otherinformation" name="otherinformation" readonly="readonly"><?php if (!empty($other_information)) echo $other_information; ?></textarea>
          <br />
          </li>
        </ol>
        </fieldset>
        
        <fieldset>
        <legend><span>Reservation Details</span></legend>
         
         <ol>
            <li>
            <label for="class">Class :</label>
            <select name="class" id="class">
                <option value="1" <?php if (!empty($class) && $class == '1') echo 'selected = "selected"'; ?>>1st Class</option>
                <option value="2" <?php if (!empty($class) && $class == '2') echo 'selected = "selected"'; ?>>2nd Class</option>
                <option value="3" <?php if (!empty($class) && $class == '3') echo 'selected = "selected"'; ?>>3rd Class</option>
            </select>
            <br />
            </li>
            <li>
            <label for="noofpassengers">Number of Passengers :</label>
            <input type="text" id="noofpassengers" name="noofpassengers" onblur="validateNonEmpty(this, document.getElementById('noofpassengers_help'))" size="3" maxlength="3"/>
            <span id="noofpassengers_help" class="helpText"></span>
            <br />
            </li>
          </ol>
        </fieldset>
        
        <fieldset class="submit">
        <input type="submit" name="submit" value="Submit Reservation"/>
        </fieldset>
        
        </form>
        
      <?php
		} // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
		else {
			echo '<p>You must login to view this page - <a href="userLogin.php">Login</a></p>';
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



