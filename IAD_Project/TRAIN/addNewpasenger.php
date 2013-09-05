<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" height="160" border="0">
<form id="form1" name="form1" method="post" action="addNewpasenger.php" target="frame3">
    <tr>
    <td width="43%">ID :</td>
    
    
     <td> <label for="teacherId"></label>
      <input type="text" name="pasengerId" id="pasengerId" />
    </td>
  </tr>
  <tr>
    <td>NAME  : </td>
    <td>
      <label for="teacherName"></label>
      <input type="text" name="pasengerName" id="pasengerName" />
    </td>
  </tr>
  <tr>
    <td>ROUTE : </td>
    <td><input type="text" name="passengerRoute" id="passengerRoute" /></td>
  </tr>
  <tr>
    <td>
    <input type="submit" name="insertPassengerOk" id="insertPassengerOk" value="Submit" />
    </form>
      
    </td>
    <td>
    <form>
   <input type="submit" name="back" id="back" value="back"  src="adminview.php" />
      
    </form>
    
    </td>
  </tr>
</table>

<?php 

$s1= $_POST['pasengerName'];
$s2= $_POST['passengerRoute'];
$s3= $_POST['insertPassengerOk'];
if (!$s1 || !$s2)
{
	echo "you have not entered the values";
	exit; 
	}
	
else
{	
	
$xml = simplexml_load_file("addNewpassenger.xml");
$sxe = new SimpleXMLElement($xml->asXML());
$trainst = $sxe->addChild("passenger");
$trainst->addChild("pId", "$s1");
$trainst->addChild("pName", "$s2");
$trainst->addChild("pRoute", "$s3");

$sxe->asXML("addNewpassenger.xml");
}


?>
</body>
</html>