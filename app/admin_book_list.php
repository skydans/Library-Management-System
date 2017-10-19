<!DOCTYPE html>
<?php 
include('connect.php');
?>
<html>
<body>
<?php empty( $app ) ? header('location:../homeadmin.php') : '' ; 

if(isset($_SESSION['level'])){?>

<?php if($_SESSION['level']!='admin'){
echo '<div class="alert alert-error"> You need to login as admin to access this page. </div>';
die ('');
} 
$count=0;
$qbooks=0;
$sql = "SELECT * FROM book ORDER BY book_id";
foreach ($dbh->query($sql) as $data) : 
$count++; 
$qbooks += (int) $data['quantity'];
endforeach;
?>

<h3><legend>Book List</legend></h3>

<p>
	
	<table class="table table-bordered table-condensed table-hover" style="width:1px;">
	<tr class="nowrap">
		<td><a href="app/admin_book_input.php" class="btn btn-mini"><i class="icon-plus"></i> Add Book</a></td>
		<td><h6>List Count: </h6></td><td><?php echo $count;?></td><td><h6>Total Book Quantity: </h6></td><td><?php echo $qbooks;?></td>
	
	</tr>
	</table>
	
</p>

<div class="tab-content">
<table class="table table-bordered table-condensed table-hover">
	<thead>
		<tr class="nowrap">
			<th align="left">Book ID</th>
			<th align="left">Title</th>
			<th align="left">Year</th>
			<th align="left">Publisher</th>
			<th align="left">Author</th>
			<th align="left">Number of Pages</th>
			<th align="left">Quantity</th>
			<th align="left">Language</th>
			<th align="left">Date Received</th>
			<?php if($_SESSION['level']=='admin'){?>
			<th colspan = "2" align="center">Tools</th>
			<?php } ?>
		</tr>
	</thead>
		<?php
    $sql = "SELECT * FROM book ORDER BY book_id";
    foreach ($dbh->query($sql) as $data) :
	?>
	<tbody>
		<tr class="nowrap">
			<td><?php echo $data['book_id']; ?></td>
			<td><?php echo $data['title']; ?></td>
            <td><?php echo $data['year']; ?></td>
			<td><?php echo $data['publisher']; ?></td>
			<td><?php echo $data['author']; ?></td>
            <td><?php echo $data['nop']; ?></td>
			<td><?php echo $data['quantity']; ?></td>
			<td><?php echo $data['language']; ?></td>
			<td><?php echo $data['date_received']; ?></td>
			<?php if($_SESSION['level']=='admin'){?>
			<td><a href="app/admin_book_edit.php?book_id=<?php echo $data['book_id']; ?>" class="btn btn-mini"><i class="icon-edit"></i> Edit</a>
			<td><a href="app/admin_book_delete.php?book_id=<?php echo $data['book_id']; ?>" class="btn btn-mini" onClick="return confirm('Would you like to delete Book with ID: <?php echo $data['book_id'];?>?');"><i class="icon-trash"></i> Delete</a></td>
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
echo '<div class="alert alert-error"> You need to login as admin to view this page. </div>';
}
?>

</body>
</html>