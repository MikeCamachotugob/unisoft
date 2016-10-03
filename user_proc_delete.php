<?php			
session_start();
include('../connection/connect.php');

if(isset($_GET['delete']))
{
                                 
$user_id		=	$_GET['delete'];


			
			$query="update users set status = 'archived'
										where user_id='$user_id'"; 
										$result = mysql_query($query) or die (mysql_error());
									
							
		$_SESSION['current_page'] = "user_page";
		
		echo "<script>;
				alert('user information successfully deleted and can be restored in archive...');
				window.location='../pages/user_page.php';
				</script>";
	
	
}else{
				
			$_SESSION['current_page'] = "user_delete";
				echo "<script>;
				alert('oops.. something went wrong...');
					window.location='../pages/user_delete.php';
						</script>";
	
}
				
			
			

?>