<?php			
session_start();
include('../connection/connect.php');

if(isset($_POST['change']))
{
                                 
$prod_barcode	=	$_POST['prod_barcode'];
$prod_name		=	$_POST['prod_name'];
$prod_desc		=	$_POST['prod_desc'];
$prod_price		=	$_POST['prod_price'];
$prod_id		=	$_POST['prod_id'];


			
			$query="update warehouse set prod_name = '$prod_name' , prod_barcode = '$prod_barcode',
										prod_desc = '$prod_desc' , prod_price = '$prod_price'
										where prod_id='$prod_id'"; 
										$result = mysql_query($query) or die (mysql_error());
									
							
		$_SESSION['current_page'] = "prod_page";
		
		echo "<script>;
				alert('product information successfully changed...');
				window.location='../pages/prod_page.php';
				</script>";
	
	
}else{
				
			$_SESSION['current_page'] = "prod_edit";
				echo "<script>;
				alert('oops.. something went wrong...');
					window.location='../pages/prod_page.php';
						</script>";
	
}
				
			
			

?>