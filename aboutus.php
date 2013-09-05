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
<title>About Us | TrainReserve</title>
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
            <h2>About Us</h2>
            <h3>Group Number: 3</h3>
         </div> 
         <div class="mainContent">
            <table border="1" class="aboutus" cellpadding="5em 10em">
              <thead>
                <th>Name of Group Member</th>
                <th>Registration Number</th>
                <th>Index Number</th>
                <th>Email Address</th>
                <th>Picture</th>
              </thead>
                
              <tbody>
                <tr>
                <td>Aftha Jaldin (Team Leader)</td>
                <td>2009/ICT/016</td>
                <td>09020162</td>
                <td>aftha.jaldin88@gmail.com</td>
                <td><img src="images/groupmemberpics/aftha.jpg" alt="Aftha" width="200" height="262"/></td>
                </tr>
                <tr>
                <td>Rajith Shalika</td>
                <td>2009/ICT/017</td>
                <td>09020179</td>
                <td>rajithshalika@gmail.com</td>
                <td><img src="images/groupmemberpics/rajitha.jpg" alt="Rajith" width="200" height="285"/></td>
                </tr>
                <tr>
                <td>Milinda Jayatilaka</td>
                <td>2009/ICT/018</td>
                <td>09020187</td>
                <td>milinda_vj7@yahoo.com</td>
                <td><img src="images/groupmemberpics/milinda.jpg" alt="Milinda" width="200" height="200"/></td>
                </tr>
                <tr>
                <td>Samudika Imbulpe</td>
                <td>2009/ICT/015</td>
                <td>09020152</td>
                <td>samudikaimbulpe@gmail.com</td>
                <td><img src="images/groupmemberpics/default_female.jpg" alt="Samudika" width="200" height="126"/></td>
                </tr>
                <tr>
                <td>Vasundara Jayaweera</td>
                <td>2009/ICT/019</td>
                <td>09020195</td>
                <td>vasundara90@gmail.com</td>
                <td><img src="images/groupmemberpics/default_female.jpg" alt="Vasundara" width="200" height="126"/></td>
                </tr>
              </tbody>
            </table>
         </div>
         
         <div class="mainContent">
           <h3>References</h3>
           <ul>
           		<li>Sri Lanka Railways Website - <a href="http://www.railway.gov.lk/index.php">http://www.railway.gov.lk/index.php</a> - Retrieved on 30-12-2010</li>
                <li>Wikipedia - <a href="http://en.wikipedia.org/wiki/Main_Page">http://en.wikipedia.org/wiki/Main_Page</a></li>
                <li>Wikipedia - Sri Lanka Railways - <a href="http://en.wikipedia.org/wiki/Sri_Lanka_Railways">http://en.wikipedia.org/wiki/Sri_Lanka_Railways</a> - Retrieved on 30-12-2010</li>
                <li>Wikipedia - Rail transport in Sri Lanka - <a href="http://en.wikipedia.org/wiki/Rail_transport_in_Sri_Lanka">http://en.wikipedia.org/wiki/Rail_transport_in_Sri_Lanka</a> - Retrieved on 30-12-2010</li>
                <li>Wikipedia - List of railway stations in Sri Lanka - <a href="http://en.wikipedia.org/wiki/List_of_railway_stations_in_Sri_Lanka">http://en.wikipedia.org/wiki/List_of_railway_stations_in_Sri_Lanka</a> - Retrieved on 30-12-2010</li>
                <li>Wikipedia - List of railway stations by line order in Sri Lanka - <a href="http://en.wikipedia.org/wiki/List_of_railway_stations_by_line_order_in_Sri_Lanka">http://en.wikipedia.org/wiki/List_of_railway_stations_by_line_order_in_Sri_Lanka</a> - Retrieved on 30-12-2010</li>
           </ul>
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



