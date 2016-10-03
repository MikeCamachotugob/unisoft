<?php			
session_start();
include('../connection/connect.php');

if(isset($_POST['change_person_info']))
{
                                 
$user_id		=	$_POST['user_id'];

$landline_no	=	$_POST['landline_no'];
$mobile_no		=	$_POST['mobile_no'];
$position		=	$_POST['position'];
$email			=	$_POST['email'];
$city			=	$_POST['city'];
$street_name	=	$_POST['street_name'];
$street_no		=	$_POST['street_no'];
$birthdate		=	$_POST['birthdate'];
$gender			=	$_POST['gender'];
$last_name		=	$_POST['last_name'];
$middle_name	=	$_POST['middle_name'];
$first_name		=	$_POST['first_name'];



			
			$query="update users set 
										landline_no = '$landline_no',
										mobile_no 	= '$mobile_no',
										position 	= '$position',
										email 		= '$email', 
										city 		= '$city',
										street_name = '$street_name',
										street_no 	= '$street_no',
										birthdate 	= '$birthdate',
										gender 		= '$gender',
										last_name 	= '$last_name',
										
										middle_name = '$middle_name',
										first_name 	= '$first_name'
										where user_id='$user_id'"; 
										$result = mysql_query($query) or die (mysql_error());
									
							
		$_SESSION['current_page'] 	= "user_view";
		$_SESSION['user_i_view']	= $user_id;
		echo "<script>;
				alert('user information successfully changed...');
					window.location='../pages/user_view.php';
						</script>";
	
	
}
else if(isset($_POST['change_log_info']))
{
                                 
$user_id		=	$_POST['user_id'];
$status			=	$_POST['status'];
$username		=	$_POST['username'];
$password		=	$_POST['password'];


			
			$query="update users set 
										status = '$status',
										username = '$username' ,
										password 	= '$password'
										where user_id='$user_id'"; 
										$result = mysql_query($query) or die (mysql_error());
									
							
		$_SESSION['current_page'] 	= "user_view";
		$_SESSION['user_i_view']	= $user_id;
		echo "<script>;
				alert('user information successfully changed...');
					window.location='../pages/user_view.php';
						</script>";
	
	
}else{
				
			$_SESSION['current_page'] = "user_edit";
				echo "<script>;
					alert('oops.. something went wrong...');
						window.location='../pages/user_page.php';
							</script>";
		
}
				
			
			

?>