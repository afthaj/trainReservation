<?php

session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['passengerID'])) {
    if (isset($_COOKIE['passengerID']) && isset($_COOKIE['username'])) {
      $_SESSION['passengerID'] = $_COOKIE['passengerID'];
      $_SESSION['username'] = $_COOKIE['username'];
	  
    }
  }

	require_once('connectvars.php');
	
	$output = false;
	
	if (!isset($_SESSION['passengerID'])){
		$output = true;
		} else {
			$output = false;
			}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Home | TrainReserve</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script src="formscripts.js"></script>
<script src="aino-galleria/src/jquery-1.4.2.js"></script>
<script src="aino-galleria/src/galleria.js"></script>
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
    <div id="TICKER" style="overflow:hidden; width:1085px" onmouseover="TICKER_PAUSED=true" onmouseout="TICKER_PAUSED=false"><? include "newsticker.php" ?></div>
    <script type="text/javascript" src="webticker_lib.js" language="javascript"></script>
    </div>
    
    <div class="mainContent">
    <div id="gallery">
      <ul>
	    <li><img src="images/railway_logo.jpg" alt="map"></li>
        <li><img src="images/maps/3.jpg" alt="map"></li>
        <li><img src="images/train1.jpg" alt="map"></li>
        <li><img src="images/maps/4.png" alt="map"></li>
        <li><img src="images/train2.jpg" alt="map"></li>
        <li><img src="images/maps/1.gif" alt="map"></li>
        <li><img src="images/history1.gif" alt="map"></li>
        <li><img src="images/maps/2.jpg" alt="map"></li>
        <li><img src="images/history2.gif" alt="map"></li>
      </ul> 
    </div>
    </div>
    
    <div class="visionandmission">
      <h3>Vision</h3>
      <p>To be the most sought after land transport provider in Sri Lanka providing unsurpassed value to our stakeholders.</p>
      <h3>Mission</h3>
      <p>“Provision of a safe, reliable and punctual rail transport service for both passenger and freight traffic, economically and efficiently”</p>
    </div>
    
	 <div class="mainContent">
      <h2>Welcome</h2>
     </div> 
       <div class="mainContent">
      <p>Sri Lanka’s rail transportation has a history of over a century. It has contributed immensely to the growth of the economy of the country. Initially it played a prominent role in the growth of the export sector of tea, rubber and coconut which formed the backbone of the country’s economy. Today, Sri Lanka Railways provides a valuable service to the traveling public, especially commuters to and from Colombo, continuing it’s journey.</p>
      <p>The Sri Lanka Railway carries about 105 million passengers and almost 1.6 Million metric tonnes of freight per annum. Accordingly it performs 4.4 bn Passenger km and 138 million freight tonne- Km annually. Since it is the most economical mode of transport for passengers as well as freight, the railway system can contribution immensely to the development of the country. Plans have been drawn up to increase the railway share of passenger transport from 5% to 10% and modal share of freight transport from 2% to 10% by 2015.</p>
      <p>The TrainReserve train reservation system hopes to automate the present partially manual process. Presently, a system is available to check the train schedule alone. Therefore, through TrainReserve, we hope to add value to the railway service provided to the customer by providing timely train schedules and convenience in reserving train tickets. The customer can now reserve their tickets in the comfort of their home and arrive at the railway station relaxed and ready for the enjoyable journey ahead.</p>
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

<script>
    
    // Load theme
    Galleria.loadTheme('aino-galleria/src/themes/dots/galleria.dots.js');
    
    $('#gallery').galleria();
    
</script>
  
</body>
</html>



