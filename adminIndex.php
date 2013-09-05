<?php

session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['adminID'])) {
    if (isset($_COOKIE['adminID']) && isset($_COOKIE['username'])) {
      $_SESSION['adminID'] = $_COOKIE['adminID'];
      $_SESSION['username'] = $_COOKIE['username'];
    }
	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . 'index.php';
	header('Location: ' . $home_url);
  }

	require_once('connectvars.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Home | TrainReserve Admin</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script src="formscripts.js"></script>
<script src="aino-galleria/src/jquery-1.4.2.js"></script>
<script src="aino-galleria/src/galleria.js"></script>
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
    <div id="TICKER" style="overflow:hidden; width:1375px" onmouseover="TICKER_PAUSED=true" onmouseout="TICKER_PAUSED=false"><? include "newsticker.php" ?></div>
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
    
       <div class="mainContent">
        <h2>Admin Home Page</h2>
      <p><a href="adminLatestNews.php">Update Latest News</a></p>
      <p><a href="adminExportAdminUserDatabase.php">Export Admin User Database</a></p>
      <p><a href="adminExportPassengerDatabase.php">Export Passenger Database</a></p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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



