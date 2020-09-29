<?php

function obtainDatabasePassword($user_email) {
 	if(strcmp($user_email, 'elelog@elelog.es') == 0){
 	return '12345';	
 	}
} 
	
function isEmailInDatabase($email_to_be_checked) {
 	if(strcmp($email_to_be_checked, 'elelog@elelog.es') == 0){
 	return '1';	
 	} else {
 		return '0';
 	}
}	
	
	if(isset($_POST['button-signin'])){
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);	
	 	$codified_password = trim($_POST['codified_password']);	
		
	if(empty($email)){
		$error = "1";
		$email_validation_message = "Please, enter your user email.";
		$validation_error_code = 1;
	}
	
	else if(!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email)){
		$error = "1";
	 	$email_validation_message = "This email format seems to be unvalid.";
		$validation_error_code = 1;
	}
	 
	else if(empty($password)){
		$error = "1";
		$password_validation_message = "Please, enter your password.";
		$validation_error_code = 2;
	
	} else {
		
		if(isEmailInDatabase($email) == '1'){
		
			$database_password = obtainDatabasePassword($email);
			$server_password = strtolower(md5($database_password));
			$introduced_password = strtolower($codified_password);
			if ($server_password!=$introduced_password){
				$error = "1";
				$password_validation_message = "Incorrect password.";
				$validation_error_code = 2;
			} else {
?>	
		        <script>
		        	alert('Welcome! Username and password are correct.');
		  			document.location.href='index.php';
		        </script>
<?php
			}
		} else {
			$error = "1";
			$email_validation_message = "Your email it's not in our database.";
			$validation_error_code = 1;
		}
	 }
	}
?>