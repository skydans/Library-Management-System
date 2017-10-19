<?php
include 'connect.php';

$user_id = $_POST['user_id'];
$password = $_POST['password'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$faculty = $_POST['faculty'];
$year = $_POST['year'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];

if (isset($_POST)) {
    $sql = "UPDATE user SET password = '$password', name = '$name', gender = '$gender', dob = '$dob', faculty = '$faculty', year = '$year', address = '$address', email = '$email', phone = '$phone' WHERE user_id = '$user_id' ";
    $dbh->exec($sql);
}

if ($_POST['level']=="admin") {
	header("location:../homeadmin.php?app=admin_admin_list");
} else {
	header("location:../homeadmin.php?app=admin_user_list");
}

?>