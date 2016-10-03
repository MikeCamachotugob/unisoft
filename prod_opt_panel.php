
<?php
include('../connection/connect.php');
	//'../pChart2.1.4/examples/example.singlebarcode128.php'

$prod_opt_panel = '';

if(isset($_POST['prod_opt'])){
	
	$prod_id = $_POST['prod_id'];
	$_SESSION['prod_barcode'] = $_POST['prod_barcode'];

	
	$_SESSION['prod_opt'] = $_POST['prod_opt'];
		$sql = "select * from warehouse where prod_id = '$prod_id'";
		$query10 = mysql_query($sql) or die(mysql_error());
		$prod_data = mysql_fetch_assoc($query10);
	
	
		

	if($_POST['prod_opt'] == "view"){
		
		
		$prod_opt_panel = '<div  id = "prod_opt_panel" >
					
					<p id = "prod_pop_title"><b>product information</b></p>
					<img id = "prod_pop_img" src="#" height="160" width="160" ></br>
					<img id = "prod_pop_barcode" src="../pChart2.1.4/examples/example.singlebarcode128.php?prod_barcode='. $prod_data['prod_barcode'] .'" ></br>
					<p id = "prod_pop_info">
					<b>product id:</b>'.$prod_data['prod_id'].'</br></br>
					<b>product barcode:</b>'.$prod_data['prod_barcode'].'</br></br>
					<b>name:</b>'.$prod_data['prod_name'].'</br></br>
					<b>description:</b>'.$prod_data['prod_desc'].'</br></br>
					<b>price:</b>'.$prod_data['prod_price'].'</br></br>
					</p>
					</br>
					</br>
					<p id = "prod_pop_button">
					<a  href = "../pages/products.php" ><b>back</b></a>
					</p>
					</div>';
					
					
	}else if($_POST['prod_opt'] == "edit"){
		
				$prod_opt_panel = '<div  id = "prod_opt_panel" >
					
					<p id = "prod_pop_title"><b>edit product information</b></p>
					<img id = "prod_pop_img" src="../widgets/prod_barcode.php" height="160" width="160" ></br>
					<img id = "prod_pop_barcode" src="#" height="160" width="160" ></br>
					<p id = "prod_pop_info">
					<b>product id:</b>'.$prod_data['prod_id'].'</br></br>
					<b>product barcode:</b>'.$prod_data['prod_barcode'].'</br></br>
					<b>name:</b>'.$prod_data['prod_name'].'</br></br>
					<b>description:</b>'.$prod_data['prod_desc'].'</br></br>
					<b>price:</b>'.$prod_data['prod_price'].'</br></br>
					</p>
					</br>
					</br>
					<p id = "prod_pop_button">
					<input type = "submit" value = "change">
					<a  href = "../pages/products.php" ><b>back</b></a>
					</p>
					</div>';
		
$_SESSION['prod_barcode'] = $prod_data['prod_barcode'];
	}else if($_POST['prod_opt'] == "delete"){
		
		
		$prod_opt_panel = '<div  id = "prod_opt_panel" >
					
					<p id = "prod_pop_title"><b>delete product information</b></p>
					<img id = "prod_pop_img" src="#" height="160" width="160" ></br>
					<img id = "prod_pop_barcode" src="#" height="160" width="160" ></br>
					<p id = "prod_pop_info">
					<b>product id:</b>'.$prod_data['prod_id'].'</br></br>
					<b>product barcode:</b>'.$prod_data['prod_barcode'].'</br></br>
					<b>name:</b>'.$prod_data['prod_name'].'</br></br>
					<b>description:</b>'.$prod_data['prod_desc'].'</br></br>
					<b>price:</b>'.$prod_data['prod_price'].'</br></br>
					</p>
					</br>
					</br>
					<p id = "prod_pop_button">
					<input type = "submit" value = "change">
					<input type = "submit" value = "back">
					</p>
					</div>';
		
	}else{}


	
	
}else{
	
}


?>

<div ><?php echo $prod_opt_panel; ?></div>