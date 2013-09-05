<?php
  require_once('connectvars.php');
  
  session_start();
  
  // Clear the error message
  $error_msg = "";

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['passengerID'])) {
    if (isset($_COOKIE['passengerID']) && isset($_COOKIE['username'])) {
      $_SESSION['passengerID'] = $_COOKIE['passengerID'];
      $_SESSION['username'] = $_COOKIE['username'];
	  }
	}
	
	// Connect to the database
  	 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		  if (isset($_POST['submit'])) {
			// Grab the profile data from the POST
			$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
			$password = mysqli_real_escape_string($dbc, trim($_POST['password']));
			$retypepassword = mysqli_real_escape_string($dbc, trim($_POST['retypepassword']));
			$firstname = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
			$lastname = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
		
			if (!empty($username) && !empty($password) && !empty($retypepassword) && !empty($firstname) && !empty($lastname) && ($password == $retypepassword)) {
				// Make sure someone isn't already registered using this username
				$query = "SELECT * FROM passenger WHERE username = '$username'";
				$data = mysqli_query($dbc, $query);
				
						if (mysqli_num_rows($data) == 0) {
						  // The username is unique, so insert the data into the database
						  $query = "INSERT INTO passenger (username, password, joinDate, firstname, lastname) VALUES ('$username', '$password', NOW(), '$firstname', '$lastname')";
						  mysqli_query($dbc, $query);
						  
						  //set the session and cookies
						  
						  $query2  = "SELECT passengerID, username, firstname, lastname FROM passenger WHERE username = '$username' AND password = '$password'";
						  $data2 = mysqli_query($dbc, $query2);
						  $row2 = mysqli_fetch_array($data2);
						  
						  $_SESSION['passengerID'] = $row2['passengerID'];
						  $_SESSION['username'] = $row2['username'];
						  $_SESSION['firstname'] = $row2['firstname'];
						  $_SESSION['lastname'] = $row2['lastname'];
						  
						  setcookie('passengerID', $row2['passengerID'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
						  setcookie('username', $row2['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
						  
						  // Confirm success with the user
						  $error_msg = 'Your new account has been successfully created. You are now ready to log in and <a href="editProfile.php">edit</a> your profile.';
				  
						  mysqli_close($dbc);
						  } else {
							// An account already exists for this username, so display an error message
							$error_msg = 'An account already exists for this username. Please use a different Username.';
							$username = "";
							}
							
				} else {
				  $error_msg = 'You must enter all of the sign-up data, including the desired password twice.';
				  }
				} 
				mysqli_close($dbc);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sign Up | TrainReserve</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
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
      <h2>Sign Up</h2>
     </div>
      
      <div class="mainContent">
      <p>
      
      <?php
			// If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
			if (!isset($_SESSION['passengerID'])) {
			echo '<p>' . $error_msg . '</p>';
		?>
            <form action="<? echo $_SERVER['PHP_SELF']; ?>" method="post" id="userSignupForm" name="userSignupForm" onsubmit="return validateSignUp(this.form)">
              
              <fieldset>
              <legend><span>Login Details</span></legend>
              
              <ol>
                <li>
                <label for="username">User Name :</label>
                <input type="text" id="username" name="username" onblur="validateNonEmpty(this, document.getElementById('username_help'))" value="<?php if (!empty($username)) echo $username; ?>" size="20"/>
                <span id="username_help" class="helpText"></span>
                <br />
                </li>
              
                <li>
                <label for="password">Password :</label>
                <input type="password" id="password" name="password" onblur="validateNonEmpty(this, document.getElementById('password_help'))" size="20"/>
                <span id="password_help" class="helpText"></span>
                <br />
                </li>
                
                <li>
                <label for="password">Retype Password :</label>
                <input type="password" id="retypepassword" name="retypepassword" onblur="validateRetypePassword(this, document.getElementById('password'), document.getElementById('retypepassword_help'))" size="20"/>
                <span id="retypepassword_help" class="helpText"></span>
                </li>
              </ol>
              
              </fieldset>
              
              <br />
              
              <fieldset>
              <legend><span>Personal Details</span></legend>
              
              <ol>
                <li>
                <label for="firstname">First Name :</label>
                <input type="text" id="firstname" name="firstname" onblur="validateNonEmpty(this, document.getElementById('firstname_help'))" value="<?php if (!empty($firstname)) echo $firstname; ?>" size="20"/>
                <span id="firstname_help" class="helpText"></span>
                <br />
                </li>
                
                <li>
                <label for="lastname">Last Name :</label>
                <input type="text" id="lastname" name="lastname" onblur="validateNonEmpty(this, document.getElementById('lastname_help'))" value="<?php if (!empty($lastname)) echo $lastname; ?>" size="20"/>
                <span id="lastname_help" class="helpText"></span>
                <br />
                </li>
              </ol>
              </fieldset>
              
              <br />
              
              <fieldset class="submit">
              <input type="submit" class="submit" name="submit" value="Sign Up"/>
              </fieldset>
           
           </form>
     <?php
		  } else {
			// Confirm the successful log-in
			echo('<p>You are logged in as ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . ' - <a href="logout.php">Log Out</a></p>');
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
