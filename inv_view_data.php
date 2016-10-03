



<style>

#wrap{
	
	height:480px;
	width:760px;
	
}

#info{
	
	margin-top:50px;
	height:400px;
	width:760px;
	
}


#back_btn{
	
	color:black;
	margin-right:30px;
	margin-top:20px;
	text-decoration:none;
	background: #ccc;
	display:block;
	width:100px;
	border-radius: 6px;
	text-align:center;
	float:right;
	padding:1px;
	border-style: outset;
	border-color:#dddddd;
	font-weight:bold;

}
#back_btn:hover{
	background:#777777;
	cursor: pointer;
	color:white;
}

#dates{
	
	float:right;
	margin-right:70px;
	
}
#info_stock{
	
	margin-left:40px;
	margin-top:100px;
	position:absolute;
	
}

#stock{
	
	margin-left:400px;
	margin-top:100px;
	position:absolute;
	
}

</style>

<?php

include('../connection/connect.php');


if(isset($_POST['action_id'])){
	
	
		$sql = "select * from in_out_stock_log where action_id = '".$_POST['action_id']."'";
		$query2 = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_assoc($query2);
}else{
	echo "<script>;
	window.location='inv_in_out_record.php';
	</script>";
}


?>




<div id = "wrap" >

	<center><b>stock information</b></center>


<a id = "back_btn" href = "inv_in_out_record.php" name="view_stock">back</a>



			<div id = "info" >
			
			
			
			
			
			
					</br>
					<p id = "dates" ><b>
						date: <?php echo date("M d,Y",strtotime($row['date'])); ?></br>
						time: <?php echo date("h:ma",strtotime($row['date'])); ?></b>
					</p>
					
					
					<p id = "info_stock"><b>
						product name: <?php echo $row['prod_name']; ?></br></br>
						action: <?php echo $row['action']; ?></br></br>
						done by: <?php echo $row['handled_by']; ?></b>
					</p>
					
					
					<p id = "stock"><b>
						stock: <?php echo $row['prod_name']; ?></br></br>
						stock before: <?php echo $row['prev_qty']; ?></br></br>
						stock after: <?php echo $row['prod_qty']; ?></b>
					</p>
					
			</div>
</div>




