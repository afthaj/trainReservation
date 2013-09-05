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
<title>Update Latest News | TrainReserve Admin</title>
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
      <h2>Update Latest News Ticker</h2>
     </div> 
       <div class="mainContent">
      <p>
	  <?php 
		  $date = $_POST['date'];
		  $content = $_POST['content'];
		  
		  if (isset($_POST['submit'])) {
			  if (empty($date) || empty($content)) {
				  $error_msg = "Please enter values in both the Date and Content fields";
				  } else {
					  $xml = simplexml_load_file("latestnews.xml");
					  $sxe = new SimpleXMLElement($xml->asXML());
					  $trainst = $sxe->addChild("newsitem");
					  $trainst->addChild("date", "$date");
					  $trainst->addChild("content", "$content");
					  
					  $sxe->asXML("latestnews.xml");
					  $error_msg =  "Input Successful";
					  }
		  } else {
			  $error_msg =  "";
			  }
	  ?>
      <?php echo '<p>' . $error_msg . '</p>'; ?>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="adminLatestNews" id="adminLatestNews" onsubmit="return validateAdminLatestNews(this.form)">
        <fieldset>
        <legend><span>News Content</span></legend>
        
        <ol>
          <li>
          <label for="date">Date :</label>
          <input type="text" id="date" name="date" onblur="validateDate(this, document.getElementById('date_help'))" value="<?php if (!empty($date)) echo $date; ?>" size="11" maxlength="10" />
          <span id="date_help" class="helpText"></span>
          <br />
          </li>
          <li>
          <label for="content">Content :</label>
          <textarea rows="5" cols="40" id="content" name="content" onblur="validateNonEmpty(this, document.getElementById('content_help'))"><?php if (!empty($content)) echo $content; ?></textarea>
          <span id="content_help" class="helpText"></span>
          <br />
          </li>
          </ol>
          </fieldset>
          
          <fieldset class="submit">
          <input type="submit" class="submit" name="submit" value="Update Latest News">
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



