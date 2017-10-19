<?php

$db_host	= "localhost";
$db_user	= "root";
$db_pass	= "";
$db_name	= "lms";

$konek	= mysql_connect($db_host,$db_user,$db_pass,$db_name) or die ("Failed to connect to database");
mysql_select_db($db_name, $konek) or die ("Failed to connect to database".mysql_error());

$fine_amount1=500;
?>