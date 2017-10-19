<?php 
session_start();

$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/lms/';

isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'admin';

?>

<?php
include "connect_tranz.php";
include "tranz_action.php";

$query=mysql_query("SELECT tranz.transaction_id, tranz.book_id, book.title, tranz.user_id, tranz.date_of_borrowing, tranz.date_of_return, tranz.status FROM tranz INNER JOIN book ON tranz.book_id=book.book_id WHERE tranz.status='Borrowing' ORDER BY tranz.transaction_id", $konek);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Transactions - Library Management System</title>
	<link href="<?php echo $base_url;?>asset/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $base_url;?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="<?php echo $base_url;?>asset/css/style.css" rel="stylesheet">
	
    <link href="<?php echo $base_url;?>asset/css/datepicker2.css" rel="stylesheet">
	
	<link rel="shortcut icon" href="<?php echo $base_url;?>asset/img/book.ico">
	<script type="text/javascript" src="<?php echo $base_url;?>asset/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>asset/js/scripts.js"></script>
	
    <script type="text/javascript" src="<?php echo $base_url;?>asset/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo $base_url;?>asset/js/bootstrap-datepicker2.js"></script>

<style type="text/css">
      html, body {
        height: 100%;
        width: 100%;
        padding: 0;
        margin: 0;
      }

      #full-screen-background-image {
        z-index: -999;
        min-height: 100%;
        min-width: 1024px;
        width: 100%;
        height: auto;
        position: fixed;
        top: 0;
        left: 0;
      }

      #wrapper {
  	  width: 1000px;
      margin: auto;
      background-color:rgba(255,255,255,0.9);
      border-radius: 50px;
      }

      a:link, a:visited, a:hover {
        color: #333;
        font-style: italic;
      }

      a.to-top:link,
      a.to-top:visited, 
      a.to-top:hover {
        margin-top: 1000px;
        display: block;
        font-weight: bold;
        padding-bottom: 30px;
        font-size: 30px;
      }

    </style>
</head>

<body>

<?php if($_SESSION['level']!='admin'){
echo '<div class="alert alert-error"> You need to login as admin to access this page. </div>';
die ('');
?>

<?php } ?>
  
<div id="wrapper">
<h3><legend>Transaction List</legend></h3>
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
			<td align="left">Return</td>
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
		$lateness=late_calc($dateline, $date_of_return);
		$fine=$lateness*$fine_amount1;
		if ($lateness>0) {
		echo "<font color='red'>$lateness day(s)<br>(Rp $fine)</font>";
		}
		else {
		echo $lateness." day(s)";
		}
echo "</td>
	  <td class='td-data'><a href='admin_tranz_return_action.php?transaction_id=$result[transaction_id]&book_id=$result[1]'><i class='btn btn-mini'>Returm&nbsp;<i class='icon-check'></i></i></a></td></i></i></a></td>
	  </tr>";
}
?>
</tbody>
</table>
<a href="admin_tranz_list_print.php" class="btn btn-mini"><i class="icon-print"></i> Print</a>&nbsp;<a href="../homeadmin.php?app=admin_tranz_menu" class="btn btn-mini"><i class="icon-th-large"></i> Transaction Menu</a>
<br>
<br>

<p><b>Note : </b>Length of borrowing is 7 days, if it has passed, fine will be charged at Rp 500,- per day.</p>
</div>

</div>
		</div>
	</div>
</div>

</body>
</html>