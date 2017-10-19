<?php 
session_start();

$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/lms/';

isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'admin';



$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'lms';
//connect
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
//select database
$dbselect = mysql_select_db($dbname);

$sql1 = "SELECT fine_id FROM fine WHERE SUBSTRING(`fine_id`,1,1)='N'";
$result = mysql_query($sql1);
	
	//if ($result!==null) { //if a record for the initial letter exists then continue, if not then start from 000001
	$id=0;
	while ($data=mysql_fetch_row($result)) {
	$id = $data[0];
	$id = substr($id,2,6);
	$id = (int)$id; //variable change due to different data type.
	}
	$id++;
	$id="N".sprintf("%06s",$id);
	
	//} else {
	
	//$id="N000001";
	
	//}
	
	

?>

<?php
$now = date("d-m-Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Input Fine Payment</title>
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
<div class="page-header"><h3>Input Fine Payment</div>
</div>
  
<div id="wrapper">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
			
<fieldset style="width: 100%; margin: auto;">
<table align="center">
<form action="admin_fine_input_action.php" method="post">
<input type="hidden" name="date" value="<?php echo $now; ?>">
		<input type="hidden" name="fine_id" value="<?php echo $id; ?>" />
		<tr>
            <td valign="top">Fine ID</td>
			<td valign="top">:&nbsp;</td>
            <td><?php echo $id;?></td>
        </tr>
		
        <tr>
            <td valign="top">Date</td>
			<td valign="top">:&nbsp;</td>
            <td><b><?php echo $now; ?></b></td>
        </tr>
		
		<tr>
            <td valign="top">Amount</td>
			<td valign="top">:&nbsp;</td>
            <td><input type="number" name="amount" required="required" /></td>
        </tr>
		
        <tr>
			<td valign="top">&nbsp;</td>
			<td valign="top">&nbsp;</td>
            <td><input type="submit" value="Add" />
            <input type="reset" value="Reset" onclick="return confirm('Reset form?')"></td>
        </tr>
    </form>
	</table>
</fieldset>
			</div>
		</div>
	</div>
</div>
	
</body>
</html>