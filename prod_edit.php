<style>




#prod_panel{
	background:#fdfdff;
	height:440px;
	width:770px;
	position:absolute;
}


#prod_title{
	
	margin-left:320px;

}
#prod_image{

	position:absolute;
	margin-left:160px;
	margin-top:170px;
	
}

#prod_barcode{
	
	position:absolute;
	margin-top:50px;

	margin-left:150px;

}

#prod_info{
	margin-top:60px;
	position:absolute;
	margin-left:380px;
	width:350px;
}


#prod_button{
	
	color:black;
	text-decoration:none;
	background: #ccc;
	display:block;
	width:100px;
	float:left;
	border-radius: 6px;
	text-align:center;
	float:right;
	padding:3px;
	margin-top:-100px;
	margin-right:30px;
	border-style: outset;
	border-color:#dddddd;
}
#prod_button:hover{
	background:#777777;
	cursor: pointer;
	color:white;
}


#change_btn{
	font-weight:bold;
	position:absolute;
	background: #ccc;
	border-radius: 6px;
	text-align:center;
	padding:5px;
	border: 3px outset #dddddd;
	width:100px;
	margin-top:-4px;
	margin-left:500px;
	

}
#change_btn:hover{
	background:#777777;
	cursor: pointer;
	color:white;
}



</style>
<?php
session_start();
include('../connection/connect.php');

	if(isset($_POST['prod_edit'])){
			$_SESSION['prod_id'] = $_POST['prod_id'];
			$_SESSION['prod_barcode'] = $_POST['prod_barcode'];

			
		$_SESSION['current_page'] = "prod_edit";
	}
	else if($_SESSION['current_page'] == "prod_edit"){
		$_SESSION['current_page'] = "prod_edit";
		
	}
	else{
			
		$_SESSION['current_page'] = "prod_page";
		echo "<script>;
		window.location='../pages/prod_page.php';
		</script>";
	}	
	
			$sql = "select * from warehouse where prod_id = '".$_SESSION['prod_id']."'";
			$query10 = mysql_query($sql) or die(mysql_error());
			$prod_data = mysql_fetch_assoc($query10);
?>

<div  id = "prod_panel" >
					
	<p id = "prod_title"><b>edit product information</b></p>

	<form action = "prod_change_image_form.php" method = "post">
		<input type = "hidden" name = "prod_id" value = "<?php echo $prod_data['prod_id']; ?>">
		<input type="image" src = "data:image;base64,<?php echo $prod_data['image']; ?>" 
		id = "prod_image" alt = "submit" height="160" width="160" title = "chenge this image?"></br>
	</form>
	
	
	<img id = "prod_barcode" href = "page.php"
	src="../pChart2.1.4/examples/example.singlebarcode128.php?prod_barcode=<?php echo $prod_data['prod_barcode']; ?>" ></br>

<form action = "../php_script/prod_proc_edit.php" method = "post" >
	<input type = "hidden" name = "prod_id" value = "<?php echo $prod_data['prod_id']; ?>"></br></br>

	<p id = "prod_info" >
	
	<b>product id:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
	<?php echo $prod_data['prod_id']; ?></br></br>

	<b>barcode:</b>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
	<input type = "text" size = "30" name = "prod_barcode" value = "<?php echo $prod_data['prod_barcode']; ?>"></br></br>

	<b>name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type = "text" size = "30" name = "prod_name" value = "<?php echo $prod_data['prod_name']; ?>"></br></br>

	<b>description:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type = "text" size = "30" name = "prod_desc" value = "<?php echo $prod_data['prod_desc']; ?>"></br></br>

	<b>price:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type = "text" size = "30" name = "prod_price" value = "<?php echo $prod_data['prod_price']; ?>"></br></br>
</p>
	<input id = "change_btn" type = "submit" name = "change" value = "update" onclick = "return confirmation();"></br></br>	

</form>

</br></br>

<a id = "prod_button" href = "../pages/prod_page.php" ><b>back</b></a>
</div>
					
					
					
<script>

function confirmation() {

if(confirm("the changes in the information of this product will be saved if you click ok.."))
{
   return true;
}else{
	return false;
}

}
</script>
				