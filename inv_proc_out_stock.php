<?php include('../connection/connect.php');?>
<?php
session_start();

//if out is selected out the outventory
if(isset($_POST['out'])){
		
//query employee firstname and lastname to be use later
 	
		$prod_barcode = $_POST['prod_barcode'];
		$prod_qty = $_POST['prod_qty'];
	
		$prod = mysql_query("select * from warehouse where prod_barcode = '$prod_barcode' ") or die ("cannot connect");
		
		$count1 = mysql_num_rows($prod);
		
		if($count1 == 0 || $prod_qty == ""){
			echo "<script type=\"text/javascript\">
			alert('product does not exist...');
			woutdow.location=\"../pages/inv_page.php\";		
			</script>";
			
			}else{
							
			
			$proddata = mysql_fetch_assoc($prod);
			$prod_code1 = $proddata['prod_barcode'];
			//add entered quantity to existoutg stock quantity
			$prod_quantity = $proddata['prod_qty'] - $prod_qty;
			
			//update stock 
			$update = "update warehouse set prod_qty = '$prod_quantity ' where prod_barcode ='$prod_barcode'";			
			$result = mysql_query($update) or die (mysql_error());
			
			
			//then record this values
			//to out out record
			//-------------//
			$date =date("Y-m-d h:i:sa");
			
			$action = 'out';
			$prod_name= $proddata['prod_name'];
			$prod_qty= $prod_quantity;
			$prev_qty= $proddata['prod_qty'];
			//also out sert data below 
			//$quantity
			
			//------------//
			$query3 = mysql_query("insert into in_out_stock_log 
				( prod_qty ,  prod_name , date , action  , prev_qty , handled_by , remarks) 
			values
				('$prod_qty' , '$prod_name','$date' , '$action', '$prev_qty', '".$_SESSION['name']."','".$_POST['remarks']."')") 
			or die(mysql_error());
			
			//record of out  process stops here
			echo "<script type=\"text/javascript\">
			alert('stock has been successfully released');
			window.location=\"../pages/inv_page.php\";		
			</script>";
			}
}
?>
