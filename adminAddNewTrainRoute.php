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
<title>Add New Train Route | TrainReserve Admin</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script src="formscripts.js"></script>
</head>

<body>
<div class="mainContainer">
  
  <div class="headerContainer">
  	<p>
    <?php 
		if (!isset($_SESSION['adminID'])) {
    echo '<p>You are not currently logged in. | <a href="adminLogin.php">Log In</a> | <a href="signup.php">Sign Up</a></p>';
  }
  else {
    echo ('<p>You are logged in as ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '. | <a href="logout.php">Log Out</a></p>');
  }
	?>
    </p>
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
      <h2>Add New Train Route</h2>
      </div> 
      
      <div class="mainContent">
      <p>
      
<?php

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
	$train_number = mysqli_real_escape_string($dbc, trim($_POST['trainnumber']));
	$train_name = mysqli_real_escape_string($dbc, trim($_POST['trainname']));
	$departure_station = mysqli_real_escape_string($dbc, trim($_POST['departurestation']));
    $departure_time = mysqli_real_escape_string($dbc, trim($_POST['departuretime']));
	$arrival_station = mysqli_real_escape_string($dbc, trim($_POST['arrivalstation']));
    $arrival_time = mysqli_real_escape_string($dbc, trim($_POST['arrivaltime']));
    $stations_included = mysqli_real_escape_string($dbc, trim($_POST['stationsincluded']));
    $frequency = mysqli_real_escape_string($dbc, trim($_POST['frequency']));
	$other_information = mysqli_real_escape_string($dbc, trim($_POST['otherinformation']));
    
    $error = false;
	
	// Update the profile data in the database
    if (!$error) {
      if (!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($dob) && !empty($address) && ($password == $retype_password)) {
          $query = "INSERT INTO train_schedule (trainnumber, trainname, departurestation, departuretime, arrivalstation, arrivaltime, stationsincluded, frequency, otherinformation) VALUES ('$train_number', '$train_name', '$departure_station', '$departure_time', '$arrival_station', '$arrival_time', '$stations_included', '$frequency', '$other_information')";
		  
        mysqli_query($dbc, $query);

        // Confirm success with the user
        $error_msg = 'New Passenger has successfully been added.';
        mysqli_close($dbc);
      } else {
        $error_msg = 'You must enter all of the profile data.';
      }
    }
  } // End of check for form submission

  mysqli_close($dbc);
?>

		<?php
			// Confirm the successful log-in
			if (isset($_SESSION['adminID'])) {
			echo '<p>You are logged in as ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . ' - <a href="logout.php">Log Out</a></p>';
			echo '<p>' . $error_msg . '</p>';
		?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="adminAddNewTrainRouteForm" id="adminAddNewTrainRouteForm" onsubmit="return validateAdminAddNewTrainRoute(this.form)">
        
          <fieldset>
          <legend><span>Route Details</span></legend>
          
          <ol>
          <li>
          <label for="trainnumber">Train No :</label>
          <input type="text" id="trainnumber" name="trainnumber" onblur="validateNonEmpty(this, document.getElementById('trainnumber_help'))" value="<?php if (!empty($train_number)) echo $train_number; ?>" size="5" maxlength="4"/>
          <span id="trainnumber_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="trainname">Train Name :</label>
          <input type="text" id="trainname" name="trainname" onblur="validateNonEmpty(this, document.getElementById('trainname_help'))" value="<?php if (!empty($train_name)) echo $train_name; ?>" size="20"/>
          <span id="trainname_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="departurestation">Departure Station :</label>
          <input type="text" id="departurestation" name="departurestation" onblur="validateNonEmpty(this, document.getElementById('departurestation_help'))" value="<?php if (!empty($departure_station)) echo $departure_station; ?>" size="20"/>
          <span id="departurestation_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="departuretime">Departure Time :</label>
          <input type="text" id="departuretime" name="departuretime" onblur="validateTime(this, document.getElementById('departuretime_help'))" value="<?php if (!empty($departure_time)) echo $departure_time; ?>" size="8" maxlength="8"/>
          <span id="departuretime_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="arrivalstation">Arrival Station :</label>
          <input type="text" id="arrivalstation" name="arrivalstation" onblur="validateNonEmpty(this, document.getElementById('arrivalstation_help'))" value="<?php if (!empty($arrival_station)) echo $arrival_station; ?>" size="20"/>
          <span id="arrivalstation_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="arrivaltime">Arrival Time :</label>
          <input type="text" id="arrivaltime" name="arrivaltime" onblur="validateTime(this, document.getElementById('arrivaltime_help'))" value="<?php if (!empty($arrival_time)) echo $arrival_time; ?>" size="8" maxlength="8"/>
          <span id="arrivaltime_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="stationsincluded">Stations Included (In Order):</label>
          <textarea rows="5" cols="40" id="stationsincluded" name="stationsincluded" onblur="validateNonEmpty(this, document.getElementById('stationsincluded_help'))"><?php if (!empty($stations_included)) echo $stations_included; ?></textarea>
          <span id="stationsincluded_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="frequency">Frequency :</label>
          <input type="text" id="frequency" name="frequency" onblur="validateNonEmpty(this, document.getElementById('frequency_help'))" value="<?php if (!empty($frequency)) echo $frequency; ?>" size="20"/>
          <span id="frequency_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="otherinformation">Other Information :</label>
          <input type="text" id="otherinformation" name="otherinformation" onblur="validateNonEmpty(this, document.getElementById('otherinformation_help'))" value="<?php if (!empty($other_information)) echo $other_information; ?>" size="20"/>
          <span id="otherinformation_help" class="helpText"></span>
          <br />
          </li>
          </ol>
          </fieldset>
          
          <fieldset class="submit">
            <input type="submit" class="submit" name="submit" value="Add Train Route">
          </fieldset>
        
        </form>
      <?php
		} else {
			// If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
			echo '<p>You must login to view this page - <a href="adminLogin.php">Login</a></p>';
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



