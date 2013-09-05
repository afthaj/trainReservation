<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" height="160" border="0">
<form id="form1" name="form1" method="post" action="addNewtrainstation.php" target="frame3">
    <tr>
    <td width="43%">ID :</td>
    
    
     <td> <label for="teacherId"></label>
      <input type="text" name="trainId" id="trainId" />
    </td>
  </tr>
  <tr>
    <td>TRAIN STATION  : </td>
    <td>
      <label for="trainStation"></label>
      <input type="text" name="trainStation" id="trainStation" />
    </td>
  </tr>
  <tr>
    <td>DISTRICT : </td>
    <td><input type="text" name="trainDistrict" id="trainDistrict" /></td>
  </tr>
  <tr>
    <td>
    <input type="submit" name="inserttrainStaionOk" id="inserttrainStaionOk" value="Submit" />
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

$s1= $_POST['trainId'];
$s2= $_POST['trainStation'];
$s3= $_POST['trainDistrict'];
if (!$s1 || !$s2)
{
	echo "you have not entered the values";
	exit; 
	}
	
else
{	
	
$xml = simplexml_load_file("addNewtrainstation.xml");
$sxe = new SimpleXMLElement($xml->asXML());
$trainst = $sxe->addChild("trainst");
$trainst->addChild("trainid", "$s1");
$trainst->addChild("trainstation", "$s2");
$trainst->addChild("district", "$s3");

$sxe->asXML("addNewtrainstation.xml");
}


?>
</body>
</html>