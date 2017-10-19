<?php 
session_start();

$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/lms/';

isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'admin';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add New Admin</title>
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
<div class="page-header"><h3> Add New Admin</h3></div>
</div>

<div id="wrapper">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
			
<fieldset style="width: 100%; margin: auto;">
<form action="admin_user_input_action.php" method="post">
	<table align="center">
	<input type="hidden" name="level" value="admin" />
		<tr>
            <td>User ID</td>
            <td><input type="text" name="user_id" required="required" /></td>
        </tr>
		
		<tr>
            <td>Password</td>
            <td><input type="password" name="password" id="password" required="required" /></td>
        </tr>
		
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" required="required" /></td>
        </tr>
        
        <tr>
		    <td>Gender</td>
			<td><table>
			<tr>
			<td><input type="radio" name="gender" value="M" id="M" /><label for="M">Male</label></td>
			<td>&nbsp</td>
			<td><input type="radio" name="gender" value="F" id="F" /><label for="F">Female</label></td>
			</tr>
			</table></td>
        </tr>
		
		<tr>
			<td><label class="control-label">Date of Birth</label></td>
			<td><input type="text" id="datepicker" name="dob" class="input"  ></td>
        </tr>

		<tr>
            <td>Address</td>
            <td><input type="text" name="address" required="required" /></td>
        </tr>
		
		<tr>
			<td>Email</td>
			<td><input type="email" name="email" required="required" /></td>
        </tr>
        
        <tr>
            <td>Phone Number</td>
            <td><input type="text" name="phone" required="required" /></td>
        </tr>
		
		<tr>
			<td><div id="Result"></div></td>
		</td>
		
        <tr>
			<td></td>
            <td><input type="submit" value="Add" />
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