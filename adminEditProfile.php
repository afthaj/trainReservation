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
<title>Edit Profile | TrainReserve Admin</title>
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
      <h2>Edit Admin Profile</h2>
      </div> 
      
      <div class="mainContent">
      <p>
      
<?php

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $first_name = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
	$other_names = mysqli_real_escape_string($dbc, trim($_POST['othernames']));
    $last_name = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
    $gender = mysqli_real_escape_string($dbc, trim($_POST['gender']));
    $dob = mysqli_real_escape_string($dbc, trim($_POST['dob']));
	$age = mysqli_real_escape_string($dbc, trim($_POST['age']));
    $address = mysqli_real_escape_string($dbc, trim($_POST['address']));
	$telnumber = mysqli_real_escape_string($dbc, trim($_POST['telnumber']));
	$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    
    $error = false;
	
	// Update the profile data in the database
    if (!$error) {
      if (!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($dob) && !empty($address)) {
          $query = "UPDATE admin_user SET firstname = '$first_name', othernames = '$other_names', lastname = '$last_name', gender = '$gender', dateofbirth = '$dob', age = '$age', address = '$address', telephoneNumber = '$telnumber', emailAddress = '$email' WHERE adminID = '" . $_SESSION['adminID'] . "'";
		  
        mysqli_query($dbc, $query);

        // Confirm success with the user
        $error_msg = 'Your profile has been successfully updated. Would you like to <a href="adminEditProfile.php">view</a> your profile?';
        mysqli_close($dbc);
      } else {
        $error_msg = 'You must enter all of the profile data.';
      }
    }
  } // End of check for form submission
else {
    // Grab the profile data from the database
    $query = "SELECT firstname, othernames, lastname, gender, dateofbirth, age, address, telephoneNumber, emailAddress FROM admin_user WHERE adminID ='" . $_SESSION['adminID'] . "'";
    $data = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($data);

    if ($row != NULL) {
      $first_name = $row['firstname'];
	  $other_names = $row['othernames'];
      $last_name = $row['lastname'];
      $gender = $row['gender'];
      $dob = $row['dateofbirth'];
      $age = $row['age'];
      $address = $row['address'];
	  $telnumber = $row['telephoneNumber'];
	  $email = $row['emailAddress'];
    } else {
      $error_msg = 'There was a problem accessing your profile.';
    }
  }

//onblur="validateNonEmpty(this, document.getElementById('firstName_help'))" 

  mysqli_close($dbc);
?>

		<?php
			// Confirm the successful log-in
			if (isset($_SESSION['adminID'])) {
			echo '<p>You are logged in as ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . ' - <a href="logout.php">Log Out</a></p>';
			echo '<p>' . $error_msg . '</p>';
		?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="adminEditProfileForm" id="adminEditProfileForm" onsubmit="return validateEditProfile(this.form)">
        
        <fieldset>
        <legend><span>Login Details</span></legend>
        <ol>
          <li>If you want to change your password click <a href="adminChangePassword.php">here</a></li>
        </ol>
        </fieldset>
        
        <fieldset>
        <legend><span>Personal Details</span></legend>
        
        <ol>
          <li>
          <label for="firstname">First Name :</label>
          <input type="text" id="firstname" name="firstname" onblur="validateNonEmpty(this, document.getElementById('firstname_help'))" value="<?php if (!empty($first_name)) echo $first_name; ?>" size="20"/>
          <span id="firstname_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="othernames">Other Names :</label>
          <input type="text" id="othernames" name="othernames" onblur="validateNonEmpty(this, document.getElementById('othernames_help'))" value="<?php if (!empty($other_names)) echo $other_names; ?>" size="20"/>
          <span id="othernames_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="lastname">Last Name :</label>
          <input type="text" id="lastname" name="lastname" onblur="validateNonEmpty(this, document.getElementById('lastname_help'))" value="<?php if (!empty($last_name)) echo $last_name; ?>" size="20"/>
          <span id="lastname_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="gender">Gender :</label>
          <select name="gender" id="gender">
              <option value="M" <?php if (!empty($gender) && $gender == 'M') echo 'selected = "selected"'; ?>>Male</option>
              <option value="F" <?php if (!empty($gender) && $gender == 'F') echo 'selected = "selected"'; ?>>Female</option>
          </select>
          <span id="gender_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="dob">Date of Birth :</label>
          <input type="text" id="dob" name="dob" onblur="validateDate(this, document.getElementById('dob_help'))" value="<?php if (!empty($dob)) echo $dob; ?>" size="11" maxlength="10" />
          <span id="dob_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="age">Age :</label>
          <input type="text" id="age" name="age" onblur="validateNonEmpty(this, document.getElementById('age_help'))" value="<?php if (!empty($age)) echo $age; ?>" size="3" maxlength="2" />
          <span id="age_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="address">Address :</label>
          <textarea rows="5" cols="40" id="address" name="address" onblur="validateNonEmpty(this, document.getElementById('address_help'))"><?php if (!empty($address)) echo $address; ?></textarea>
          <span id="address_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="telnumber">Telephone Number :</label>
          <input type="text" id="telnumber" name="telnumber" onblur="validateNonEmpty(this, document.getElementById('telnumber_help'))" value="<?php if (!empty($telnumber)) echo $telnumber; ?>" size="13" maxlength="13" />
          <span id="telnumber_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="email">Email Address :</label>
          <input type="text" id="email" name="email" onblur="validateEmail(this, document.getElementById('email_help'))" value="<?php if (!empty($email)) echo $email; ?>" size="30" />
          <span id="email_help" class="helpText"></span>
          <br />
          </li>
          </ol>
          </fieldset>
          
          <fieldset class="submit">
          <input type="submit" class="submit" name="submit" value="Edit Profile">
          </fieldset>
        
        <fieldset class="reservationTable">
        <legend><span>Reservation Details</span></legend>
        <ol>
        <li>
        <?php
		
			//connecting to the database
			$link2 = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Could not connect' . mysql_error());
			
			//checking what are the entered values
			
			$query2 = "SELECT r.reservationID, r.trainNo, r.class, r.noOfPassengers, r.dateSubmitted, t.trainName, t.departureStation, t.departureTime, t.arrivalStation, t.arrivalTime, t.frequency, t.otherInformation FROM reservation AS r, train_schedule AS t WHERE t.trainNo = r.trainNo AND r.adminID = '" . $_SESSION['adminID'] . "'";
			
			//store the result from the query
			$result2 = mysqli_query($link2, $query2) or die('Query failed: ' . mysqli_error());
			$num_rows2 = mysqli_num_rows($result2);
			
			//check number of result rows
			if ($num_rows2 >= 1) {
				echo "<h4>No of reservations: " . $num_rows2 . "</h4>";
				echo "<table border='1' cellpadding='5px'>";
				echo "<thead>";
				echo "<tr>";
				echo "<th>Reservation ID</th>";
				echo "<th>Train No.</th>";
				echo "<th>Train Name</th>";
				echo "<th>Class</th>";
				echo "<th>No Of Passengers</th>";
				echo "<th>Date & Time Submitted</th>";
				echo "<th>Departure Station</th>";
				echo "<th>Departure Time</th>";
				echo "<th>Arrival Station</th>";
				echo "<th>Arrival Time</th>";
				echo "<th>Frequency</th>";
				echo "<th>Other Infomation</th>";
				echo "</tr>";
				echo "</thead>";
				
				// print values in the table
				while($row2 = mysqli_fetch_array($result2))
				{
				echo "<tbody>";
				echo "<tr>";
				echo "<td>" . $row2['reservationID'] . "</td>";
				echo "<td>" . $row2['trainNo'] . "</td>";
				echo "<td>" . $row2['trainName'] . "</td>";
				echo "<td>" . $row2['class'] . "</td>";
				echo "<td>" . $row2['noOfPassengers'] . "</td>";
				echo "<td>" . $row2['dateSubmitted'] . "</td>";
				echo "<td>" . $row2['departureStation'] . "</td>";
				echo "<td>" . $row2['departureTime'] . "</td>";
				echo "<td>" . $row2['arrivalStation'] . "</td>";
				echo "<td>" . $row2['arrivalTime'] . "</td>";
				echo "<td>" . $row2['frequency'] . "</td>";
				echo "<td>" . $row2['otherInformation'] . "</td>";
				echo "</tr>";
				echo "</tbody>";
				}
				echo "</table>";
				mysql_free_result($result2);
				mysqli_close($link2);
			} else if ($num_rows == 0) {
						echo '<p>No reservations available.</p>';
						}
		
        ?>
        </li>
        </ol>
        </fieldset>
        
        </form>
                
      <?php
		} else {
			// If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
			echo '<p>You must login to view this page. <a href="adminLogin.php">Login</a></p>';
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



