<?php
	require ('../assets/config/config.php');
	mysqli_set_charset($conn,"utf8");
	
	if (isset($_REQUEST['email']) && !empty($_REQUEST['email']) ) {
		
		$email = trim($_POST['email']);
		
		$sql_stmt = "SELECT `user_email` FROM `users` WHERE user_email = '$email'";
		
		$result = mysqli_query($conn,$sql_stmt);

		if (mysqli_num_rows($result) > 0){
			echo 'false'; // email already taken
		} else {
			echo 'true'; 
		}
	}
?>