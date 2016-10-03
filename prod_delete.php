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
	margin-top:130px;
	
}

#prod_barcode{
	
	position:absolute;
	margin-top:20px;

	margin-left:150px;

}

#prod_info{
	margin-top:60px;
	position:absolute;
	margin-left:440px;
	width:300px;
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
	border: outset #dddddd;
	margin-top:-50px;
	margin-right:20px;

}
#prod_button:hover{
	background:#777777;
	cursor: pointer;
	color:white;
}

#delete_btn{
	font-weight:bold;
	position:absolute;
	background: #ccc;
	border-radius: 6px;
	text-align:center;
	padding:5px;
	border:3px outset #dddddd;
	width:100px;
	margin-top:-34px;
	margin-left:500px;

}
#delete_btn:hover{
	background:#777777;
	cursor: pointer;
	color:white;
}


</style>
<?php
session_start();
include('../connection/connect.php');

	if(isset($_POST['prod_delete'])){
			$_SESSION['prod_id'] = $_POST['prod_id'];
			$_SESSION['prod_barcode'] = $_POST['prod_barcode'];

			
		$_SESSION['current_page'] = "prod_delete";
	}
	else if($_SESSION['current_page'] == "prod_delete"){
		$_SESSION['current_page'] = "prod_delete";
		
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
					
<p id = "prod_title"><b>delete this product</b></p>

<img id = "prod_image" height="160" width="160"  src = "data:image;base64,<?php echo $prod_data['image']; ?>">

<img id = "prod_barcode" src="../pChart2.1.4/examples/example.singlebarcode128.php?prod_barcode=<?php echo $_SESSION['prod_barcode']; ?>" ></br>

<p id = "prod_info" >
<b>product id:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
<?php echo $_SESSION['prod_id']; ?></br></br>

<b>barcode:</b>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $_SESSION['prod_barcode']; ?></br></br>

<b>name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $prod_data['prod_name']; ?></br></br>

<b>description:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $prod_data['prod_desc']; ?></br></br>

<b>price:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $prod_data['prod_price']; ?></br></br>
</p>

</br></br>

<form	action = "../php_script/prod_proc_delete.php" method = "post" >
<input type = "hidden" name = "prod_id" value = "<?php echo $_SESSION['prod_id']; ?>" >
<input type = "submit" id = "delete_btn" name = "delete" value = "delete" onclick = "return confirmation();" >
</form>

<a id = "prod_button" href = "../pages/prod_page.php" ><b>back</b></a>
</div>
					
				
				
				
				
<script>

function confirmation() {

if(confirm("this product information will be deleted if you click ok.."))
{
   return true;
}else{
	return false;
}

}
</script>