<?php
    session_start();
    header('Content-type: application/json');

	require ('../assets/config/config.php');
	mysqli_set_charset($conn,"utf8");
    $response = array();
    
    if($_POST){
        $username   = $_POST['user'];
        $password 	= hash('sha512',$_POST['pass']);

        $sql_stmt = "SELECT `f_name` , `user_email` , `user_password`  , `role`
                     FROM `users`
                     WHERE `user_email` = '$username'";
        
        $result = mysqli_query($conn,$sql_stmt);

        $row = mysqli_fetch_assoc($result);

        $name           = $row['f_name'];
        $password_data  = $row['user_password'];
        $role           = $row['role'];

        if(strcmp($password_data,$password) == 0){
            $response['status'] = 'success';

            if($role === '0'){

                $response['message'] = 'Welcome back admin '.$name;
                $_SESSION['status']    = 'Admin';
                $_SESSION['user_name'] = $name;


            }else if($role === '1'){

                $response['message'] = 'Login success';
                $_SESSION['status']    = 'User';
                $_SESSION['user_name'] = $name;

            }
        }else{
            $response['status'] = 'error'; // could not register
			$response['message'] = 'could not register, try again later';
        }
    }
    echo json_encode($response);
?>