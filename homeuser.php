<?php 
session_start();

//$_SERVER['HTTP_HOST'] so that the hostname changes dynamically

$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/lms/';

isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'user_home';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Library Management System</title>
	<link href="<?php echo $base_url;?>asset/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $base_url;?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="<?php echo $base_url;?>asset/css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo $base_url;?>asset/img/book.ico">
	<script type="text/javascript" src="<?php echo $base_url;?>asset/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>asset/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $base_url;?>asset/js/scripts.js"></script>
	
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
      }

      a:link, a:visited, a:hover {
        color: blue;
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
<style type="text/css">

.font1 {
    font-family: "Tahoma";
	color : #01579b;
	font-size : 38pt;
	font-weight: normal;
}
.font2 {
    font-family: "Berlin Sans FB";
	color : #bf360c;
	font-size : 16pt;
}
.font3 {
    font-family: "Palace Script MT";
	color : red;
	font-size : 30pt;
}
.font4 {
    font-family: "French Script MT";
	color : blue;
	font-size : 13pt;
}
</style>
	
</head>
<body>

<div id="container">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
			<div class="page-header"> 
				<table>
				<tr>
				<td>
				<img src="lms_logo.png" width="60" height="60" />
				&nbsp;
				</td>
					<td>
					<span class="font1">Library Management System</span>
					</td>
				</tr>
				
				<tr>
					<td></td>
					<td>
					<span class="font2">&nbsp; Perguruan Tinggi Lepisi</span>
					</td>
				</tr>
				</table>
				</div>
				<ul class="nav nav-tabs">
					<li <?php echo $app=='user_home'?'class="active"':'';?>><a href="homeuser.php"><i class="icon-home"></i> Home</a></li>
					
					<?php if(isset($_SESSION['level'])){?>
					<li <?php echo $app=='user_pending_tranz'?'class="active"':'';?>><a href="homeuser.php?app=user_pending_tranz"><i class="icon-refresh"></i> Pending Transactions</a></li>
					<li <?php echo $app=='user_book_list'?'class="active"':'';?>><a href="homeuser.php?app=user_book_list"><i class="icon-book"></i> Book List</a></li>	
				    <li <?php echo $app=='about'?'class="active"' :'';?>><a href="homeuser.php?app=about"><i class="icon-info-sign"></i> About</a></li>				
					<?php }?>

					<li class="dropdown pull-right">
					
					<?php if (isset($_SESSION['name'])):?>
						<a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-user"></i> <?php echo $_SESSION['name'];?> <strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
							<?php else:?>
						<a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-user"></i> Guest <strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li><a href="homeuser.php?app=login"><i class="icon-user"></i> Login</a></li>
							<?php endif;?>							
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
<div id="content">
<?php 	

//show message after logging in
if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']);}

//Check whether the file exists on the directory or not
if(file_exists('app/'.$app.'.php')){
	include ('app/'.$app.'.php'); 
}else{
	echo '<div class="well">Error : Cannot find <b>'.$app.'.php </b> in directory <b>app/..</b></div>';
}

?>
</div>
</div>
</body>
</html>
