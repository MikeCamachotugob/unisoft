<?php 
session_start();
include('../connection/connect.php');

if(isset($_GET['trans_id'])){
	
	$trans_id = $_GET['trans_id'];
	if($_GET['action'] == "accept"){	
			
			
			
			//values above will be save to the table below
			$sql9000 = "update transaction set status ='success' where trans_id = '$trans_id'";
			$sql9001 = mysql_query($sql9000) or die (mysql_error());
			
			

		$sqllist="select * from trans_details  where trans_id = '$trans_id'";
		$trans_details=mysql_query($sqllist,$con) or die(mysql_error());
	
		while($trans_data=mysql_fetch_array($trans_details))
		{	
		$prod_price		=$trans_data['prod_price'];
		$prod_barcode	=$trans_data['prod_barcode'];
		$prod_name		=$trans_data['prod_name'];
		$prod_desc		=$trans_data['prod_desc'];
		$prod_qty		=$trans_data['prod_qty'];
															
								
									//get product prod_qty then reduce using prod_qty from list of purchase
									$sqlstock="select * from warehouse where prod_barcode = '$prod_barcode'";
									$stock_qty=mysql_query($sqlstock) or die(mysql_error());
									$stock5=mysql_fetch_array($stock_qty);

			
								
										$stock52 = $stock5['prod_qty'];
										//subtract prod_qty of stock with prod_qty from list of purchase
										$stock_totals  =  $stock52 - $trans_data['prod_qty'] ;
										
										$sql9000 = "update warehouse set prod_qty ='$stock_totals' where prod_barcode = '$prod_barcode'";
										$sql9001 = mysql_query($sql9000) or die (mysql_error());

										$querygo = mysql_query("insert into in_out_stock_log 
										( prod_qty ,  prod_name , action  , prev_qty , handled_by) 
										values
										('$stock_totals' , '$prod_name' , 'out', '$stock52', '".$_SESSION['name']."')") 
										or die(mysql_error());
			

				$_SESSION['current_page'] = "trans_page";
				echo "<script type=\"text/javascript\">
				alert('transaction accepted stock in inventory is automatically decreased');
				window.location=\"../pages/trans_page.php\";		
				</script>";


		}
			
			

		
		}else{ 


		//values above will be save to the table below
			$sql9000 = "update transaction set status ='rejected' where trans_id = '$trans_id'";
			$sql9001 = mysql_query($sql9000) or die (mysql_error());

		
				$_SESSION['current_page'] = "trans_page";
				echo "<script type=\"text/javascript\">
				alert('transaction rejected ...');
				window.location=\"../pages/trans_page.php\";		
				</script>";



		}




}
?>