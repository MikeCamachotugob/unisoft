<?php
include('../connection/connect.php');
session_start();

	if(isset($_POST['user_save'])){
		
		$user_type = $_POST['user_type'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$phone = $_POST['phone'];
		$gender = $_POST['gender'];
		$position = $_POST['position'];
		$birthdate = $_POST['birthdate'];
		$email = $_POST['email_address'];
		$street_no = $_POST['street_no'];
		$street_name = $_POST['street_name'];
		$city = $_POST['city'];
				
			$query=mysql_query("INSERT INTO users(
							user_type,
							username,
							password,
							first_name,
							middle_name,
							last_name,
							phone,
							gender,
							position,
							status,
							birthdate,
							street_no,
							street_name,
							city,
							email) 
										
					VALUES (
					'$user_type',
					'$username',
					'$password',
					'$fname',
					'$mname',
					'$lname',
					'$phone',
					'$gender',
					'$position',
					'deactivated',
					'$birthdate',
					'$street_no',
					'$street_name',
					'$city',
					'$email'
					)") or die(mysql_error());
							
						
							
							
		mysql_close($con);
		
		$_SESSION['current_page_nav'] = "user_page";
		
		echo "<script>;
		alert('new user been added to the system...');
		window.location='../pages/user_page.php';
		</script>";
				
		
	}else{}

?>