<?php
include "connect_tranz.php";

$transid	= isset($_GET['transaction_id']) ? $_GET['transaction_id'] : "";
$book_id		= isset($_GET['book_id']) ? $_GET['book_id'] : "";

if ($transid==""||$book_id=="") {
	echo "<script>alert('Select the book that is about to be returned');</script>";
	echo header("location:admin_tranz_list.php");
} else {
	$us=mysql_query("UPDATE tranz SET status='Returned' WHERE transaction_id='$transid'")or die ("Database update failed".mysql_error());
	$uj=mysql_query("UPDATE book SET quantity=(quantity+1) WHERE book_id='$book_id'")or die ("Database update failed".mysql_error());

	if ($us || $uj) {
		echo "<script>alert('Return successful')</script>";
		echo header("location:admin_tranz_list.php");
	} else {
		echo "<script>alert('Failed to return')</script>";
		echo header("location:admin_tranz_list.php");
	}
}
?>