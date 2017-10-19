<?php
session_start();
// database connection -------------------------------------------->
$db = new mysqli( "localhost" , "root" , "" , "lms" );

//global $db;
echo $db->connect_errno?'Connection failed : '.$db->connect_error:'';
//<--------------------------------------------------------------

if(isset($_POST['user_id']) && ($_POST['password'])){
	 $user_id = $db->real_escape_string($_POST['user_id']);
	 $password = $db->real_escape_string($_POST['password']);
	 $sql = "select * from user where user_id = '$user_id' AND password = '$password'";
	 $result = $db->query($sql) or die('Error: '.$db->error);
 
  if (mysqli_connect_errno()) {
            print('Failed to connect to mysql.');
        }
 
	if ($result->num_rows == 1){
		  $row = $result->fetch_assoc();
		  $_SESSION['user_id'] = $row['user_id'];
		  $_SESSION['name'] = $row['name'];
		  $_SESSION['level'] = $row['level'];
		if($row['level']=="admin"){
            header("location:homeadmin.php");
        }
		else if($row['level']=="user"){
            header("location:homeuser.php");
		}
		  $_SESSION['message'] = '<p><div class="alert alert-success">Welcome <b>'.$_SESSION['name'].'</b>. You logged in with level : <b>'.$_SESSION['level'].'</b></div></p>';

	}else{
		$_SESSION['error']="Wrong User ID or Password.";
		header("location:index.php?app=login");
	}
	
	
}else{
	//if not using HTML5, this message will appear
	$_SESSION['error']="User ID and Password cannot be empty."; 
	header("location:index.php?app=login");
}
?>