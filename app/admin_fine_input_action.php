<?php
include('connect_book.php');

    $fine_id=$_POST['fine_id'];
    $date=$_POST['date'];
	$amount=$_POST['amount'];
	
    $sql="INSERT INTO fine SET fine_id='$fine_id', date='$date', amount='$amount'";
	
    $query=mysql_query($sql) or die(mysql_error());
    
	if ($query) {
          header("location:../homeadmin.php?app=admin_fine_list");
	}
?>