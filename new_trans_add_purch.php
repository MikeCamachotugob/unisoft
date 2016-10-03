<?php 
include('../connection/connect.php');


if(isset($_POST['add'])){

	
		//pass the value of scanned that is prod_barcode and is quantity
		$prod_barcode = $_POST['prod_barcode'];
		$prod_qty = $_POST['prod_qty'];
	
			
			//check if prod_barcode exist in list of purchase
			$checklist = mysql_query("select * from purchase_list 
			where prod_barcode = '$prod_barcode' ") or die ("product exist...not");		
			$count2 = mysql_num_rows($checklist);
			
		
			//if prod_barcode does exist
if($count2 == 1){
			
			if($_POST['add'] == "change"){


			$update1 = "update purchase_list set prod_qty = '$prod_qty' where prod_barcode ='$prod_barcode'";
			$result = mysql_query($update1) or die (mysql_error());
			
		
			}else{
				
			
			$update1 = "delete from purchase_list where prod_barcode ='$prod_barcode'";
			$result = mysql_query($update1) or die (mysql_error());
			
			}
			
			
	echo "<script type=\"text/javascript\">
	window.location=\"../pages/trans_form_page.php\";		
	</script>";

} //if prod_barcode does not exist in list of purchase
else{					
					$prod_name = $_POST['prod_name'];
		$prod_price = $_POST['prod_price'];
		$prod_desc = $_POST['prod_desc'];	
	
			$update2 = "INSERT INTO	purchase_list
					(prod_barcode , prod_name , prod_qty , prod_price , prod_desc) 
			values ('".$prod_barcode."','".$prod_name."','".$prod_qty."','".$prod_price."','".$prod_desc."')";
			$result2 = mysql_query($update2) or die (mysql_error());

		
		echo "<script type=\"text/javascript\">
			window.location=\"../pages/trans_form_page.php\";		
		</script>";		
		
				}
			

}
?>
