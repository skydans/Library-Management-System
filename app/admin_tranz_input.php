<?php 
session_start();

$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/lms/';

isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'admin';

?>

<?php
$borrow		= date("d-m-Y");
$aweek	= mktime(0,0,0,date("n"),date("j")+7,date("Y"));
$return  	= date("d-m-Y", $aweek);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Input Transaction</title>
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
<legend><h3>Input Transaction<h3></legend>
</div>
</div>

<div id="wrapper">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12" align="center">
			
<fieldset style="width: 100%; margin: auto;">
<form action="admin_tranz_input_action.php" method="post">
<input type="hidden" name="borrow" value="<?php echo $borrow; ?>">
<input type="hidden" name="return" value="<?php echo $return; ?>">
		
		<p>
            Borrower<br />
		<select class="span4" name="borrower" required="required">
		<option value="" selected>User ID and Name</option>
				<?php
				include "connect_tranz.php";
				$qa=mysql_query("SELECT * FROM user ORDER BY user_id", $konek);
				while ($borrower=mysql_fetch_array($qa)) {
                echo "<option value='$borrower[0].$borrower[2]'>$borrower[0]. $borrower[2]</option>";
				}
				?>
		</select>
        </p>
		
		<p>
            Book ID and Title<br />
		<select class="span4" name="book" required="required">
		<option value="" selected>Select Book</option>
				<?php
					include "connect_tranz.php";
					$q=mysql_query("SELECT * FROM book ORDER BY book_id", $konek);
					while ($book=mysql_fetch_array($q)) {
					echo "<option value='$book[0].$book[1]'>$book[0]. $book[1]</option>";
					}
					?>
		</select>
        </p>
		
        <p>
		
            Date of Borrowing<br />
            <b><?php echo $borrow; ?></b>
        </p>
        
        <p>
            Date of Return<br />
            <b><?php echo $return; ?></b>
        </p>	
		
        <p>
            <input type="submit" value="Submit" />
            <input type="reset" value="Reset" onclick="return confirm('Reset form?')">
        </p>
    </form>
</fieldset>
			</div>
		</div>
	</div>
</div>

</body>
</html>