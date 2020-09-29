<?php
	include_once ("validation.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Elelog - Form test</title>
		<link rel="stylesheet" href="css/login_style.css" type="text/css" />
		<script language="JavaScript" src="js/md5_codification.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/core.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>


<?php
	if(isset($error)){
 ?>
		<style type="text/css">
 		input:focus
 		{
  		border:solid red 1px;
 		}
 		</style>
<?php
	}
?>	
	</head>

<?php
	include_once ("header_images.php");
?>	
	
	<body>
		<center>
			<div id="login-form">
				<form id="login-form" method="post">
					<table align="center" width="40%" border="0">
<?php
	if(isset($error)){
?>
		    			<tr>
		    				<td id="validation_messages">
<?php 
if(isset($email_validation_message)){
	echo $email_validation_message;
} 
if(isset($password_validation_message)){
	echo $password_validation_message;
} 
?> 							</td>
		   				</tr>
<?php
	}
?>
						<tr>
							<td id="email_indicator">User: </td>
							<td><input type="email" name="email" placeholder="Introduce your user email" required value="<?php if(isset($email)){echo $email;} ?>"  <?php if(isset($validation_error_code) && $validation_error_code == 1){ echo "autofocus"; }  ?> /></td>
						</tr>
						
						<tr>
							<td id="password_indicator">Password: </td>
							<td><input type="password" name="password" placeholder="Introduce your password" required <?php if(isset($validation_error_code) && $validation_error_code == 2){ echo "autofocus"; }  ?> /></td>
							<input type=hidden name="codified_password" id="codified_password"/>
						</tr>
						
						<tr>
							<td colspan="2"><button type="submit" onClick="sendMD5(calculateMD5())" name="button-signin">Sign In</button></td>
						</tr>
						
					</table>
				</form>
			</div>
		</center>
	</body>
<?php
	include_once ("custom_footer.php");
?>	
</html>