<!DOCTYPE html>
<?php
include "connect_tranz.php";
include "tranz_action.php";

$query=mysql_query("SELECT tranz.transaction_id, tranz.book_id, book.title, tranz.user_id, tranz.date_of_borrowing, tranz.date_of_return, tranz.status FROM tranz INNER JOIN book ON tranz.book_id=book.book_id WHERE tranz.status='Borrowing' ORDER BY tranz.transaction_id", $konek);
?>

<?php
$day = date("d-m-Y");
$process	= mktime(0,0,0,date("n"),date("j")+0,date("Y"));
$today = date("d-m-Y", $process);
?>

<html>
<head>
<title>Transaction Lists</title>
<link rel="shortcut icon" href="../asset/img/book.ico">
</head>
<body>
<h2><center>Transaction Report - Perguruan Tinggi Lepisi</center></h2>
<center>Date :&nbsp;<?php echo $today; ?> </center><br>
<table align="center" border="1" cellpadding="5" cellspacing="0">
	<thead>
		<tr class="nowrap">
        <tr><td align="left">No.</td>
			<td align="left">Transaction ID</td>
		    <td align="left">Book ID</td>
			<td align="left">Book Title</td>
			<td align="left">User ID</td>
			<td align="left">Date of Borrowing</td>
			<td align="left">Date of Return</td>
			<td align="left">Status</td>
			<td align="left">Lateness</td>
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
	  <td class='td-data'>";

	    $dateline=$result['date_of_return'];
		$date_of_return=date('d-m-Y');
		$late=late_calc($dateline, $date_of_return);
		$fine=$late*$fine_amount1;
		if ($late>0) {
		echo "<font color='red'>$late day(s)<br>(Rp $fine)</font>";
		}
		else {
		echo $late." day(s)";
		}
}
?>
</tbody>
</table>
</body>
</html>
<script>
window.print();
</script>