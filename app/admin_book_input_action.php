<?php
include('connect_book.php');

//capture from form
$book_id = (string)$_POST['book_id1'].sprintf("%06s",$_POST['book_id2']);
$book_id1 = (string)$_POST['book_id1'];
$title = $_POST['title'];
$year = $_POST['year'];
$publisher = $_POST['publisher'];
$author = $_POST['author'];
$nop = $_POST['nop'];
$quantity = $_POST['quantity'];
$language = $_POST['language'];
$date_received = $_POST['date_received'];



$id=sprintf("%06s",$id);


if ($book_id2 == 0) {
	
	$sql1 = "SELECT book_id FROM book WHERE SUBSTRING(`book_id`,1,1)='$book_id1'";
	$result = mysql_query($sql1);
	
	$id=0;
	while ($data=mysql_fetch_row($result)) {
	$id = $data[0];
	$id = substr($id,2,6);
	$id = (int)$id;
	}
	$id++;
	$id=(string)$_POST['book_id1'].sprintf("%06s",$id);
	
	$query = mysql_query("insert into book values('$id', '$title', '$year', '$publisher', '$author', '$nop', '$quantity', '$language', '$date_received')") or die(mysql_error());
	
	
	} else {
	$query = mysql_query("insert into book values('$book_id', '$title', '$year', '$publisher', '$author', '$nop', '$quantity', '$language', '$date_received')") or die(mysql_error());
	}


if ($query) {
          header("location:../homeadmin.php?app=admin_book_list");
}
?>