<?php empty( $app ) ? header('location:../index.php') : '' ;?>
<div class="well">

<form method="POST" action="login_action.php" accept-charset="UTF-8">
	<table align="center">
		<tr><?php if(isset($_SESSION['error'])){?>
			<td colspan="3"><div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">x</a>
			<?php echo $_SESSION['error']; unset($_SESSION['error']);}?></td>
		</tr>
		<tr>	
			<td valign="top"><label>User ID&nbsp;</label></td>
			<td valign="top">:&nbsp;</td>
			<td><input class="span3" placeholder="User ID" type="text" name="user_id" required="required"></td>
		</tr>
		<tr>	
			<td valign="top"><label>Password&nbsp;</label></td>
			<td valign="top">:&nbsp;</td>
			<td><input class="span3" placeholder="Password" type="password" name="password" required="required"></td>
		</tr>
		<tr>
			<td colspan="3" align="right"><button class="btn-warning btn" type="reset">Reset</button>
			<colspan="3" align="right"><button class="btn-info btn" type="submit">Login</button></td>

		</tr>
	</table>
</form>
</div>