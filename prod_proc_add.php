<?php
include('../connection/connect.php');
session_start();

	if(isset($_POST['prod_save'])){
		
		$prod_name = $_POST['prod_name'];
		$prod_price = $_POST['prod_price'];
		$prod_desc = $_POST['prod_desc'];
		$prod_barcode = $_POST['prod_barcode'];
		
				
			$query=mysql_query("INSERT INTO warehouse(
							prod_name,
							prod_price,
							prod_desc,
							prod_barcode,
							status) 
										
					VALUES (
					'$prod_name',
					'$prod_price',
					'$prod_desc',
					'$prod_barcode',
					'active'
					)") or die(mysql_error());
							
						
							
							
		mysql_close($con);
		
		$_SESSION['current_page_nav'] = "prod_page";
		
		echo "<script>;
		alert('product successfully created..');
		window.location='../pages/prod_page.php';
		</script>";
				
		
	}else{}

?>