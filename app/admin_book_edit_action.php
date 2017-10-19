<?php
include('connect_book.php');

//capture from form
$id = $_POST['book_id'];
$title = $_POST['title'];
$year = $_POST['year'];
$publisher = $_POST['publisher'];
$author = $_POST['author'];
$nop = $_POST['nop'];
$quantity = $_POST['quantity'];
$language = $_POST['language'];
$date_received = $_POST['date_received'];

//update data through query
$query = mysql_query("update book set title='$title', year='$year', publisher='$publisher', author='$author', nop='$nop', quantity='$quantity', language='$language', date_received='$date_received' where book_id='$id'") or die(mysql_error());

if ($query) {
	header("location:../homeadmin.php?app=admin_book_list");
}
?>