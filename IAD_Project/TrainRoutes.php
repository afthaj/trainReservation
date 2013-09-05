<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="sryles.css" type="text/css" rel="stylesheet" />

<script type="text/javascript">
	function checkLocations() {
		
		//store entered values of the user.
		
		var from = document.routePage.from.value;
		var to = document.routePage.to.value;
		
		var Dtime = document.routePage.deptime.value;	
		var Atime = document.routePage.arrivetime.value;	
		
		//check depature and arrival stations are distinct
			if (from == to){
				alert('Enter distinct Depature and Arrival Stations for your Search')
				return false;
				}
			//check depature and arrival times are distinct
			else if(Dtime == Atime){
				alert('Enter distinct Depature and Arrival Times for your Search')
				return false;
				}
		return true;
		}
</script>

</head>

<body bgcolor="#fff">

  <form method="post" action="getroteID2.php">
  <h3>Choose your search options</h3>
  <h4>Choose Depature and Arrival Station</h4>
  
  <label for"from">Depature Station:</label>
  <select name = "from">
    <option>--Select--</option>
    <option>Aluthgama</option>
    <option>Anuradhapura</option>
    <option>Batticaloa</option>
    <option>Badulla</option>
    <option>Bandarawela</option>
    <option>Colombo-Fort</option>
    <option>Colombo</option>
    <option>Galle</option>
    <option>Hatton</option>
    <option>Kurunegala</option>
    <option>Kandy</option>
    <option>Matale</option>
    <option>Matara</option>
    <option>Maradana</option>
    <option>Trincomalee</option>
    <option>Vavuniya</option>
  </select>
  <label for="to">Arrival Station:</label>
  <select name = "to">
    <option>--Select--</option>
    <option>Aluthgama</option>
    <option>Anuradhapura</option>
    <option>Batticaloa</option>
    <option>Badulla</option>
    <option>Bandarawela</option>
    <option>Colombo-Fort</option>
    <option>Colombo</option>
    <option>Galle</option>
    <option>Hatton</option>
    <option>Kurunegala</option>
    <option>Kandy</option>
    <option>Matale</option>
    <option>Matara</option>
    <option>Maradana</option>
    <option>Trincomalee</option>
    <option>Vavuniya</option>
  </select>
  
  <h4>Include Time</h4>
  
  <label for="deptime">Depature time:</label>
  <select name = "deptime">
    <option>0000</option>
    <option>0100</option>
    <option>0200</option>
    <option>0300</option>
    <option>0400</option>
    <option>0500</option>
    <option>0600</option>
    <option>0700</option>
    <option>0800</option>
    <option>0900</option>
    <option>1000</option>
    <option>1100</option>
    <option>1200</option>
    <option>1300</option>
    <option>1400</option>
    <option>1500</option>
    <option>1600</option>
    <option>1700</option>
    <option>1800</option>
    <option>1900</option>
    <option>2000</option>
    <option>2100</option>
    <option>2200</option>
    <option>2300</option>
    <option>2400</option>
  </select> 
  
  <label for="arrivetime">Arrival time:</label>
  <select name = "arrivetime">
    <option>2400</option>
    <option>2300</option>
    <option>2200</option>
    <option>2100</option>
    <option>2000</option>
    <option>1900</option>
    <option>1800</option>
    <option>1700</option>
    <option>1600</option>
    <option>1500</option>
    <option>1400</option>
    <option>1300</option>
    <option>1200</option>
    <option>1100</option>
    <option>1000</option>
    <option>0900</option>
    <option>0800</option>
    <option>0700</option>
    <option>0600</option>
    <option>0500</option>
    <option>0400</option>
    <option>0300</option>
    <option>0200</option>
    <option>0100</option>
    <option>0000</option>
  </select>
  <br/><br />
  <input type="submit" value="Search" name="submit" />
  <input type="reset" value="Reset"/>
  </form>
</body>
</div>
</html>
