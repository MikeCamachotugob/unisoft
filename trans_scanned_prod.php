

<link href="../css/trans_form_style.css" rel="stylesheet" type="css/text">

<?php 
include('../connection/connect.php');




	$scanned_prod_panel = '';


	if(isset($_POST['scanned'])){
		
		$prod_barcode = $_POST['scanned'];
		
//check if prod_barcode exist in product table
		$checkprod = mysql_query("select * from warehouse where prod_barcode = '$prod_barcode' ") or die ("product exist...");
		$pdata2 = mysql_fetch_assoc($checkprod);
		$count1 = mysql_num_rows($checkprod);
			
			//if the prod_barcode exist	
			 if($count1 == 1 ){
				 			 
							//populate variable scanned_prod_panel
							$checklist = mysql_query("select * from purchase_list where prod_barcode = '$prod_barcode' ") or die ("product exist...not");		
							$pdata3 = mysql_fetch_assoc($checklist);
							$count2 = mysql_num_rows($checklist);
							 //populate variable scanned_prod_panel
						

						
					if($count2  > 0 ){
							$scanned_prod_panel .= '
							<div id="pop_up_scanned">
							<p id= "title_info" align= "center"><b>change item quantity</b></p>
							<img  id = "prod_img" height = "140" width = "140"  src = "data:image;base64,'.$pdata2['image'].'">
						
							<form action="../php_script/new_trans_add_purch.php" method="post" >
							<p id = "prod_info">
							
							<b>product id:</b>&nbsp;&nbsp;&nbsp;
							'.$pdata2['prod_id'].'</br></br>
							
							<b>name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							'.$pdata2['prod_name'].'</br></br>
							
							<b>price:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							'.$pdata2['prod_price'].'</br></br>
							
							<b>description:&nbsp;&nbsp;
							</b>'.$pdata2['prod_desc'].'</br>
							
							</p>
							<input  type="hidden" name="prod_barcode" value="'.$pdata3['prod_barcode'].'">
							
							
							<p id="btn_panel" ></br>
							<b>entered quantity: </b>'.$pdata3['prod_qty'].'</br></br>
							<b>change quantity: &nbsp;</b>
							<input  size="2" name="prod_qty" onkeypress="return isNumberKey(event)" value="'.$pdata3['prod_qty'].'" autofocus></br>
								<input  type="hidden" name="prod_barcode" value="'.$pdata3['prod_barcode'].'">
								<input  id = "btn_change" type="submit" class = "btn_trans" name="add" value="change">
								<input  id = "btn_remove" type="submit" class = "btn_trans" name="add" value="remove">
							</p>
							
							</form>
							
						
							<form  action="" method="post">
						
							<input id = "cancel_btn3" class = "btn_trans" type="submit" name="cancel" value="cancel">
								
							</form>
							</div>';
						}else{
				 
								 //populate variable scanned_prod_panel
								$scanned_prod_panel .= '
								
								<div id="pop_up_scanned">
								<p id= "title_info" align= "center"><b>scanned item </b></p>
							
								<img  id = "prod_img" height = "140" width = "140"  src = "data:image;base64,'.$pdata2['image'].'">
								<form action="../php_script/new_trans_add_purch.php" method="post" >
								<p id = "prod_info">
								
								<b>product id:</b>&nbsp;&nbsp;&nbsp;
								'.$pdata2['prod_id'].'</br></br>
								
								<b>name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								'.$pdata2['prod_name'].'</br></br>
								
								<b>price:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								'.$pdata2['prod_price'].'</br></br>
								
								<b>description:&nbsp;&nbsp;
								</b>'.$pdata2['prod_desc'].'</br>
								
								</p>
								<input  type="hidden" name="prod_barcode" value="'.$pdata2['prod_barcode'].'">
								<input  type="hidden" name="prod_id" value="'.$pdata2['prod_id'].'">
								<input  type="hidden" name="prod_name" value="'.$pdata2['prod_name'].'">
								<input  type="hidden" name="prod_price" value="'.$pdata2['prod_price'].'">
								<input  type="hidden" name="prod_desc" value="'.$pdata2['prod_desc'].'">
								
								<p id="btn_panel" >
									
									<b>current quantity:</b>'.$pdata2['prod_qty'].'</br></br></br>
									<b>enter quantity:</b><input onkeypress="return isNumberKey(event)" type="text" size="2" name="prod_qty" autofocus>
									<input  id = "btn_add" class = "btn_trans" type="submit" name="add" value="add">
								</p>
								
								</form>
								
							
								<form  action="" method="post">
									
								<input id = "cancel_btn2"  class = "btn_trans" type="submit" name="cancel" value="cancel">
									
								</form>
								</div>';
								 
			 } 
		
	}else{}

	}
 ?>
 <div ><?php echo $scanned_prod_panel; ?></div>
 
 
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

