<?php empty( $app ) ? header('location:../homeadmin.php') : '' ; if(isset($_SESSION['level'])){ ?>

<html>
<head>
</head>

<body>

<?php if($_SESSION['level']!='admin'){
echo '<div class="alert alert-error"> You need to login as Admin to access this page. </div>';
die ('');
?>

<?php } ?>

<h3><legend>Transaction Menu</legend></h3>

<p>
	<a href="app/admin_tranz_list.php" class="btn btn-mini"><i class="icon-share"></i> View Transaction Data</a>&nbsp;
	<a href="app/admin_tranz_input.php" class="btn btn-mini"><i class="icon-edit"></i> Input Transaction</a>&nbsp;
    <a href="app/admin_tranz_history.php" class="btn btn-mini"><i class="icon-check"></i> Transaction History</a>&nbsp;
</p>

<?php 
}else{
echo '<div class="alert alert-error"> You need to login as Admin to access this page. </div>';
}
?>

</body>
</html>