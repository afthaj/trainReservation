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
<title>Add New Passenger | TrainReserve Admin</title>
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
      <h2>Add New Passenger</h2>
      </div> 
      
      <div class="mainContent">
      <p>
      
<?php

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
	$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
	$password = mysqli_real_escape_string($dbc, trim($_POST['password']));
	$retype_password = mysqli_real_escape_string($dbc, trim($_POST['retypepassword']));
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
      if (!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($dob) && !empty($address) && ($password == $retype_password)) {
          $query = "INSERT INTO passenger (username, password, joinDate, firstname, othernames, lastname, gender, dateofbirth, age, address, telephoneNumber, emailAddress) VALUES ('$username', '$password', NOW(), '$first_name', '$other_names', '$last_name', '$gender', '$dob', '$age', '$address', '$telnumber', '$email')";
		  
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
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="editProfileForm" id="editProfileForm" onsubmit="return validateAdminAddNewPassenger(this.form)">
        
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
            <input type="password" id="password" name="password" onblur="validateNonEmpty(this, document.getElementById('password_help'))" value="" size="20"/>
            <span id="password_help" class="helpText"></span>
            <br />
            </li>
            <li>
            <label for="password">Retype Password :</label>
            <input type="password" id="retypepassword" name="retypepassword" onblur="validateRetypePassword(this, document.getElementById('password'), document.getElementById('retypepassword_help'))" value="" size="20"/>
            <span id="retypepassword_help" class="helpText"></span>
            </li>
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
          <input type="text" id="dob" name="dob" onblur="validateDate(this, document.getElementById('dob_help'))" value="<?php if (!empty($dob)) echo $dob; ?>" size="11" maxlength="10"/>
          <span id="dob_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="age">Age :</label>
          <input type="text" id="age" name="age" onblur="validateNonEmpty(this, document.getElementById('age_help'))" value="<?php if (!empty($age)) echo $age; ?>" size="3" maxlength="2"/>
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
          <input type="text" id="telnumber" name="telnumber" onblur="validateNonEmpty(this, document.getElementById('telnumber_help'))" value="<?php if (!empty($telnumber)) echo $telnumber; ?>" size="13" maxlength="13"/>
          <span id="telnumber_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="email">Email Address :</label>
          <input type="text" id="email" name="email" onblur="validateEmail(this, document.getElementById('email_help'))" value="<?php if (!empty($email)) echo $email; ?>" size="30"/>
          <span id="email_help" class="helpText"></span>
          <br />
          </li>
          </ol>
          </fieldset>
          
        <fieldset class="submit">
          <input type="submit" class="submit" name="submit" value="Add New Passenger">
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



