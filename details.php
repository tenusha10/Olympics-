<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex, nofollow" />
<title>Details Task</title>
<style type="text/css">
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
</head>
<?php
if(isset($_REQUEST["submit"])){ //validates submit has been clicked
require_once 'MDB2.php';

$date_1=$_REQUEST['date_1'];
$date_2=$_REQUEST['date_2'];

$host='localhost';
$dbName='coa123cdb';

$username='coa123cycle';
$password='bgt87awx';

$dsn = "mysql://$username:$password@$host/$dbName"; 
$db =& MDB2::connect($dsn); 

if (PEAR::isError($db)) {
die($db->getMessage()); }


$db->setFetchMode(MDB2_FETCHMODE_ASSOC);

list($d,$m,$y)=explode('/',$date_1); //change format of date to match database
$date_1= $y.'-'.$m.'-'.$d;

list($d,$m,$y)=explode('/',$date_2);
$date_2= $y.'-'.$m.'-'.$d;

echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>'; //button to return back to html page
if($date_2<$date_1){ //validation to check if date 1 is smaller than date 2
	$error="Error: Date 1 has to be smaller than Date 2";
	echo $error;
}else{

$sql=" SELECT Cyclist.name , Country.country_name, Country.gdp, Country.population FROM Country JOIN Cyclist ON Country.ISO_id = Cyclist.ISO_id WHERE Cyclist.dob >= '$date_1' AND Cyclist.dob <= '$date_2' ";


$res =& $db->query($sql);

if(PEAR::isError($res)){
    die($res->getMessage());
}

echo '<div align="left">' ; 
	echo "<hr/>";
    echo json_encode( $db->queryAll($sql) );  //outputs json

echo "</div>"; 
}
}
?>
</body>
</html>

