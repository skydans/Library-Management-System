<!DOCTYPE html>
<?php 
include('connect.php');
?>
<html>
<body>
<?php empty( $app ) ? header('location:../homeuser.php') : '' ; if(isset($_SESSION['level'])){?>

<?php if($_SESSION['level']!='user'){
echo '<div class="alert alert-error"> You need to login as user to access this page. </div>';
die ('');
?>

<?php } ?>

<div class="tab-content">
<table class="table table-bordered table-condensed table-hover">
	<thead>
		<tr class="nowrap">
			<th align="left">Book ID</th>
			<th align="left">Book Title</th>
			<th align="left">Year</th>
			<th align="left">Publisher</th>
			<th align="left">Author</th>
			<th align="left">Number of Pages</th>
			<th align="left">Quantity</th>
			<th align="left">Language</th>
			<th align="left">Date Received</th>
			<?php if($_SESSION['level']=='admin'){?>
			<th colspan = "2" align="center">Alat</th>
			<?php } ?>
		</tr>
	</thead>
		<?php
    $sql = "SELECT * FROM book ORDER BY book_id";
    foreach ($dbh->query($sql) as $data) :
	?>
	<tbody>
		<tr class="nowrap">
			<td><?php echo $data['book_id'] ?></td>
			<td><?php echo $data['title'] ?></td>
            <td><?php echo $data['year'] ?></td>
			<td><?php echo $data['publisher'] ?></td>
			<td><?php echo $data['author'] ?></td>
            <td><?php echo $data['nop'] ?></td>
			<td><?php echo $data['quantity'] ?></td>
			<td><?php echo $data['language'] ?></td>
			<td><?php echo $data['date_received'] ?></td>
		</tr>
<?php
    endforeach;
?>
	</tbody>
</table>

</div>
<?php 
}else{
echo '<div class="alert alert-error"> You need to login as user to access this page. </div>';
}
?>

</body>
</html>