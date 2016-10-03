<?php			
session_start();
include('../connection/connect.php');

if(isset($_POST['delete']))
{
                                 
$prod_id		=	$_POST['prod_id'];


			
			$query="update warehouse set status = 'archived'
										where prod_id='$prod_id'"; 
										$result = mysql_query($query) or die (mysql_error());
									
							
		$_SESSION['current_page'] = "prod_page";
		
		echo "<script>;
				alert('product information successfully deleted and can be restored in archive...');
				window.location='../pages/prod_page.php';
				</script>";
	
	
}else{
				
			$_SESSION['current_page'] = "prod_delete";
				echo "<script>;
				alert('oops.. something went wrong...');
					window.location='../pages/prod_delete.php';
						</script>";
	
}
				
			
			

?>