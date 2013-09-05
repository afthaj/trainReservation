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
<title>Edit Passenger Information | TrainReserve Admin</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script src="formscripts.js"></script>
</head>

<body>
<div class="mainContainer">
  
  <div class="headerContainer">
  	<p>
    <?php 
		if (!isset($_SESSION['adminID'])) {
    echo '<p>You are not currently logged in. | <a href="userLogin.php">Log In</a> | <a href="signup.php">Sign Up</a></p>';
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
    </div>

    <div class="mainContentContainer">
	  
      <div class="mainContent">
      <h2>Edit Passenger Details</h2>
      </div> 
      
      <div class="mainContent">
      <p>
      
<?php

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit1'])) {
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
          $query = "UPDATE passenger SET firstname = '$first_name', othernames = '$other_names', lastname = '$last_name', gender = '$gender', dateofbirth = '$dob', age = '$age', address = '$address', telephoneNumber = '$telnumber', emailAddress = '$email' WHERE passengerID = '" . $_SESSION['passengerID'] . "'";
		  
        mysqli_query($dbc, $query);

        // Confirm success with the user
        $error_msg = 'Your profile has been successfully updated. Would you like to <a href="editProfile.php">view</a> your profile?';
        mysqli_close($dbc);
      } else {
        $error_msg = 'You must enter all of the profile data.';
      }
    }
  } // End of check for form submission
else {
    // Grab the profile data from the database
    $query = "SELECT firstname, othernames, lastname, gender, dateofbirth, age, address, telephoneNumber, emailAddress FROM passenger WHERE passengerID ='" . $_SESSION['passengerID'] . "'";
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
      $error_msg = 'There was a problem accessing the profile.';
    }
  }

//onblur="validateNonEmpty(this, document.getElementById('firstName_help'))" 

  mysqli_close($dbc);
?>

		<?php
			// Confirm the successful log-in
			if (isset($_SESSION['adminID'])) {
			echo '<p>You are logged in as ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '. <a href="logout.php">Log Out</a></p>';
			echo '<p>' . $error_msg . '</p>';
		?>
        
        <fieldset>
        <legend>Personal Details</legend>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="adminEditPassengerForm" id="adminEditPassengerForm">
          <label for="firstName">First Name :</label>
          <input type="text" id="firstname" name="firstname" value="<?php if (!empty($first_name)) echo $first_name; ?>"/>
          <span id="firstName_help" class="helpText"></span>
          <br />
          <label for="lastName">Other Names :</label>
          <input type="text" id="othernames" name="othernames" onblur="validateNonEmpty(this, document.getElementById('otherNames_help'))" value="<?php if (!empty($other_names)) echo $other_names; ?>" />
          <span id="otherNames_help" class="helpText"></span>
          <br />
          <label for="lastName">Last Name :</label>
          <input type="text" id="lastname" name="lastname" onblur="validateNonEmpty(this, document.getElementById('lastName_help'))" value="<?php if (!empty($last_name)) echo $last_name; ?>" />
          <span id="lastName_help" class="helpText"></span>
          <br />
          <label for="gender">Gender :</label>
          <select name="gender" id="gender">
              <option value="M" <?php if (!empty($gender) && $gender == 'M') echo 'selected = "selected"'; ?>>Male</option>
              <option value="F" <?php if (!empty($gender) && $gender == 'F') echo 'selected = "selected"'; ?>>Female</option>
          </select>
          <span id="gender_help" class="helpText"></span>
          <br />
          <label for="dob">Date of Birth :</label>
          <input type="text" id="dob" name="dob" onblur="validateNonEmpty(this, document.getElementById('dob_help'))" value="<?php if (!empty($dob)) echo $dob; ?>" />
          <span id="dob_help" class="helpText"></span>
          <br />
          <label for="age">Age :</label>
          <input type="text" id="age" name="age" onblur="validateNonEmpty(this, document.getElementById('age_help'))" value="<?php if (!empty($age)) echo $age; ?>" />
          <span id="age_help" class="helpText"></span>
          <br />
          <label for="address">Address :</label>
          <input type="text" id="address" name="address" onblur="validateNonEmpty(this, document.getElementById('address_help'))" value="<?php if (!empty($address)) echo $address; ?>"/>
          <span id="address_help" class="helpText"></span>
          <br />
          <label for="telnumber">Telephone Number :</label>
          <input type="text" id="telnumber" name="telnumber" onblur="validateNonEmpty(this, document.getElementById('telnumber_help'))" value="<?php if (!empty($telnumber)) echo $telnumber; ?>"/>
          <span id="telnumber_help" class="helpText"></span>
          <br />
          <label for="email">Email Address :</label>
          <input type="text" id="email" name="email" onblur="validateNonEmpty(this, document.getElementById('email_help'))" value="<?php if (!empty($email)) echo $email; ?>"/>
          <span id="email_help" class="helpText"></span>
          <br />
          <br />
          <input type="submit" name="submit1" value="Edit Profile">
        </form>
        </fieldset>
        
      <?php
		} else {
			// If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
			echo '<p>You must login to view this page. <a href="userLogin.php">Login</a></p>';
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



