<?php 

$s1= $_GET['txtUserName'];
$s2= $_GET['txtPassword'];


$objDOM = new DOMDocument(); 
$objDOM->load('users.xml');
$users = $objDOM->getElementsByTagName("user"); 
 
foreach( $users as $user )
  {
    $usernames = $user->getElementsByTagName("usernames");
    $username  = $usernames->item(0)->nodeValue;

    $passwords = $user->getElementsByTagName("passwords");
    $password  = $passwords->item(0)->nodeValue;
	
	echo '$username' . '$password';
  } 



if ("$username" == "$s1"){
   header("Location: adminview.php?txtUserName=$s1");
 }
else 
 
 {
 
 			echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";

			echo "<html
 xmlns='http://www.w3.org/1999/xhtml'>";
			echo "<head>";
			echo "<meta http-equiv='content-type'Content-Type' content='text/html; charset=utf-8' />";
			echo "<title>userlogin</title>";
			echo "</head>";
			echo "<body>";

 			echo "<p> please wait while validation complete </p>";
  			echo "password incorrect"; 
  			
		



			echo "</body>";

			
 }


?>

</html>