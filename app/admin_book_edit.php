<?php 
include 'connect_book.php';
?>

<?php 
$id = $_GET['book_id'];

$query = mysql_query("select * from book where book_id='$id'") or die(mysql_error());

$data = mysql_fetch_array($query);
?>

<?php 
session_start();

$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/lms/';

isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'admin';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit Data</title>
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
<div class="page-header"><h3> Edit Book </h3></div>
</div>
  
<div id="wrapper">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">

<fieldset style="width: 100%; margin: auto;">
    
<form action="admin_book_edit_action.php" method="post">
	<table align="center">
        <input type="hidden" name="book_id" value="<?php echo $id; ?>" />
		<tr>
			<td>Book ID</td><td>&nbsp;</td><td><?php echo $id; ?> </td>
		</tr>
		<tr>
            <td>Title</td><td>&nbsp;</td>
            <td><input type="text" name="title" required="required" style="width: 400px;" value="<?php echo $data['title']; ?>"/></td>
        </tr>
		
        <tr>
            <td>Year</td><td>&nbsp;</td>
            <td><input type="text" name="year" required="required" value="<?php echo $data['year']; ?>"/></td>
        </tr>
		
		<tr>
            <td>Publisher</td><td>&nbsp;</td>
            <td><input type="text" name="publisher" required="required" value="<?php echo $data['publisher']; ?>"/></td>
        </tr>
        
		<tr>
            <td>Author</td><td>&nbsp;</td>
            <td><input type="text" name="author" required="required" style="width: 400px;" value="<?php echo $data['author']; ?>"/></td>
        </tr>
		
		<tr>
            <td>Number of Pages (Optional)</td><td>&nbsp;</td>
            <td><input type="number" name="nop" value="<?php echo $data['nop']; ?>"/></td>
        </tr>
		
		<tr>
            <td>Quantity</td><td>&nbsp;</td>
            <td><input type="number" name="quantity" required="required" value="<?php echo $data['quantity']; ?>"/></td>
        </tr>
        
		<tr>
            <td>Language</td><td>&nbsp;</td>
			<td>
			<select type="text" name="language" required="required" value="<?php echo $data['language']; ?>"/>
			<option></option>
			<option value = "Indonesian" <?php echo ($data['language'] == 'Indonesian' ? 'selected' : '' )?>>Indonesian</option>
			<option value = "Bilingual" <?php echo ($data['language'] == 'Bilingual' ? 'selected' : '' )?>>Bilingual</option>
			<option value = "English" <?php echo ($data['language'] == 'English' ? 'selected' : '' )?>>English</option>
			<option value = "Other" <?php echo ($data['language'] == 'Other' ? 'selected' : '' )?>>Other</option> </select>
			</td>
        </tr>
		
		<tr>
		<td><label class="control-label"> Date Received </label></td><td>&nbsp;</td>
        <td><input type="text" id="datepicker" name="date_received" class="input" value="<?php echo $data['date_received']; ?>"/></td>
        </tr>
		
        <tr>
            <td><input type="submit" value="Update" />
			<input type="reset" value="Reset" onclick="return confirm('Reset form?')"></td>
        </tr>
	</table>
</form>
</fieldset>
			</div>
		</div>
	</div>
</div>

    <script> 
    //options method for call datepicker
	$('#datepicker').datepicker({
         format: 'dd-mm-yyyy',
		 autoclose: true,
		 todayHighlight: true
	})
    </script>

</body>
</html>