<?php
include 'connect.php';
if (isset($_GET['book_id'])) {
    $dbh->exec("DELETE FROM book WHERE book_id = '$_GET[book_id]'");
}
header("location:../homeadmin.php?app=admin_book_list")
?>