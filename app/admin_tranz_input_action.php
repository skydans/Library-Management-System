<!DOCTYPE html>
<html>

<head>
<style type="text/css">


.font4 {
    font-family: "Kalinga";
	color : blue;
	font-size : 13pt;
}
</style>
	</head>

<?php
$date_of_borrowing		= isset($_POST['borrow']) ? $_POST['borrow'] : "";
$date_of_return	= isset($_POST['return']) ? $_POST['return'] : "";

$get_book_string		= isset($_POST['book']) ? $_POST['book'] : "";
$split_book_string		= explode (".", $get_book_string);
$book_id				= $split_book_string[0];
$book			= $split_book_string[1];

$get_user		= isset($_POST['borrower']) ? $_POST['borrower'] : "";
$pecah_mhs		= explode (".", $get_user);
$user_id 		= $pecah_mhs[0];
$mhs			= $pecah_mhs[1];

if($book == "" || $get_book_string == "") {
	echo "<script>alert('Select a book first.');</script>";
	echo header("location:/lms/app/admin_tranz_input.php");
} elseif ($mhs == "" || $get_user == "") {
	echo "<script>alert('Select the borrower first.');</script>";
	echo header("location:/lms/app/admin_tranz_input.php");
} else {
	include "connect_tranz.php";
	$query=mysql_query("SELECT * FROM book WHERE title = '$book'", $konek);
	while ($result=mysql_fetch_array($query)) {
		$left=(int)$result['quantity'];
	} 
	
	if ($left == 0) {
		?> <center><span class="font4">Book stock is empty, cannot create transaction.</span></center> <br />
			<center><span class="font4">You will be redirected in 5 seconds.</span></center>
		<?php
		echo ("<META HTTP-EQUIV=Refresh CONTENT=\"5;URL=../homeadmin.php?app=admin_tranz_menu\">");
	} else {
	
	$num=0;
			
		
		$qt			= mysql_query("INSERT INTO tranz VALUES ('$num', '$book_id', '$user_id', '$date_of_borrowing', '$date_of_return', 'Borrowing')", $konek) or die ("Failed to access database".mysql_error());

		$qu			= mysql_query("UPDATE book SET quantity=(quantity-1) WHERE book_id='$book_id' ", $konek);

		if ($qt&&$qu) {
	        echo "<script>alert('Transaction successful');</script>";
			echo ("<META HTTP-EQUIV=Refresh CONTENT=\"1;URL=../homeadmin.php?app=admin_tranz_menu\">");
			
		} else {
			echo "<script>alert('Transaction failed');</script>";
			echo ("<META HTTP-EQUIV=Refresh CONTENT=\"1;URL=../homeadmin.php?app=admin_tranz_menu\">");
		}
	}
}
?>

</html>