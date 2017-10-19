<!DOCTYPE html>
<?php 
include('connect.php');
?>

<html>
<body>
<?php empty( $app ) ? header('location:../homeadmin.php') : '' ; if(isset($_SESSION['level'])){ ?>

<?php if($_SESSION['level']!='admin'){
echo '<div class="alert alert-error"> You need to login as admin to access this page. </div>';
die ('');
?>

<?php } ?>

<h3><legend>Fines</legend></h3>

<p>
	<a href="/lms/app/admin_fine_input.php" class="btn btn-mini"><i class="icon-qrcode"></i> Input Fine</a>&nbsp; <a href="/lms/app/admin_fine_print.php" class="btn btn-mini"><i class="icon-print"></i> Print</a>&nbsp; <a href="app/admin_fine_delete.php?fine_id=all" class="btn btn-mini" onClick="return confirm('Delete all?');"><i class="icon-trash"></i> Delete all</a> &nbsp;
</p>


<div class="tab-content">
<table class="table table-bordered table-condensed table-hover" style="width:1px;">
	<thead>
		<tr class="nowrap">
			<th align="left">Fine ID</th>
			<th align="left">Date of Payment</th>
			<th align="left">Amount</th>
			<?php if($_SESSION['level']=='admin'){?>
			<th colspan = "1" align="center">Tool</th>
			<?php } ?>
		</tr>
	</thead>
		<?php
    $sql = "SELECT * FROM fine ORDER BY fine_id";
    foreach ($dbh->query($sql) as $data) :
	?>
	<tbody>
		<tr class="nowrap">
			<td><?php echo $data['fine_id'] ?></td>
			<td><?php echo $data['date'] ?></td>
            <td><?php echo "Rp. ".(number_format($data['amount'])); ?></td>
			<?php if($_SESSION['level']=='admin'){?>
			<td><a href="app/admin_fine_delete.php?fine_id=<?php echo $data['fine_id'] ?>" class="btn btn-mini" onClick="return confirm('Delete fine record with ID : <?php echo $data['fine_id'];?> ?');"><i class="icon-trash"></i> Delete</a></td>
			<?php } ?>
		</tr>
	<?php
    endforeach;
	?>
	</tbody>
</table>

<?php
mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("lms") or die(mysql_error());
?>
<table class="table table-bordered table-condensed table-hover" style="width:30px;">
    <tr class="nowrap">
        <td>Total</td>
        <td>
        <?php
        $qry_fine_amount=mysql_query("SELECT SUM(amount) FROM fine");
        $fine_data=mysql_fetch_array($qry_fine_amount);
        $total_fine_amount=$fine_data[0];
        if ($total_fine_amount==null){
		echo 0;
		} else {
		echo "Rp. ".(number_format($total_fine_amount));
		}
		
		
        ?>
        </td>
    </tr>
</table>

</div>

<?php 
}else{
echo '<div class="alert alert-error"> You need to login as admin to access this page. </div>';
}
?>

</body>
</html>