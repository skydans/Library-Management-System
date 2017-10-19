<?php
$dsn  = "mysql:dbname=lms;host=localhost";
$user = "root";
$pass = "";

try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo "Failed to conenct to database : ".$e->getMessage();
}
?>