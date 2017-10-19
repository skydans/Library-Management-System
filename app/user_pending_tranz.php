<!DOCTYPE html>
<?php 
include('connect.php');
include('connect_tranz.php');
include ('tranz_action.php');

$query=mysql_query("SELECT tranz.transaction_id, tranz.book_id, book.title, tranz.user_id, tranz.date_of_borrowing, tranz.date_of_return, tranz.status FROM tranz INNER JOIN book ON tranz.book_id=book.book_id WHERE tranz.status !='Returned' AND tranz.user_id='".$_SESSION['user_id']."' ORDER BY transaction_id", $konek);
?>
<html>
<body>
<?php empty( $app ) ? header('location:../homeuser.php') : '' ; if(isset($_SESSION['level'])){?>

<?php if($_SESSION['level']!='user'){
echo '<div class="alert alert-error"> You need to login as user to access this page. </div>';//jika bukan user jangan lanjut
die ('');

} ?>


<br>
<h3><legend>Pending Transactions</legend></h3>

<div id="wrapper">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">

<div class="tab-content">
<table class="table table-bordered table-condensed table-hover">
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
echo "</td></tr>";
}
?>
</tbody>
</table>

</div>

</div>
		</div>
	</div>
</div>

<?php 
}else{
echo '<div class="alert alert-error"> You need to login as user to access this page. </div>';
}
?>

</body>
</html>