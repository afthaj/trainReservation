<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>-->

<?php 

$s1= $_POST['passengerId'];
$s2= $_POST['passengerName'];
$s3= $_POST['passengerRoute'];
if (isset($_POST['submit'])) {
	if (empty($s1) || empty($s2) || empty($s3)) {
		echo "you have not entered the values";
		} else {
			$xml = simplexml_load_file("addNewpassenger.xml");
			$sxe = new SimpleXMLElement($xml->asXML());
			$trainst = $sxe->addChild("passenger");
			$trainst->addChild("passengerId", "$s1");
			$trainst->addChild("passengerName", "$s2");
			$trainst->addChild("passengerRoute", "$s3");
			
			$sxe->asXML("addNewpassenger.xml");
			echo 'input successful';
			}
}
?>

<table width="80%" border="0">
<form id="form1" name="form1" method="post" action="addNewpassenger.php">
    <tr>
    <td width="43%">ID :</td>
     <td> <label for="passengerId"></label>
      <input type="text" name="passengerId" id="passengerId" />
    </td>
  </tr>
  <tr>
    <td>NAME  : </td>
    <td>
      <label for="pasengerName"></label>
      <input type="text" name="passengerName" id="passengerName" />
    </td>
  </tr>
  <tr>
    <td>ROUTE : </td>
    <td><input type="text" name="passengerRoute" id="passengerRoute" /></td>
  </tr>
  <tr>
    <td>
    <input type="submit" name="submit" id="submit" value="Submit" />
    </form>
    </td>
  </tr>
</table>
</body>
</html>