<?php
include 'connect.php';
if (isset($_GET['user_id'])) {
    $dbh->exec("DELETE FROM user WHERE user_id = '$_GET[user_id]'");
}

if ($_POST['level']=="admin") {
	header("location:../homeadmin.php?app=admin_admin_list");
} else {
	header("location:../homeadmin.php?app=admin_user_list");
}

?>