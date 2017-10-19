<?php
include 'connect.php';
if (isset($_GET['user_id'])) {
    $query = $dbh->query("SELECT * FROM user WHERE user_id = '$_GET[user_id]'");
    $data  = $query->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Invalid User ID<br /><a href='../homeadmin.php?app=data_user'>Back</a>";
    exit();
}

if ($data === false) {
    echo "Invalid User ID<br /><a href='../homeadmin.php?app=data_user'>Back</a>";
    exit();
}
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
	<title>Edit <?php echo $data['level']=='admin'?'Admin':'User';?></title>
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
} ?>

<div id="wrapper">
<div class="page-header"><h3> Edit <?php echo $data['level']=='admin'?'Admin':'User';?> </h3></div>
</div>
  
<div id="wrapper">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">

<fieldset style="width: 100%; margin: auto;">
    
    <form action="admin_user_edit_action.php" method="post">
    <table align="center">    
		<input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>" />
		<input type="hidden" name="level" value="<?php echo $data['level']; ?>" />
		
		<tr>
            <td>User ID</td><td>&nbsp;</td>
            <td><?php echo $data['user_id']; ?></td>
        </tr>
		
		<tr>
            <td>Password</td><td>&nbsp;</td>
            <td><input type="text" name="password" required="required" value="<?php echo $data['password']; ?>"/></td>
        </tr>
		
        <tr>
            <td>Name</td><td>&nbsp;</td>
            <td><input type="text" name="name" required="required" value="<?php echo $data['name']; ?>"/></td>
        </tr>
        
        <tr>
            <td>Gender</td><td>&nbsp;</td>
            <td>
			<?php if ($data['gender'] === "M") : ?>
			<table>
			<tr>
			<td><input type="radio" name="gender" value="M" id="l" checked /><label for="l">Male</label></td>
			<td>&nbsp</td>
			<td><input type="radio" name="gender" value="F" id="p" /><label for="p">Female</label></td>
			</tr>
			</table>
            <?php else : ?>
			<table>
			<tr>
            <td><input type="radio" name="gender" value="M" id="l" /><label for="l">Male</label></td>
			<td>&nbsp</td>
            <td><input type="radio" name="gender" value="F" id="p" checked /><label for="p">Female</label></td>
			</tr>
			</table>
            <?php endif; ?>
			</td>
        </tr>
		
		<tr>
		<td><label class="control-label"> Date of Birth </label></td><td>&nbsp;</td>
            <td><input type="text" id="datepicker" name="dob" class="input" value="<?php echo $data['dob']; ?>"/></td>
        </tr>	
		
		<tr>
            <td>Faculty</td><td>&nbsp;</td>
            <td>
			<select type="text" name="faculty" required="required" value="<?php echo $data['faculty']; ?>" <?php echo $data['level']=='admin'?'disabled="disabled"':'';?>   />
			<option> </option>
			<option value="Akutansi" <?php echo ($data['faculty'] == 'Akutansi' ? 'selected' : '' )?> >Akutansi</option>
			<option value="Manajemen" <?php echo ($data['faculty'] == 'Manajemen' ? 'selected' : '' )?> >Manajemen</option>
			<option value="Lainnya" <?php echo ($data['faculty'] == 'Lainnya' ? 'selected' : '' )?> >Lainnya</option></select>
			</td>
        </tr>
        
		<tr>
            <td>Year</td><td>&nbsp;</td>
            <td><input type="text" name="year" required="required" value="<?php echo $data['year'];?>" <?php echo $data['level']=='admin'?'disabled="disabled"':'';?> /></td>
        </tr>
		
		<tr>
            <td>Address</td><td>&nbsp;</td>
            <td><input type="text" name="address" required="required" value="<?php echo $data['address']; ?>"/></td>
        </tr>
		
		<tr>
            <td>Email</td><td>&nbsp;</td>
            <td><input type="email" name="email" required="required" value="<?php echo $data['email']; ?>"/></td>
        </tr>
		
        <tr>
            <td>Phone</td><td>&nbsp;</td>
            <td><input type="text" name="phone" required="required" value="<?php echo $data['phone']; ?>" /></td>
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