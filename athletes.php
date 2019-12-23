<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex, nofollow" />
<title>Athletes Task</title>
<style type="text/css">
/* style shett to match the styling of the html file */
body {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	background-color: bisque;
}
.center {
	text-align:center;
}
body,td,th {
	color: brown; 
}
.larger {
	font-size:larger;
	text-align:left;
}
table {
	margin-left:auto;
	margin-right:auto;
}
.fixed {
	font-family: Courier, monospace;
	white-space: pre;
	background-color:cornsilk;
}
</style>
<?php
//establishing connection to the database
require_once 'MDB2.php';
if(isset($_REQUEST["submit"])){ // validation to check if submit button is pressed 
	$country_id=$_REQUEST['country_id'];
	$part_name=$_REQUEST['part_name'];
	echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>'; //button to return back to html page
	if($country_id=="" || $part_name==""){ //checks no fields are empty
		$errormessage="Error: fields cannot be blank, Please return to previous page and enter data to all fields";
		echo $errormessage;
	}elseif(is_numeric(trim($country_id))==true || is_numeric(trim($part_name))==true){ //checks user have entered numeric characters
		$errormessage="Error: Input cannot be numbers has to be alaphabetic characters, Please return to previous page and enter data in correct format";
		echo $errormessage;
	}elseif(strlen($country_id)>3 || strlen($country_id)<3){ //check the sountry id is in valid format
		$errormessage="Error: Country ID has to be  3 characters long, please return to previous page and enter valid country id";
		echo $errormessage;
	}
	
	else{
$host='localhost';
$dbName='coa123cdb';

$username='coa123cycle';
$password='bgt87awx';

$dsn = "mysql://$username:$password@$host/$dbName"; 
$db =& MDB2::connect($dsn); 

//catches error if not connected
if (PEAR::isError($db)) {
die($db->getMessage()); }

//sql to get data from database 
$sql="SELECT `name`, `gender`, `weight`, `height` FROM Cyclist WHERE `ISO_id`='$country_id' AND `name` LIKE '%$part_name%' " ;
$res =& $db->query($sql);

if (PEAR::isError($res)) {
die($res->getMessage()); }



$NumRows= $res->numRows();
echo '<table border=1>';
echo '<tr>';
echo '<td>'.'Cyclist name'.'</td>';
echo '<td>'.'Cyclist Sex'.'</td>';
echo '<td>'.'Cyclist BMI'.'</td>';
echo '</tr>';
for($i=1;$i<=$NumRows;$i++){ //generates table
	echo '<tr>';
	$row = $res->fetchrow();
	for($j=0; $j <=1; $j++) {
		echo '<td>'.$row[$j].'</td>';
	}
	if($row[2]!=0 || $row[3]!=0){
	$bmi=round(($row[2]/(($row[3]/100)*($row[3]/100))),3);
	echo '<td>'.$bmi.'</td>';
	}else{
		echo '<td>'.'No Weight or Height Data available'.'</td>';
	}
	echo '</tr>';
}

echo '</table>';
	}
}
?>
</head>
<body>
</body>
</html>