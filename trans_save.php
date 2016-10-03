<?php 
include('../connection/connect.php');
session_start();

if(isset($_POST['trans_btn'])){
	
	
	if($_POST['trans_btn'] == "save"){
	
					
					if($_SESSION['user_type'] == 'admin' ){
						$status = 'success';	
					}else{					
						$status = 'pending';	
					}
					
					//pull data of current logged user
					$user_id   = $_SESSION['logged_id'];
					//pull data data of selected company
					$company = $_SESSION['selected'];		
					$date_due = $_SESSION['due_date'];		
					$handled_by = $_SESSION['name'];	
					$date_created = date("Y-m-d h:m:sa");
					
					
					//values above will be save to the table below
					$create_trans = "INSERT INTO transaction
					(company , date_created , handled_by , date_due , status) values 
					('$company','$date_created','$handled_by','$date_due','$status')";
					$rs1 = mysql_query($create_trans) or die (mysql_error());


					//query trans action table to get the highest
					$query3000="select * from transaction where trans_id=( select MAX(trans_id)
					from transaction where company = '$company' )";
					$trans_data=mysql_query($query3000,$con) or die (mysql_error());
					$trans=mysql_fetch_array($trans_data);
					$trans_id = $trans['trans_id'];
						

//declaration of all container variables to be used in the next procedure
$total_price=.00;
				//para sa stock product

	
				///declaration of variables stops here	
				//query list of purchase table
		$sqllist="select * from purchase_list ";
		$purchaselist=mysql_query($sqllist,$con) or die(mysql_error());
	
		while($list=mysql_fetch_array($purchaselist))
		{	
		$prod_price		=$list['prod_price'];
		$prod_barcode	=$list['prod_barcode'];
		$prod_name		=$list['prod_name'];
		$prod_desc		=$list['prod_desc'];
		$prod_qty		=$list['prod_qty'];
														
			//add to trans action content
			$query3 = "INSERT INTO	trans_details
			(trans_id,prod_barcode,prod_name,prod_price,prod_qty,prod_desc) values
			('$trans_id','$prod_barcode','$prod_name','$prod_price','$prod_qty','$prod_desc')";
			$rs2 = mysql_query($query3) or die (mysql_error());
			
								
									//get product prod_qty then reduce using prod_qty from list of purchase
									$sqlstock="select * from warehouse where prod_barcode = '$prod_barcode'";
									$stock_qty=mysql_query($sqlstock) or die(mysql_error());
									$stock5=mysql_fetch_array($stock_qty);

			
									//compute total price
									$total_price = $prod_price * $prod_qty;
									$stock52 = $stock5['prod_qty'];

								
									if($_SESSION['user_type'] == 'admin' ){
										//subtract prod_qty of stock with prod_qty from list of purchase
										$stock_totals  =  $stock52 - $list['prod_qty'] ;
										
										$sql9000 = "update warehouse set prod_qty ='$stock_totals' where prod_barcode = '$prod_barcode'";
										$sql9001 = mysql_query($sql9000) or die (mysql_error());

										$querygo = mysql_query("insert into in_out_stock_log 
										( prod_qty ,  prod_name , date , action  , prev_qty , handled_by) 
										values
										('$stock_totals' , '$prod_name','$date_created' , 'out', '$stock52', '".$_SESSION['name']."')") 
										or die(mysql_error());
									}else{}

		
		
		}

		
//values above will be save to the table below
$sql9000 = "update transaction set total_price ='$total_price' where trans_id = '$trans_id'";
$sql9001 = mysql_query($sql9000) or die (mysql_error());

		
//and to really finalize delete all existing data in list purchase
$query4="DELETE  FROM purchase_list"; 
$rs4=mysql_query($query4,$con) or die (mysql_error());


//unset selected
$_SESSION['selected']= '';
							
$_SESSION['current_page'] = "trans_page";
echo "<script type=\"text/javascript\">
		alert('transaction success stock in inventory is automatically decreased');
		window.location=\"../pages/trans_page.php\";		
		</script>";
	
}else{
	
		
$_SESSION['current_page'] = "trans_page";
echo "<script type=\"text/javascript\">
		alert('creating new transaction have been cancel..');
		window.location=\"../pages/trans_page.php\";		
		</script>";
		

}




}
?>