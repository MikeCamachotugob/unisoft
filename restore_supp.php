<?php			
session_start();
include('../connection/connect.php');

if(isset($_GET['supp_id']))
{
                                 
$supp_id		=	$_GET['supp_id'];



			
			$query="update suppliants set status	= ''
										where supp_id='$supp_id'"; 
										$result = mysql_query($query) or die (mysql_error());
									
							
		echo "<script>;
				alert('suppliant information successfully restored...');
					window.location='../pages/arc_supp_page.php';
						</script>";
	
	
}else{
			
		
}
				
			
			

?>