<!DOCTYPE html>
<?php 
include('connect.php');
?>

<?php
$hari = date("d-m-Y");
$proses	= mktime(0,0,0,date("n"),date("j")+0,date("Y"));
$today = date("d-m-Y", $proses);
?>

<html>
<head>
<title>Fine Report</title>
<link rel="shortcut icon" href="../asset/img/book.ico">
</head>
<body>
<h2><center>Fine Report - Perguruan Tinggi Lepisi</center></h2>
<center>Date :&nbsp;<?php echo $today; ?> </center><br>

<table align="center" border="1" cellpadding="5" cellspacing="0">
	<thead>
		<tr class="nowrap">
			<th align="left">Fine ID</th>
			<th align="left">Date of Payment</th>
			<th align="left">Amount</th>
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
		</tr>
<?php
    endforeach;
?>
	</tbody>
</table>

<br>

<?php
mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("lms") or die(mysql_error());
?>
<table align="center" border="1" cellpadding="5" cellspacing="0">
    <tr>
        <td>Total</td>
        <td>
        <?php
        $qry_total_fine=mysql_query("SELECT SUM(amount) FROM fine");
        $fine_data=mysql_fetch_array($qry_total_fine);
        $total_fine_amount=$fine_data[0];
        echo "Rp. ".(number_format($total_fine_amount));
        ?>
        </td>
    </tr>
</tbody>
</table>
</body>
</html>
<script>
window.print();
</script>