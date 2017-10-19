<?php

//SESSION PROTECTION HEADER
session_start();
if(isset($_SESSION['level'])){

if($_SESSION['level']!='admin'){
echo '<div class="alert alert-error"> You need to login as admin to access this page. </div>';
die ('');
}
//END OF SESSION PROTECTION HEADER

require_once "connect.php";

/*if (isset($_GET['fine_id'])) {
    $dbh->exec("DELETE FROM fine WHERE fine_id = '$_GET[fine_id]'");
}*/
$id=$_GET['fine_id'];

if ($id == "all") {
	
	$sql = "SELECT * FROM fine ORDER BY fine_id";
    foreach ($dbh->query($sql) as $data) :

	$id_catch = $data['fine_id']; // $data[0] is the 0 column order
	$dbh->exec("DELETE FROM fine WHERE fine_id = '$id_catch'");
	mysql_query($sql);
	header("location:../homeadmin.php?app=admin_fine_list");
	
	endforeach;
	
	} else {
	
	$dbh->exec("DELETE FROM fine WHERE fine_id = '$_GET[fine_id]'");
	header("location:../homeadmin.php?app=admin_fine_list");
}	

//SESSION PROTECTION FOOTER
}else{
echo '<div class="alert alert-error"> You need to login as admin to access this page. </div>';
}
//END OF SESSION PROTECTION FOOTER

/*header("location:../homeadmin.php?app=admin_fine_list")*/
?>