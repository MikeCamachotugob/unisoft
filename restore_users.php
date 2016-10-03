<?php			
session_start();
include('../connection/connect.php');

if(isset($_GET['user_id']))
{
                                 
$user_id		=	$_GET['user_id'];



			
			$query="update users set status	= 'active'
										where user_id='$user_id'"; 
										$result = mysql_query($query) or die (mysql_error());
									
							
		echo "<script>;
				alert('user information successfully restored...');
					window.location='../pages/arc_users_page.php';
						</script>";
	
	
}else{
			
		
}
				
			
			

?>