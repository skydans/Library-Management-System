<!DOCTYPE html>
<?php
include "connect_tranz.php";
include "tranz_action.php";

$query=mysql_query("SELECT tranz.transaction_id, tranz.book_id, book.title, tranz.user_id, tranz.date_of_borrowing, tranz.date_of_return, tranz.status FROM tranz INNER JOIN book ON tranz.book_id=book.book_id ORDER BY tranz.transaction_id", $konek);
?>

<?php
$hari = date("d-m-Y");
$proses	= mktime(0,0,0,date("n"),date("j")+0,date("Y"));
$hari_ini = date("d-m-Y", $proses);
?>

<html>
<head>
<title>Report</title>
<link rel="shortcut icon" href="../asset/img/book.ico">
</head>
<body>
<h2><center>Transaction History Report - Perguruan Tinggi Lepisi</center></h2>
<center>Date :&nbsp;<?php echo $hari_ini; ?> </center><br>
<table align="center" border="1" cellpadding="5" cellspacing="0">
	<thead>
		<tr class="nowrap">
            <td align="left">No</td>
		    <td align="left">Transaction ID</td>
		    <td align="left">Book ID</td>
			<td align="left">Book Title</td>
			<td align="left">User ID</td>
			<td align="left">Date of Borrowing</td>
			<td align="left">Date of Return</td>
			<td align="left">Status</td>
	    </tr>
	</thead>
	<tbody>
<?php
$no=0;
while ($result=mysql_fetch_array($query)) {
$no++;
echo "<tr>
	  <td class='td-data'>$no</td>
      <td class='td-data'>$result[0]</td>
      <td class='td-data'>$result[1]</td>
	  <td class='td-data'>$result[2]</td>
	  <td class='td-data'>$result[3]</td>
	  <td class='td-data'>$result[4]</td>
	  <td class='td-data'>$result[5]</td>
	  <td class='td-data'>$result[6]</td>
	  </tr>";
}
?>
</tbody>
</table>
</body>
</html>
<script>
window.print();
</script>