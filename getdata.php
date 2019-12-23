<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex, nofollow" />
<title>Details Task</title>
</head>
<?php
require_once 'MDB2.php';
$host='localhost';
$dbName='coa123cdb';
$username='coa123cycle';
$password='bgt87awx';
$dsn = "mysql://$username:$password@$host/$dbName"; 
$db =& MDB2::connect($dsn); 
if (PEAR::isError($db)) {
die($db->getMessage()); }
$db->setFetchMode(MDB2_FETCHMODE_ASSOC);

if($_REQUEST['noofcount']==2){
    $country1=$_REQUEST['country_id1'];
    $country2=$_REQUEST['country_id2'];
    $criteria=$_REQUEST['criteria'];
   
    $sql1="SELECT country_name, gdp, population, total, gold, silver, bronze FROM Country WHERE ISO_id='$country1'";

    $sql2="SELECT country_name, gdp, population, total, gold, silver, bronze FROM Country WHERE ISO_id='$country2'";

    $sql3="SELECT name FROM Cyclist WHERE ISO_id='$country1' ORDER BY name ASC";
    $sql4="SELECT name FROM Cyclist WHERE ISO_id='$country2' ORDER BY name ASC";

    $res1 =& $db->query($sql1);
    if(PEAR::isError($res1)){
        die($res1->getMessage());
    }
    
    
    
    $res2 =& $db->query($sql2);
    if(PEAR::isError($res2)){
        die($res2->getMessage());
    }
    echo '<table border=1>';
    echo '<tr>';
    echo '<th scope="col">'.'Comparison'.'</th>';
    echo '<th scope="col">'.$country1.'</th>';
    echo '<th scope="col">'.$country2.'</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>'.'Country name:'.'</td>';
    $row1 = $res1->fetchRow();
    echo '<td>'.$row1['country_name'].'</td>';
    $row2 = $res2->fetchRow();
    echo '<td>'.$row2['country_name'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'Population'.'</td>';
    echo '<td>'.$row1['population'].'</td>';
    echo '<td>'.$row2['population'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'GDP'.'</td>';
    echo '<td>'.$row1['gdp'].'</td>';
    echo '<td>'.$row2['gdp'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'Gold medals'.'</td>';
    echo '<td>'.$row1['gold'].'</td>';
    echo '<td>'.$row2['gold'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'Silver medals'.'</td>';
    echo '<td>'.$row1['silver'].'</td>';
    echo '<td>'.$row2['silver'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'Total medals'.'</td>';
    echo '<td>'.$row1['total'].'</td>';
    echo '<td>'.$row2['total'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'Rank'.'</td>';
    if($criteria=="GDP"){
        if($row1['gdp']>=$row2['gdp']){
            echo '<td>'.'2'.'</td>';
            echo '<td>'.'1'.'</td>';
        }else{
            echo '<td>'.'1'.'</td>';
            echo '<td>'.'2'.'</td>';
        }
    }else if($criteria=="population"){
        if($row1['population']>=$row2['population']){
            echo '<td>'.'2'.'</td>';
            echo '<td>'.'1'.'</td>';
        }else{
            echo '<td>'.'1'.'</td>';
            echo '<td>'.'2'.'</td>';
        }
    }else{
        if($row1['total']>=$row2['total']){
            echo '<td>'.'1'.'</td>';
            echo '<td>'.'2'.'</td>';
        }else{
            echo '<td>'.'2'.'</td>';
            echo '<td>'.'1'.'</td>';
        }
    }
    echo '</table>';
    $col_res1 =& $db->query($sql3);
    if(PEAR::isError($res1)){
        die($col_res1->getMessage());
    } 
    $col_res2 =& $db->query($sql4);
    if(PEAR::isError($res2)){
        die($col_res2->getMessage());
    }

    echo "Cyclists:".$row1['country_name'];
    echo '<br>';
    while ($col1 = $col_res1->fetchRow()) {
        echo $col1['name']."<br/>";
    }
    echo '<br>';
    echo "Cyclists:".$row2['country_name'];
    echo '<br>';
    while ($col2 = $col_res2->fetchRow()) {
        echo $col2['name']."<br/>";
    }

}
if($_REQUEST['noofcount']==3){
    $country1=$_REQUEST['country_id1'];
    $country2=$_REQUEST['country_id2'];
    $country3=$_REQUEST['country_id3'];
    $criteria=$_REQUEST['criteria'];
   
    $sql1="SELECT country_name, gdp, population, total, gold, silver, bronze FROM Country WHERE ISO_id='$country1'";

    $sql2="SELECT country_name, gdp, population, total, gold, silver, bronze FROM Country WHERE ISO_id='$country2'";

    $sql3="SELECT country_name, gdp, population, total, gold, silver, bronze FROM Country WHERE ISO_id='$country3'";

    $sql4="SELECT name FROM Cyclist WHERE ISO_id='$country1' ORDER BY name ASC";
    $sql5="SELECT name FROM Cyclist WHERE ISO_id='$country2' ORDER BY name ASC";
    $sql6="SELECT name FROM Cyclist WHERE ISO_id='$country3' ORDER BY name ASC";

    $res1 =& $db->query($sql1);
    if(PEAR::isError($res1)){
        die($res1->getMessage());
    }
    
    
    
    $res2 =& $db->query($sql2);
    if(PEAR::isError($res2)){
        die($res2->getMessage());
    }

    $res3 =& $db->query($sql3);
    if(PEAR::isError($res3)){
        die($res3->getMessage());
    }

    echo '<table border=1>';
    echo '<tr>';
    echo '<th scope="col">'.'Comparison'.'</th>';
    echo '<th scope="col">'.$country1.'</th>';
    echo '<th scope="col">'.$country2.'</th>';
    echo '<th scope="col">'.$country3.'</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>'.'Country name:'.'</td>';
    $row1 = $res1->fetchRow();
    echo '<td>'.$row1['country_name'].'</td>';
    $row2 = $res2->fetchRow();
    echo '<td>'.$row2['country_name'].'</td>';
    $row3 = $res3->fetchRow();
    echo '<td>'.$row3['country_name'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'Population'.'</td>';
    echo '<td>'.$row1['population'].'</td>';
    echo '<td>'.$row2['population'].'</td>';
    echo '<td>'.$row3['population'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'GDP'.'</td>';
    echo '<td>'.$row1['gdp'].'</td>';
    echo '<td>'.$row2['gdp'].'</td>';
    echo '<td>'.$row3['gdp'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'Gold medals'.'</td>';
    echo '<td>'.$row1['gold'].'</td>';
    echo '<td>'.$row2['gold'].'</td>';
    echo '<td>'.$row3['gold'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'Silver medals'.'</td>';
    echo '<td>'.$row1['silver'].'</td>';
    echo '<td>'.$row2['silver'].'</td>';
    echo '<td>'.$row3['silver'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'Total medals'.'</td>';
    echo '<td>'.$row1['total'].'</td>';
    echo '<td>'.$row2['total'].'</td>';
    echo '<td>'.$row3['total'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'Rank'.'</td>';
    if($criteria=="GDP"){
        if(($row1['gdp']>=$row2['gdp'])&&($row1['gdp']>=$row3['gdp'])){
            if($row2['gdp']>=$row3['gdp']){
                echo '<td>'.'3'.'</td>';
                echo'<td>'.'2'.'</td>';
                echo'<td>'.'1'.'</td>';
            }else{
                echo '<td>'.'3'.'</td>';
                echo'<td>'.'1'.'</td>';
                echo'<td>'.'2'.'</td>';
            }
        }else if(($row2['gdp']>=$row1['gdp'])&&($row2['gdp']>=$row3['gdp'])){
            if($row1['gdp']>=$row3['gdp']){
                echo'<td>'.'2'.'</td>';
                echo '<td>'.'3'.'</td>';
                echo'<td>'.'1'.'</td>';
            }else{
                echo'<td>'.'1'.'</td>';
                echo '<td>'.'3'.'</td>';
                echo'<td>'.'2'.'</td>';
            }
        }else{
        if($row1['gdp']>=$row2['gdp']){
            echo '<td>'.'2'.'</td>';
            echo '<td>'.'1'.'</td>';
            echo '<td>'.'3'.'</td>';
        }else{
            echo '<td>'.'1'.'</td>';
            echo '<td>'.'2'.'</td>';
            echo '<td>'.'3'.'</td>';
        }
        }
    }else if($criteria=="population"){
        if(($row1['population']>=$row2['population'])&&($row1['population']>=$row3['population'])){
            if($row2['population']>=$row3['population']){
                echo '<td>'.'3'.'</td>';
                echo'<td>'.'2'.'</td>';
                echo'<td>'.'1'.'</td>';
            }else{
                echo '<td>'.'3'.'</td>';
                echo'<td>'.'1'.'</td>';
                echo'<td>'.'2'.'</td>';
            }
        }else if(($row2['population']>=$row1['population'])&&($row2['population']>=$row3['population'])){
            if($row1['population']>=$row3['population']){
                echo'<td>'.'2'.'</td>';
                echo '<td>'.'3'.'</td>';
                echo'<td>'.'1'.'</td>';
            }else{
                echo'<td>'.'1'.'</td>';
                echo '<td>'.'3'.'</td>';
                echo'<td>'.'2'.'</td>';
            }
        }else{
        if($row1['population']>=$row2['population']){
            echo '<td>'.'2'.'</td>';
            echo '<td>'.'1'.'</td>';
            echo '<td>'.'3'.'</td>';
        }else{
            echo '<td>'.'1'.'</td>';
            echo '<td>'.'2'.'</td>';
            echo '<td>'.'3'.'</td>';
        }
        }
    }else{
        if(($row1['total']>=$row2['total'])&&($row1['total']>=$row3['total'])){
            echo '<td>'.'1'.'</td>';
            if($row2['total']>=$row3['total']){
                echo'<td>'.'2'.'</td>';
                echo'<td>'.'3'.'</td>';
            }else{
                echo'<td>'.'3'.'</td>';
                echo'<td>'.'2'.'</td>';
            }
        }else if(($row2['total']>=$row1['total'])&&($row2['total']>=$row3['total'])){
            if($row1['total']>=$row3['total']){
                echo'<td>'.'2'.'</td>';
                echo '<td>'.'1'.'</td>';
                echo'<td>'.'3'.'</td>';
            }else{
                echo'<td>'.'3'.'</td>';
                echo '<td>'.'1'.'</td>';
                echo'<td>'.'2'.'</td>';
            }
        }else{
        if($row1['total']>=$row2['total']){
            echo '<td>'.'2'.'</td>';
            echo '<td>'.'3'.'</td>';
            echo '<td>'.'1'.'</td>';
        }else{
            echo '<td>'.'3'.'</td>';
            echo '<td>'.'2'.'</td>';
            echo '<td>'.'1'.'</td>';
        }
        }
    }
    echo '</table>';

 

    $col_res1 =& $db->query($sql4);
    if(PEAR::isError($res1)){
        die($col_res1->getMessage());
    } 
    $col_res2 =& $db->query($sql5);
    if(PEAR::isError($res2)){
        die($col_res2->getMessage());
    }

    $col_res3 =& $db->query($sql6);
    if(PEAR::isError($res3)){
        die($rcol_res3->getMessage());
    }

    echo "Cyclists:".$row1['country_name'];
    echo '<br>';
    while ($col1 = $col_res1->fetchRow()) {
        echo $col1['name']."<br/>";
    }
    echo '<br>';
    echo "Cyclists:".$row2['country_name'];
    echo '<br>';
    while ($col2 = $col_res2->fetchRow()) {
        echo $col2['name']."<br/>";
    }
    echo '<br>';
    echo "Cyclists:".$row3['country_name'];
    echo '<br>';
    while ($col3 = $col_res3->fetchRow()) {
        echo $col3['name']."<br/>";
    }
    echo '<br>';
}
if($_REQUEST['noofcount']==4){
    $country1=$_REQUEST['country_id1'];
    $country2=$_REQUEST['country_id2'];
    $country3=$_REQUEST['country_id3'];
    $country4=$_REQUEST['country_id4'];
    $criteria=$_REQUEST['criteria'];
   
    $sql1="SELECT country_name, gdp, population, total, gold, silver, bronze FROM Country WHERE ISO_id='$country1'";

    $sql2="SELECT country_name, gdp, population, total, gold, silver, bronze FROM Country WHERE ISO_id='$country2'";

    $sql3="SELECT country_name, gdp, population, total, gold, silver, bronze FROM Country WHERE ISO_id='$country3'";

    $sql4="SELECT country_name, gdp, population, total, gold, silver, bronze FROM Country WHERE ISO_id='$country4'";

    $sql5="SELECT name FROM Cyclist WHERE ISO_id='$country1' ORDER BY name ASC";
    $sql6="SELECT name FROM Cyclist WHERE ISO_id='$country2' ORDER BY name ASC";
    $sql7="SELECT name FROM Cyclist WHERE ISO_id='$country3' ORDER BY name ASC";
    $sql8="SELECT name FROM Cyclist WHERE ISO_id='$country4' ORDER BY name ASC";

    $res1 =& $db->query($sql1);
    if(PEAR::isError($res1)){
        die($res1->getMessage());
    } 
    $res2 =& $db->query($sql2);
    if(PEAR::isError($res2)){
        die($res2->getMessage());
    }

    $res3 =& $db->query($sql3);
    if(PEAR::isError($res3)){
        die($res3->getMessage());
    }

    $res4 =& $db->query($sql4);
    if(PEAR::isError($res4)){
        die($res4->getMessage());
    }

    echo '<table border=1>';
    echo '<tr>';
    echo '<th scope="col">'.'Comparison'.'</th>';
    echo '<th scope="col">'.$country1.'</th>';
    echo '<th scope="col">'.$country2.'</th>';
    echo '<th scope="col">'.$country3.'</th>';
    echo '<th scope="col">'.$country4.'</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>'.'Country name:'.'</td>';
    $row1 = $res1->fetchRow();
    echo '<td>'.$row1['country_name'].'</td>';
    $row2 = $res2->fetchRow();
    echo '<td>'.$row2['country_name'].'</td>';
    $row3 = $res3->fetchRow();
    echo '<td>'.$row3['country_name'].'</td>';
    $row4 = $res4->fetchRow();
    echo '<td>'.$row4['country_name'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'Population'.'</td>';
    echo '<td>'.$row1['population'].'</td>';
    echo '<td>'.$row2['population'].'</td>';
    echo '<td>'.$row3['population'].'</td>';
    echo '<td>'.$row4['population'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'GDP'.'</td>';
    echo '<td>'.$row1['gdp'].'</td>';
    echo '<td>'.$row2['gdp'].'</td>';
    echo '<td>'.$row3['gdp'].'</td>';
    echo '<td>'.$row4['gdp'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'Gold medals'.'</td>';
    echo '<td>'.$row1['gold'].'</td>';
    echo '<td>'.$row2['gold'].'</td>';
    echo '<td>'.$row3['gold'].'</td>';
    echo '<td>'.$row4['gold'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'Silver medals'.'</td>';
    echo '<td>'.$row1['silver'].'</td>';
    echo '<td>'.$row2['silver'].'</td>';
    echo '<td>'.$row3['silver'].'</td>';
    echo '<td>'.$row4['silver'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'Total medals'.'</td>';
    echo '<td>'.$row1['total'].'</td>';
    echo '<td>'.$row2['total'].'</td>';
    echo '<td>'.$row3['total'].'</td>';
    echo '<td>'.$row4['total'].'</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>'.'Rank'.'</td>';
    if($criteria=="GDP"){
        if(($row1['gdp']>=$row2['gdp'])&&($row1['gdp']>=$row3['gdp'])&&($row1['gdp']>=$row4['gdp'])){
            echo '<td>'.'4'.'</td>';
            if(($row2['gdp']>=$row3['gdp'])&&($row2['gdp']>=$row4['gdp'])){
                echo '<td>'.'3'.'</td>';
                if($row3['gdp']>=$row4['gdp']){
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }
                
            }else if(($row3['gdp']>=$row2['gdp'])&&($row3['gdp']>=$row4['gdp'])){
                if($row2['gdp']>=$row4['gdp']){
                    echo'<td>'.'2'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }
            }else{
                if($row2['gdp']>=$row3['gdp']){
                    echo'<td>'.'2'.'</td>';
                    echo '<td>'.'1'.'</td>';
                    echo'<td>'.'3'.'</td>';
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo '<td>'.'2'.'</td>';
                    echo'<td>'.'3'.'</td>';
                }
            }
        } else if(($row2['gdp']>=$row1['gdp'])&&($row2['gdp']>=$row3['gdp'])&&($row2['gdp']>=$row4['gdp'])){
            if(($row1['gdp']>=$row3['gdp'])&&($row1['gdp']>=$row4['gdp'])){
                if($row3['gdp']>=$row4['gdp']){
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }else{
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }
                
            }else if(($row3['gdp']>=$row1['gdp'])&&($row3['gdp']>=$row4['gdp'])){
                if($row1['gdp']>=$row4['gdp']){
                    echo'<td>'.'2'.'</td>';
                    echo '<td>'.'4'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo '<td>'.'4'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }
            }else{
                if($row1['gdp']>=$row3['gdp']){
                    echo'<td>'.'2'.'</td>';
                    echo '<td>'.'4'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'3'.'</td>';
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo '<td>'.'2'.'</td>';
                    echo'<td>'.'3'.'</td>';
                }
            }
        }else if(($row3['gdp']>=$row1['gdp'])&&($row3['gdp']>=$row2['gdp'])&&($row3['gdp']>=$row4['gdp'])) {
            if(($row1['gdp']>=$row2['gdp'])&&($row1['gdp']>=$row4['gdp'])){
                if($row2['gdp']>=$row4['gdp']){
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }else{
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }
                
            }else if(($row2['gdp']>=$row1['gdp'])&&($row2['gdp']>=$row4['gdp'])){
                if($row1['gdp']>=$row4['gdp']){
                    echo'<td>'.'2'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo '<td>'.'4'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo '<td>'.'4'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }
            }else{
                if($row1['gdp']>=$row2['gdp']){
                    echo'<td>'.'2'.'</td>';
                    echo '<td>'.'1'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'3'.'</td>';
                    
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'3'.'</td>';
                }
            }
        }else{
            if(($row1['gdp']>=$row2['gdp'])&&($row1['gdp']>=$row3['gdp'])){
                if($row2['gdp']>=$row3['gdp']){
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'4'.'</td>';
                }else{
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'4'.'</td>';
                }
                
            }else if(($row2['gdp']>=$row1['gdp'])&&($row2['gdp']>=$row3['gdp'])){
                if($row1['gdp']>=$row3['gdp']){
                    echo'<td>'.'2'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo '<td>'.'1'.'</td>';
                    echo'<td>'.'4'.'</td>';
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo '<td>'.'2'.'</td>';
                    echo'<td>'.'4'.'</td>';
                }
            }else{
                if($row1['gdp']>=$row2['gdp']){
                    echo'<td>'.'2'.'</td>';
                    echo '<td>'.'1'.'</td>';
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'4'.'</td>';
                }
            }

        }
    }else if($criteria=="population"){
        if(($row1['population']>=$row2['population'])&&($row1['population']>=$row3['population'])&&($row1['population']>=$row4['population'])){
            echo '<td>'.'4'.'</td>';
            if(($row2['population']>=$row3['population'])&&($row2['population']>=$row4['population'])){
                echo '<td>'.'3'.'</td>';
                if($row3['population']>=$row4['population']){
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }
                
            }else if(($row3['population']>=$row2['population'])&&($row3['population']>=$row4['population'])){
                if($row2['population']>=$row4['population']){
                    echo'<td>'.'2'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }
            }else{
                if($row2['population']>=$row3['population']){
                    echo'<td>'.'2'.'</td>';
                    echo '<td>'.'1'.'</td>';
                    echo'<td>'.'3'.'</td>';
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo '<td>'.'2'.'</td>';
                    echo'<td>'.'3'.'</td>';
                }
            }
        } else if(($row2['population']>=$row1['population'])&&($row2['population']>=$row3['population'])&&($row2['population']>=$row4['population'])){
            if(($row1['population']>=$row3['population'])&&($row1['population']>=$row4['population'])){
                if($row3['population']>=$row4['population']){
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }else{
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }
                
            }else if(($row3['population']>=$row1['population'])&&($row3['population']>=$row4['population'])){
                if($row1['population']>=$row4['population']){
                    echo'<td>'.'2'.'</td>';
                    echo '<td>'.'4'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo '<td>'.'4'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }
            }else{
                if($row1['population']>=$row3['population']){
                    echo'<td>'.'2'.'</td>';
                    echo '<td>'.'4'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'3'.'</td>';
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo '<td>'.'2'.'</td>';
                    echo'<td>'.'3'.'</td>';
                }
            }
        }else if(($row3['population']>=$row1['population'])&&($row3['population']>=$row2['population'])&&($row3['population']>=$row4['population'])) {
            if(($row1['population']>=$row2['population'])&&($row1['population']>=$row4['population'])){
                if($row2['population']>=$row4['population']){
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }else{
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }
                
            }else if(($row2['population']>=$row1['population'])&&($row2['population']>=$row4['population'])){
                if($row1['population']>=$row4['population']){
                    echo'<td>'.'2'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo '<td>'.'4'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo '<td>'.'4'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }
            }else{
                if($row1['population']>=$row2['population']){
                    echo'<td>'.'2'.'</td>';
                    echo '<td>'.'1'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'3'.'</td>';
                    
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'3'.'</td>';
                }
            }
        }else{
            if(($row1['population']>=$row2['population'])&&($row1['population']>=$row3['population'])){
                if($row2['population']>=$row3['population']){
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'4'.'</td>';
                }else{
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'4'.'</td>';
                }
                
            }else if(($row2['population']>=$row1['population'])&&($row2['population']>=$row3['population'])){
                if($row1['population']>=$row3['population']){
                    echo'<td>'.'2'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo '<td>'.'1'.'</td>';
                    echo'<td>'.'4'.'</td>';
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo '<td>'.'2'.'</td>';
                    echo'<td>'.'4'.'</td>';
                }
            }else{
                if($row1['population']>=$row2['population']){
                    echo'<td>'.'2'.'</td>';
                    echo '<td>'.'1'.'</td>';
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    
                }else{
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'4'.'</td>';
                }
            }

        }
    }else{
        if(($row1['total']>=$row2['total'])&&($row1['total']>=$row3['total'])&&($row1['total']>=$row4['total'])){
            echo '<td>'.'1'.'</td>';
            if(($row2['total']>=$row3['total'])&&($row2['total']>=$row4['total'])){
                echo '<td>'.'2'.'</td>';
                if($row3['total']>=$row4['total']){
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'4'.'</td>';
                }else{
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'3'.'</td>';
                }
                
            }else if(($row3['total']>=$row2['total'])&&($row3['total']>=$row4['total'])){
                if($row2['total']>=$row4['total']){
                    echo'<td>'.'3'.'</td>';
                    echo '<td>'.'2'.'</td>';
                    echo'<td>'.'4'.'</td>';
                }else{
                    echo'<td>'.'4'.'</td>';
                    echo '<td>'.'2'.'</td>';
                    echo'<td>'.'3'.'</td>';
                }
            }else{
                if($row2['total']>=$row3['total']){
                    echo'<td>'.'3'.'</td>';
                    echo '<td>'.'4'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }else{
                    echo'<td>'.'4'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }
            }
        } else if(($row2['total']>=$row1['total'])&&($row2['total']>=$row3['total'])&&($row2['total']>=$row4['total'])){
            if(($row1['total']>=$row3['total'])&&($row1['total']>=$row4['total'])){
                if($row3['total']>=$row4['total']){
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'4'.'</td>';
                }else{
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'3'.'</td>';
                }
                
            }else if(($row3['total']>=$row1['total'])&&($row3['total']>=$row4['total'])){
                if($row1['total']>=$row4['total']){
                    echo'<td>'.'3'.'</td>';
                    echo '<td>'.'1'.'</td>';
                    echo '<td>'.'2'.'</td>';
                    echo'<td>'.'4'.'</td>';
                }else{
                    echo'<td>'.'4'.'</td>';
                    echo '<td>'.'1'.'</td>';
                    echo '<td>'.'2'.'</td>';
                    echo'<td>'.'3'.'</td>';
                }
            }else{
                if($row1['total']>=$row3['total']){
                    echo'<td>'.'3'.'</td>';
                    echo '<td>'.'1'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }else{
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }
            }
        }else if(($row3['total']>=$row1['total'])&&($row3['total']>=$row2['total'])&&($row3['total']>=$row4['total'])) {
            if(($row1['total']>=$row2['total'])&&($row1['total']>=$row4['total'])){
                if($row2['total']>=$row4['total']){
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'4'.'</td>';
                }else{
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'3'.'</td>';
                }
                
            }else if(($row2['population']>=$row1['population'])&&($row2['population']>=$row4['population'])){
                if($row1['population']>=$row4['population']){
                    echo'<td>'.'3'.'</td>';
                    echo '<td>'.'2'.'</td>';
                    echo '<td>'.'1'.'</td>';
                    echo'<td>'.'4'.'</td>';
                }else{
                    echo'<td>'.'4'.'</td>';
                    echo '<td>'.'2'.'</td>';
                    echo '<td>'.'1'.'</td>';
                    echo'<td>'.'3'.'</td>';
                }
            }else{
                if($row1['population']>=$row2['population']){
                    echo'<td>'.'3'.'</td>';
                    echo '<td>'.'4'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'2'.'</td>';
                    
                }else{
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    echo'<td>'.'2'.'</td>';
                }
            }
        }else{
            if(($row1['total']>=$row2['total'])&&($row1['total']>=$row3['total'])){
                if($row2['total']>=$row3['total']){
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }else{
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }
            }else if(($row2['total']>=$row1['total'])&&($row2['total']>=$row3['total'])){
                if($row1['total']>=$row3['total']){
                    echo'<td>'.'3'.'</td>';
                    echo '<td>'.'2'.'</td>';
                    echo '<td>'.'4'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }else{
                    echo'<td>'.'4'.'</td>';
                    echo '<td>'.'3'.'</td>';
                    echo '<td>'.'2'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }
            }else{
                if($row1['total']>=$row2['total']){
                    echo'<td>'.'3'.'</td>';
                    echo '<td>'.'4'.'</td>';
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'1'.'</td>';
                    
                }else{
                    echo'<td>'.'4'.'</td>';
                    echo'<td>'.'3'.'</td>';
                    echo'<td>'.'2'.'</td>';
                    echo'<td>'.'1'.'</td>';
                }
            }

        }

    }
    echo '</table>';

    $col_res1 =& $db->query($sql5);
    if(PEAR::isError($res1)){
        die($col_res1->getMessage());
    } 
    $col_res2 =& $db->query($sql6);
    if(PEAR::isError($res2)){
        die($col_res2->getMessage());
    }

    $col_res3 =& $db->query($sql7);
    if(PEAR::isError($res3)){
        die($rcol_res3->getMessage());
    }

    $col_res4 =& $db->query($sql8);
    if(PEAR::isError($col_res4)){
        die($res4->getMessage());
    }
    echo "Cyclists:".$row1['country_name'];
    echo '<br>';
    while ($col1 = $col_res1->fetchRow()) {
        echo $col1['name']."<br/>";
    }
    echo '<br>';
    echo "Cyclists:".$row2['country_name'];
    echo '<br>';
    while ($col2 = $col_res2->fetchRow()) {
        echo $col2['name']."<br/>";
    }
    echo '<br>';
    echo "Cyclists:".$row3['country_name'];
    echo '<br>';
    while ($col3 = $col_res3->fetchRow()) {
        echo $col3['name']."<br/>";
    }
    echo '<br>';
    echo "Cyclists:".$row4['country_name'];
    echo '<br>';
    
    while ($col4 = $col_res4->fetchRow()) {
        echo $col4['name']."<br/>";
    }
 

}
?>