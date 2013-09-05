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
<title>Change Password | TrainReserve</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script src="formscripts.js"></script>
</head>

<body>
<div class="mainContainer">
  
  <div class="headerContainer">
  	<p>
    <?php 
		if (!isset($_SESSION['passengerID'])) {
    echo '<p>You are not currently logged in. | <a href="userLogin.php">Log In</a> | <a href="signup.php">Sign Up</a></p>';
  }
  else {
    echo '<p>You are logged in as ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '. | <a href="logout.php">Log Out</a></p>';
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
      <h2>Edit Login Details</h2>
      </div> 
      
      <div class="mainContent">
      <p>
      
<?php

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $old_password = mysqli_real_escape_string($dbc, trim($_POST['oldpassword']));
	$new_password = mysqli_real_escape_string($dbc, trim($_POST['newpassword']));
    $retype_new_password = mysqli_real_escape_string($dbc, trim($_POST['retypenewpassword']));

	$query2 = "SELECT password FROM passenger WHERE passengerID = '" . $_SESSION['passengerID'] . "'";
    $data2 = mysqli_query($dbc, $query2);
	$result2 = mysqli_fetch_array($data2);
	$password2 = $result2['password'];
	
	// Update the profile data in the database
			if (!empty($old_password) && !empty($new_password) && !empty($retype_new_password) && ($new_password == $retype_new_password) && ($old_password == $password2)) {
				$query = "UPDATE passenger SET password = '$new_password' WHERE passengerID = '" . $_SESSION['passengerID'] . "'";
				mysqli_query($dbc, $query);
			  	// Confirm success with the user
			  	$error_msg = 'Your password has been successfully updated. Would you like to <a href="editProfile.php">view</a> your profile?';
			  	mysqli_close($dbc);
			} 
			else if (empty($old_password) && empty($new_password) && empty($retype_new_password)) {
			  $error_msg = 'Please enter data into all the relevant fields';
			}
			else if (!empty($old_password) && empty($new_password) && empty($retype_new_password)) {
			  $error_msg = 'Please enter data into all the relevant fields';
			}
			else if (empty($old_password) && !empty($new_password) && empty($retype_new_password)) {
			  $error_msg = 'Please enter data into all the relevant fields';
			}
			else if (empty($old_password) && empty($new_password) && !empty($retype_new_password)) {
			  $error_msg = 'Please enter data into all the relevant fields';
			}
			else if (empty($old_password) && !empty($new_password) && !empty($retype_new_password)) {
			  $error_msg = 'Please enter your existing password';
			} 
			else if (!empty($old_password) && empty($new_password) && !empty($retype_new_password)) {
			  $error_msg = 'Please enter a new password';
			} 
			else if (!empty($old_password) && !empty($new_password) && empty($retype_new_password)) {
			  $error_msg = 'Please retype your new password';
			} 
			else if (!empty($old_password) && !empty($new_password) && !empty($retype_new_password) && ($new_password !== $retype_new_password) && ($old_password == $password2)) {
			  $error_msg = 'The new passwords did not match. Please enter your new password twice.';
			} 
			else if (!empty($old_password) && !empty($new_password) && !empty($retype_new_password) && ($new_password == $retype_new_password) && ($old_password !== $password2)) {
			  $error_msg = 'Your existing password did not match';
			}
			else if (!empty($old_password) && !empty($new_password) && !empty($retype_new_password) && ($new_password !== $retype_new_password) && ($old_password !== $password2)) {
			  $error_msg = 'Your existing password did not match and the new password you typed did not match the retyped password. What\'s wrong with you, jackass?';
			}
}

  mysqli_close($dbc);
?>

		<?php
			// Confirm the successful log-in
			if (isset($_SESSION['passengerID'])) {
			echo '<p>You are logged in as ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . ' - <a href="logout.php">Log Out</a> - <a href="editProfile.php">Back to View/Edit Profile</a></p>';
			echo '<p>' . $error_msg . '</p>';
		?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="changePasswordForm" id="changePasswordForm" onsubmit="return validateChangePassword(this.form)">
        
        <fieldset>
        <legend><span>Login Details</span></legend>
		<ol>
          <li>
          <label for="oldpassword">Old Password :</label>
          <input type="password" id="oldpassword" name="oldpassword" onblur="validateNonEmpty(this, document.getElementById('oldpassword_help'))" size="20"/>
          <span id="oldpassword_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="newpassword">New Password :</label>
          <input type="password" id="newpassword" name="newpassword" onblur="validateNonEmpty(this, document.getElementById('newpassword_help'))" size="20"/>
          <span id="newpassword_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="retypenewpassword">Retype Password :</label>
          <input type="password" id="retypenewpassword" name="retypenewpassword" onblur="validateRetypePassword(this, document.getElementById('newpassword'), document.getElementById('retypenewpassword_help'))" size="20"/>
          <span id="retypenewpassword_help" class="helpText"></span>
          <br />
          </li>
        </ol>
        </fieldset>
        
        <fieldset class="submit">
        <input type="submit" class="submit" name="submit" value="Change Password">
        </fieldset>
        
        </form>
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



