<?php			
session_start();
include('../connection/connect.php');

if(isset($_GET['delete']))
{
                                 
$supp_id		=	$_GET['delete'];


			
			$query="update suppliants set status = 'archived'
										where supp_id='$supp_id'"; 
										$result = mysql_query($query) or die (mysql_error());
									
							
		$_SESSION['current_page'] = "supp_page";
		
		echo "<script>;
				alert('suppliant information successfully deleted and can be restored in archive...');
				window.location='../pages/supp_page.php';
				</script>";
	
	
}else{
				
			$_SESSION['current_page'] = "prod_delete";
				echo "<script>;
				alert('oops.. something went wrong...');
					window.location='../pages/prod_delete.php';
						</script>";
	
}
				
			
			

?>