<?php			
session_start();
include('../connection/connect.php');

if(isset($_GET['prod_id']))
{
                                 
$prod_id		=	$_GET['prod_id'];



			
			$query="update warehouse set status	= ''
										where prod_id='$prod_id'"; 
										$result = mysql_query($query) or die (mysql_error());
									
							
		echo "<script>;
				alert('product information successfully restored...');
					window.location='../pages/arc_prod_page.php';
						</script>";
	
	
}else{
			
		
}
				
			
			

?>