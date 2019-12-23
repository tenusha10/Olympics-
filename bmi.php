<<!DOCTYPE html>
<html>
<head>
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
	text-align:right;
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
<body>
<table class="table" border="1">
<?php
if(isset($_REQUEST["submit"])){
$min_weight= $_REQUEST['min_weight'];
$max_weight= $_REQUEST['max_weight']; //gets user inputs
$min_height= $_REQUEST['min_height'];
$max_height= $_REQUEST['max_height'];
echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>'; //button to return back to html page
if(is_numeric(trim($min_height))==false||is_numeric(trim($max_height))==false|| is_numeric(trim($min_weight))==false ||is_numeric(trim($max_weight))==false){ //check inputs are in numeric format
$errormessage="Error: has to be numeric characters";
echo $errormessage;
}elseif($min_weight>$max_weight){ //logical check to see max weight is smaller than minimum 
	$errormessage="Error: minimum weight cannot be bigger than maximum weight";
	echo $errormessage;
}elseif($min_height>$max_height){//logical check to see max height is smaller than minimum 
	$errormessage="Error: minimum height cannot be bigger than maximum height";
	echo $errormessage;
}else{
echo '<tr>';
echo '<td>'.'Weight ↓ Height→'.'</td>';  //generates table
for($k=$min_height;$k<=$max_height;$k+=5){
        echo '<td>'.$k.'</td>';
}
echo '</tr>';
for($i=$min_weight;$i<=$max_weight;$i=$i+5){
	echo '<tr>';
	echo '<td>'.$i.'</td>';
	for($j=$min_height; $j <= $max_height; $j=$j+5) {
            echo '<td>'.round(($i/(($j/100)*($j/100))),3).'</td>';  //BMI formula       
	}
	echo '</tr>';
}
}
}
?>
</table>  
</body>
</html>