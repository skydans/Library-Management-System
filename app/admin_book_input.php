<?php 
session_start();

$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/lms/';

isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'admin';



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Input Book</title>
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

<?php 
if($_SESSION['level']!='admin'){
echo '<div class="alert alert-error"> You need to login as admin to access this page. </div>';//jika bukan admin jangan lanjut
die ('');
} ?>

<div id="wrapper">
<div class="page-header"><h3>Input Book</h3></div>
</div>
  
<div id="wrapper">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
			
<fieldset style="width: 100%; margin: auto;">
<form action="admin_book_input_action.php" method="post">
	<table align="center">
		<tr>
			<td>Book ID</td>
			<td>&nbsp;</td>
			<td>
			<select name="book_id1" required="required">
				<option value="A">A. Arts</option>
				<option value="B">B. Ethics</option>
				<option value="C">C. History</option>
				<option value="D">D. Human Science</option>
				<option value="E">E. Natural Science</option>
				<option value="F">F. Mathematics</option>
				<option value="G">G. Indigenous Knowledge</option>
				<option value="H">H. Reigious Knowledge</option>
				<option value="I">I. Others</option>
			</select>

            <input type="text" name="book_id2" required="required" maxlength="6" style="width: 80px;" placeholder="max. 6 digits"/>
			<span>Insert '0' for automatic indexing</span>
			</td>
		</tr>
		<tr>
			<td valign="top">Title</td>
			<td>&nbsp;</td>
			<td>
            <input type="text" name="title" required="required" />
			</td>
		</tr>
        <tr>
            <td valign="top">Year</td><td>&nbsp;</td>
            <td><input type="text" name="year" required="required" /></td>
        </tr>
        
        <tr>
            <td valign="top">Publisher</td><td>&nbsp;</td>
            <td><input type="text" name="publisher" required="required" /></td>
        </tr>
		
		<tr>
            <td valign="top">Author</td><td>&nbsp;</td>
            <td><input type="text" name="author" required="required" /></td>
        </tr>
		<tr>
			<td valign="top"><label class="control-label"> Date Received </label></td><td>&nbsp;</td>
			<td><input type="text" id="datepicker" name="date_received" class="input"></td>
        </tr>
		
		<tr>
            <td valign="top">Number of Pages (Optional)</td><td>&nbsp;</td>
            <td><input type="number" name="nop" /></td>
        </tr>
		
		<tr>
            <td valign="top">Quantity</td><td>&nbsp;</td>
            <td><input type="number" name="quantity" required="required" /></td>
        </tr>
		
		<tr>
            <td valign="top">Language</td><td>&nbsp;</td>
            <td>
			<select type="text" name="language" required="required"/>
			<option> </option>
			<option value="Indonesian">Indonesian</option>
			<option value="Bilingual">Bilingual</option>
			<option value="English">English</option>
			<option value="Other">Other</option> </select>
			</td>
        </tr>		
		
        <tr>
            <td><input type="submit" value="Save" />
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