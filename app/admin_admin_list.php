<!DOCTYPE html>
<?php 
include('connect.php');
?>
<html>
<body>
<?php empty( $app ) ? header('location:../homeadmin.php') : '' ; if(isset($_SESSION['level'])){?>

<?php if($_SESSION['level']!='admin'){
echo '<div class="alert alert-error"> You need to login as admin to access this page. </div>';
die ('');
?>

<?php } ?>

<p>
	<a href="<?php echo $base_url2; ?>/phpmyadmin/index.php" class="btn btn-mini"><i class="icon-lock"></i> PHP My Admin</a>&nbsp;
	<a href="app/admin_admin_input.php" class="btn btn-mini"><i class="icon-plus"></i> Add New Admin</a>
</p>

<div class="tab-content">
<table class="table table-bordered table-condensed table-hover">
	<thead>
		<tr class="nowrap">
			<th align="left">User ID</th>
			<th align="left">Name</th>
			<th align="left">Gender</th>
			<th align="left">Date of Birth</th>
			<th align="left">Address</th>
			<th align="left">Email</th>
			<th align="left">Phone</th>
			<?php if($_SESSION['level']=='admin'){?>
			<th colspan = "2" align="center">Tools</th>
			<?php } ?>
		</tr>
	</thead>
	
	<tbody>
	<?php
    $sql = "SELECT user_id, name, gender, dob, address, email, phone FROM user WHERE level=1";
	foreach ($dbh->query($sql) as $data) :
    ?>
		<tr class="nowrap">
			<td><?php echo $data['user_id'] ?></td>
            <td><?php echo $data['name'] ?></td>
			<td><?php echo $data['gender'] ?></td>
			<td><?php echo $data['dob'] ?></td>
			<td><?php echo $data['address'] ?></td>
			<td><?php echo $data['email'] ?></td>
			<td><?php echo $data['phone'] ?></td>
			<?php if($_SESSION['level']=='admin'){?>
			<td><a href="app/admin_user_edit.php?user_id=<?php echo $data['user_id'] ?>" class="btn btn-mini"><i class="icon-edit"></i> Edit</a>
			<td>
			<?php if (!($_SESSION['user_id']==$data['user_id'])){?>
			<a href="app/admin_user_delete.php?user_id=<?php echo $data['user_id'] ?>" class="btn btn-mini" onClick="return confirm('Delete admin with ID : <?php echo $data['user_id'];?>');"><i class="icon-trash"></i> Delete</a>
			<?php } ?>
			</td>
			<?php } ?>
			
		</tr>
<?php
    endforeach;
?>
	</tbody>
</table>

</div>
<?php 
}else{
echo '<div class="alert alert-error"> You need to login as admin to access this page. </div>';
}
?>

</body>
</html>