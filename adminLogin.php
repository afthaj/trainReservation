<?php
  require_once('connectvars.php');

  // Start the session
  session_start();

  // Clear the error message
  $error_msg = "";

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['adminID'])) {
			if (isset($_POST['submit'])) {
			  // Connect to the database
			  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		
			  // Grab the user-entered log-in data
			  $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
			  $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
		
						  if (!empty($username) && !empty($password)) {
							// Look up the username and password in the database
							$query = "SELECT adminID, username, firstname, lastname FROM admin_user WHERE username = '$username' AND password = '$password'";
							$data = mysqli_query($dbc, $query);
					
										if (mysqli_num_rows($data) == 1) {
										  // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
										  $row = mysqli_fetch_array($data);
										  $_SESSION['adminID'] = $row['adminID'];
										  $_SESSION['username'] = $row['username'];
										  $_SESSION['firstname'] = $row['firstname'];
										  $_SESSION['lastname'] = $row['lastname'];
										  
										  setcookie('adminID', $row['adminID'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
										  setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
										  
										  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . 'adminIndex.php';
										  header('Location: ' . $home_url);
										}
										else {
										  // The username/password are incorrect so set an error message
										  $error_msg = 'Sorry, you must enter a valid username and password to log in.';
										}
						  }
						  else {
							// The username/password weren't entered so set an error message
							$error_msg = 'Sorry, you must enter your username and password to log in.';
						  }
			}
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin Login | TrainReserve Admin</title>
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
    echo '<p>You are logged in as ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '. | <a href="logout.php">Log Out</a></p>';
  }
	?>
    </p>
    <p id="heading">TrainReserve Admin</p>
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
        <h2>Admin Login</h2>
       </div>
        
       <div class="mainContent">
	   	<?php
			// If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
			if (empty($_SESSION['adminID'])) {
			echo '<p>' . $error_msg . '</p>';
		?>
        
       <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="adminLoginForm" name="adminLoginForm" onsubmit="return validateLogin(this.form)">
          
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
          </ol>
          
          </fieldset>
          
          <fieldset class="submit">
          <input type="submit" class="submit" value="Login" name="submit"/>
          </fieldset>
           
       </form>
       
       <?php
  }
  else {
    // Confirm the successful log-in
    echo('<p>You are logged in as ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '.</p>');
	echo '<p><a href="adminIndex.php">Admin Home Page</a></p>';
  }
?>
       
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



