<?php

session_start();

require_once('connectvars.php');

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['adminID'])) {
    if (isset($_COOKIE['adminID']) && isset($_COOKIE['username'])) {
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
<title>Export Admin User Database | TrainReserve Admin</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script src="formscripts.js"></script>
</head>

<body>
<div class="mainContainer">
  
  <div class="headerContainer">
  	
    <?php 
		if (!isset($_SESSION['adminID'])) {
    		$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . 'index.php';
			header('Location: ' . $home_url);
  }
  else {
    echo ('<p>You are logged in as ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '. | <a href="logout.php">Log Out</a></p>');
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
      <h2>Export Admin User Database</h2>
     </div>
     <div class="mainContent">
     This will export the entire Admin User table into an XML file that is stored in the root folder of the server as <a href="adminusers.xml">adminusers.xml</a>
     </div>
       <div class="mainContent">
      <p>
	  <?php
	  
	  	  //or die('Could not connect: ' . mysql_error())
		  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Could not connect: ' . mysql_error());
		  $query = 'SELECT * FROM admin_user';
		  $data = mysqli_query($dbc, $query) or die('Error 1: ' . mysql_error());
		  $row = mysqli_fetch_array($data) or die('Error 2: ' . mysql_error());
		  
		  if ($row != NULL) {
			  $admin_ID = $row['adminID'];
			  $username = $row['username'];
			  $password = $row['password'];
			  $joinDate = $row['joinDate'];
			  $first_name = $row['firstname'];
			  $other_names = $row['othernames'];
			  $last_name = $row['lastname'];
			  $gender = $row['gender'];
			  $dob = $row['dateofbirth'];
			  $age = $row['age'];
			  $address = $row['address'];
			  $telnumber = $row['telephoneNumber'];
			  $email = $row['emailAddress'];
			  
			  mysqli_close($dbc);
			} else {
			  $error_msg = 'There was a problem accessing the database.';
			}
		  
		 
		  if (isset($_POST['submit'])) {
					  $xml = simplexml_load_file("adminusers.xml");
					  $sxe = new SimpleXMLElement($xml->asXML());
					  
					  $trainst = $sxe->addChild("adminuser");
					  $trainst->addChild("adminID", "$admin_ID");
					  $trainst->addChild("username", "$username");
					  $trainst->addChild("password", "$password");
					  $trainst->addChild("joinDate", "$joinDate");
					  $trainst->addChild("firstname", "$first_name");
					  $trainst->addChild("othernames", "$other_names");
					  $trainst->addChild("lastname", "$last_name");
					  $trainst->addChild("gender", "$gender");
					  $trainst->addChild("dob", "$dob");
					  $trainst->addChild("age", "$age");
					  $trainst->addChild("address", "$address");
					  $trainst->addChild("telephoneNumber", "$telnumber");
					  $trainst->addChild("emailAddress", "$email");
					  
					  $sxe->asXML("adminusers.xml");
					  $error_msg =  "Export Successful";
					  } else {
						  $error_msg =  "";
						  }
	  ?>
      <?php echo '<p>' . $error_msg . '</p>'; ?>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="adminExportAdminUserDatabase" id="adminExportAdminUserDatabase">
          <fieldset class="submit">
          <input type="submit" class="submit" name="submit" value="Export Database">
          </fieldset>
      </form>
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



