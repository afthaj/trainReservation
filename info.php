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
<title>Train Route Information | TrainReserve</title>
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
      <h2>Train Route Information</h2>
     </div> 
      <div class="mainContent">
      <p>Rail Transport in Sri Lanka consists of a heavy-rail intercity network connecting major population centres and commuter rail serving Colombo commuter traffic. Sri Lanka Railways, originally known as Ceylon Government Railways, is the nation's state-run railway operator, and was conceived in the 1850s as an instrument to develop and unify Sri Lanka. Service began in 1864, with the construction of the Main Line from Colombo to Ambepussa, 54 kilometers to the east.</p>
      <p>The Railway was initially built to transport coffee and tea from the hill country to Colombo for export. For many years, transporting such goods was the main source of income on the line. With time and population growth, however, passenger traffic increased. In the 1960s, passenger traffic overtook freight as the main source of revenue. The railway is now primarily engaged in the transport of passengers, especially commuters to and from Colombo, thereby reducing road congestion.</p>
      <p>The first train ran on 27 December 1864. The line was officially opened for traffic on 2 October 1865. The Main Line was extended in stages with service to Kandy in 1867, to Nawalapitiya in 1874, to Nanu-Oya in 1885, to Bandarawela in 1894, and to Badulla in 1924.</p>
      <p>Other lines were completed in due course to link the country: the Matale Line in 1880, the Coast Line in 1895, the Northern Line in 1905, the Mannar Line in 1914, the Kelani Valley Line in 1919, the Puttalam Line in 1926, and the Batticaloa and Trincomalee Lines in 1928.</p>
      <p><br /></p>
      <p>The Railway network comprises nine lines radiating from Colombo, which connect most major population and industrial centers.</p>
      <table border="1" cellpadding="5px">
      
      <thead>
      	<th>Name</th>
        <th>Description</th>
        <th>Route Map</th>
      </thead>
      
      <tbody valign="top">
        <tr>
        	<td>Main Line</td>
            <td>The Main Line starts from Colombo and runs east and north past the rapidly developing centers of Ragama, Gampaha, Veyangoda, and Polgahawela. At Rambukkana, the Main Line begins its steep climb into the hills of the upcountry. Between Balana and Kadugannawa, the track clings to the side of sheer cliffs, offering passengers spectacular views of Batalegala ('Bible' Rock). The Main Line then continues its climb through the scenic tea country, connecting busy local market centers at Gampola, Nawalapitiya, and Hatton before reaching Nanu-Oya. This is the connection to the former colonial resort of Nuwara Eliya, still popular for its temperate climate, classic hotels, and British-style gardens. The Main Line continues its ascent to the summit at Pattipola, 6,226 feet above sea level, before descending past Bandarawela to Badulla. In the upcountry, passengers are rewarded with views of tea gardens, mountains and valleys, cascading torrents and waterfalls.</td>
            <td><img src="images/trainlines/final/main_line.jpg" alt="Main Line"></td>
        </tr>
        <tr>
        	<td>Matale Line</td>
            <td>The Matale Line branches off the Main Line at Peradeniya Junction, near the world-famous Peradeniya Botanical Gardens. It connects to Kandy, home of the Sri Dalada Maligawa, which houses the Sacred Tooth Relic of the Lord Buddha, before descending to Matale.</td>
            <td><img src="" alt="Matale Line"></td>
        </tr>
        <tr>
        	<td>Coast Line</td>
            <td>The Coast Line runs south from Colombo, following the edge of the Indian Ocean. It offers passengers views of tropical beaches and coconut palms. This line links the regional towns of Moratuwa, Panadura, and Kalutara South, as well as popular beach resorts at Aluthgama, Ambalangoda, and Hikkaduwa. The line continues past Galle, which is famous for its historic and well-preserved Dutch Fort, before terminating at Matara.</td>
            <td><img src="images/trainlines/final/coastal_line.jpg" alt="Coast Line"></td>
        </tr>
        <tr>
        	<td>Kelani Valley Line</td>
            <td>The Kelani Valley Line extends from Colombo-Maradana and east to Avissawella. This was originally built as a narrow gauge line and was converted to dual gauge between 1991 and 1997.</td>
            <td align="center"><img src="images/trainlines/final/kelani_valley_line.jpg" alt="Kelani Valley Line"></td>
        </tr>
        <tr>
        	<td>Puttalam Line</td>
            <td>The Puttalam Line branches off the Main Line at Ragama, extending north past Negombo, an important regional town and tourist centre. It also links other busy market towns and fishing villages.</td>
            <td><img src="images/trainlines/final/puttalam_line.jpg" alt="Puttalam Line"></td>
        </tr>
        <tr>
        	<td>Northern Line</td>
            <td>The Northern Line branches northward from the Main Line at Polgahawela, passing Kurunegala, the capital of North western Province, before continuing to the historic cultural and religious center of Anuradhapura, the island's ancient capital around the 4th century BCE and home to many sites of religious and archaeological interest. Service is now curtailed beyond Vavuniya.</td>
            <td><img src="images/trainlines/final/northern_line.jpg" alt="Northern Line"></td>
        </tr>
        <tr>
        	<td>Batticaloa Line</td>
            <td>The Batticaloa Line branches eastward from the Northern Line at Maho, to Polonnaruwa, site of an ancient capital in the 11th century and home to many historic monuments. The line continues to the eastern city of Batticaloa.</td>
            <td><img src="images/trainlines/final/batticaloa_line.jpg" alt="Batticaloa Line"></td>
        </tr>
        <tr>
        	<td>Trincomalee Line</td>
            <td>The Trincomalee Line branches north and east from the Batticaloa Line at Gal-Oya Junction and extends to Trincomalee.</td>
            <td><img src="images/trainlines/final/trincomalee_line.jpg" alt="Trincomalee Line"></td>
        </tr>
        <tr>
        	<td>Mannar Line</td>
            <td>Lorum Ipsum Dolor Sit Amet</td>
            <td><img src="images/trainlines/final/mannar_line.jpg" alt="Mannar Line"></td>
        </tr>
      </tbody>
      
      </table>
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



