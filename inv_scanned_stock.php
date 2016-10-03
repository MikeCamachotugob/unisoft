<link href="../css/scan_page_style.css" rel="stylesheet" type="css/text">

<?php 
include('../connection/connect.php');
session_start();

	$scanned_prod_panel ='';


	if(isset($_POST['prod_barcode'])){
		
		$prod_barcode = $_POST['prod_barcode'];
		
//check if prod_barcode exist in product table
		$checkprod = mysql_query("select * from warehouse where prod_barcode = '$prod_barcode' ") or die ("product exist...");
		$pdata2 = mysql_fetch_assoc($checkprod);
		$count1 = mysql_num_rows($checkprod);
			
			//if the prod_barcode exist	
			 if($count1 == 1 ){
				

				 if($_POST['scan_opt'] == "in"){
				 //populate in panel
				$scanned_prod_panel .= '
				<div id="pop_up_scanned">
				
				<p id= "title_info" align= "center"><b>stock in</b></p>
				
				<img id = "prod_img" height = "140" width = "140"  src = "data:image;base64, '.$pdata2['image'].'">

				<form action="../php_script/inv_proc_in_stock.php" method="post" onsubmit = "return confirmation();">
				<p id = "prod_info">
				
				<b>product id:</b>'.$pdata2['prod_id'].'</br></br>
				
				<b>product name:</b>'.$pdata2['prod_name'].'</br></br>
				
				<b>product price:</b>'.$pdata2['prod_price'].'</br></br>
				
				<b>product desc:</b>'.$pdata2['prod_desc'].'</br>
			
				<p id="input_box" ><b>current stock:</br>  '.$pdata2['prod_qty'].'</br>quantity:</b>
					<input type="hidden" size="2" name="prod_barcode" value="'.$pdata2['prod_barcode'].'">
					<input type="text" size="2" name="prod_qty" onkeypress="return isNumberKey(event)">
					<input  id = "proceed_btn"  type="submit" name="in" value="in" >
				</p>
				
				</form>
				
			
				<a  id = "cancel_btn_in" class = "cancel_btn" href = "inv_page.php" >cancel</a>

	
			
				</div>';
				
				 }else if($_POST['scan_opt'] == "out"){
				
				//populate out panel
				$scanned_prod_panel .= '
				<div id="pop_up_scanned">
				
				<p id= "title_info" align= "center"><b>stock out</b></p>
				
				<img id = "prod_img" height = "140" width = "140"  src = "data:image;base64, '.$pdata2['image'].'">

				<form action="../php_script/inv_proc_out_stock.php" method="post" onsubmit = "return confirmation();">
				<p id = "prod_info">
				
				<b>product id:</b>'.$pdata2['prod_id'].'</br></br>
				
				<b>product name:</b>'.$pdata2['prod_name'].'</br></br>
				
				<b>product price:</b>'.$pdata2['prod_price'].'</br></br>
				
				<b>product desc:</b>'.$pdata2['prod_desc'].'</br>
			
				<p id="input_box" ><b>current stock: '.$pdata2['prod_qty'].'</br></br>
					quantity:</b>
					<input type="hidden"  name="prod_barcode" value="'.$pdata2['prod_barcode'].'">
					<input type="text" size="2" name="prod_qty" onkeypress="return isNumberKey(event)" ></br></br>
					<b>remarks:</b>
					<input type="text" size="20" name="remarks">
					<input  id = "proceed_btn" type="submit" name="out" value="out" >
				</p>
				
				</form>
				
			
				<a class = "cancel_btn" id = "cancel_btn_out" href = "inv_page.php" >cancel</a>

	
			
				</div>';
				}else{}
				 
			 }else{
				 
				 	echo "<script type=\"text/javascript\">
					alert('product does not exist...');
					window.location=\"../pages/".$_SESSION['current_page'].".php\";		
					</script>";
				 	$scanned_prod_panel = '';		
			 }
	
	}else{}
 ?>
<div id = "scanned_prod_panel" ><?php echo $scanned_prod_panel; ?></div>


<script>

function confirmation() {

if(confirm("click ok to proceed..?"))
{
   return true;
}else{
	return false;
}

}
</script>


<script language=Javascript>
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       //-->
</script>
