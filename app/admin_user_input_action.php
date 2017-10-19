<?php
include 'connect.php';

if (isset($_POST)) {
    $sql = "INSERT INTO user VALUE ('$_POST[user_id]', '$_POST[password]', '$_POST[name]', '$_POST[gender]', '$_POST[dob]', '$_POST[faculty]', '$_POST[year]', '$_POST[address]', '$_POST[email]', '$_POST[phone]', '$_POST[level]')";
    $dbh->exec($sql);
}
if ($_POST['level']=="admin"){
header("location:../homeadmin.php?app=admin_admin_list");
} else {
header("location:../homeadmin.php?app=admin_user_list");
}

?>