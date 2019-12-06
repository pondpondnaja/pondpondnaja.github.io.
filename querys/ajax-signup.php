<?php

	header('Content-type: application/json');

	require ('../assets/config/config.php');
	mysqli_set_charset($conn,"utf8");
	
	$response = array();

	if ($_POST) {
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$hashed_password = hash('sha512',$_POST['password']);
		
		$sql_stmt = "INSERT INTO `users`(`f_name`, `user_email`, `user_password`) 
		             VALUES ('$name','$email','$hashed_password')";
	
		// check for successfull registration
        if (mysqli_query($conn,$sql_stmt)){
			$response['status'] = 'success';
			$response['message'] = 'registered sucessfully, you may login now';
        } else {
            $response['status'] = 'error'; // could not register
			$response['message'] = 'could not register, try again later';
        }	
	}
	echo json_encode($response);
?>