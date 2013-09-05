<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" height="160" border="0">
<form id="form1" name="form1" method="post" action="addNewtrainroute.php" target="frame3">
    <tr>
    <td width="43%">ID :</td>
    
    
     <td> <label for="routeId"></label>
      <input type="text" name="routeId" id="routeId" />
    </td>
  </tr>
  <tr>
    <td>START  : </td>
    <td>
      <label for="teacherName"></label>
      <input type="text" name="routeStart" id="routeStart" />
    </td>
  </tr>
  <tr>
    <td>END : </td>
    <td><input type="text" name="routeEnd" id="routeEnd" /></td>
  </tr>
  <tr>
    <td>
    <input type="submit" name="insertRouteOk" id="insertRouteOk" value="Submit" />
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

$s1= $_POST['routeId'];
$s2= $_POST['routeStart'];
$s3= $_POST['routeEnd'];
if (!$s1 || !$s2)
{
	echo "you have not entered the values";
	exit; 
	}
	
else
{	
	
$xml = simplexml_load_file("addNewtrainroute.xml");
$sxe = new SimpleXMLElement($xml->asXML());
$trainst = $sxe->addChild("route");
$trainst->addChild("rId", "$s1");
$trainst->addChild("pStart", "$s2");
$trainst->addChild("pEnd", "$s3");

$sxe->asXML("addNewtrainroute.xml");
}


?>
</body>
</html>