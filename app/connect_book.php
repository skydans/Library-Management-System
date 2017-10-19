<?php
$host = 'localhost'; 

$user = 'root'; 
 
$pass = '';
 
$dbname = 'lms';
 
//connect
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
 
//select database
$dbselect = mysql_select_db($dbname);
?>