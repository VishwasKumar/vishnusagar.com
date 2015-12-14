<?php5
$con=mysql_connect("localhost","root","");
mysql_select_db("assignment",$con) or die(mysql_error($con));
//mysql_select_db("assignment",$con) or die("Couldn't connect to the database"); //MS
// error_reporting(E_ALL ^ E_NOTICE);
?>