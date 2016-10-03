<?php include('../connection/connect.php');?>
<?php
session_start();

//if in is selected in the inventory
if(isset($_POST['in'])){
		
//query employee firstname and lastname to be use later
 	
		$prod_barcode = $_POST['prod_barcode'];
		$prod_qty = $_POST['prod_qty'];
	
		$prod = mysql_query("select * from warehouse where prod_barcode = '$prod_barcode' ") or die ("cannot connect");
		
		$count1 = mysql_num_rows($prod);
		
		if($count1 == 0 || $prod_qty == ""){
			echo "<script type=\"text/javascript\">
			alert('product does not exist...');
			window.location=\"../pages/inv_page.php\";		
			</script>";
			
			}else{
							
			
			$proddata = mysql_fetch_assoc($prod);
			$prod_code1 = $proddata['prod_barcode'];
			//add entered quantity to existing stock quantity
			$prod_quantity = $proddata['prod_qty'] + $prod_qty;
			
			//update stock 
			$update = "update warehouse set prod_qty = '$prod_quantity ' where prod_barcode ='$prod_barcode'";			
			$result = mysql_query($update) or die (mysql_error());
			
			
			//then record this values
			//to in out record
			//-------------//
			$date =date("Y-m-d h:i:sa");
			
			$action = 'in';
			$prod_name= $proddata['prod_name'];
			$prod_qty= $prod_quantity;
			$prev_qty= $proddata['prod_qty'];
			//also insert data below 
			//$quantity
			
			//------------//
			$query3 = mysql_query("insert into in_out_stock_log 
				( prod_qty ,  prod_name , date , action  , prev_qty , handled_by) 
			values
				('$prod_qty' , '$prod_name','$date' , '$action', '$prev_qty', '".$_SESSION['name']."')") 
			or die(mysql_error());
			
			//record of in  process stops here
			echo "<script type=\"text/javascript\">
			alert('stock has been successfully added');
			window.location=\"../pages/inv_page.php\";		
			</script>";
			}
}
?>
