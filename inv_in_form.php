




<style>

	#stock_panel{
		
		background:#dfdfd0;
		height:500px;
		width:765px;
	}
		
	#cancel_btn{
		
		color:black;
		text-decoration:none;
		padding: 3px;
		border-radius: 0.5em;
		background: #cccccc;
		border: outset  #dddddd;
		font-weight: bold;
		margin-right: 100px;
		margin-top: 100px;
		float:right;

	}
	#cancel_btn:hover {
		
		background: #777777;
		cursor: pointer;
		color:white;
		
	}

	#p_title{
		
		font-size:20px;
		font-weight:bold;
		height:100px;
		width:400px;
		position:absolute;
		margin-left:210px;
		margin-top:140px;
		
	}
	#input{
		
		
		font-size:20px;
		font-weight:bold;
		height:100px;
		width:400px;
		position:absolute;
		margin-left:210px;
		margin-top:300px;
		
	}

</style>

<?php include('../connection/connect.php');?>

<a id = "cancel_btn" href = "inv_page.php" >cancel</a>


<form action="../pages/inv_scanned_stock.php" method="post" onsubmit = "return confirmation();">

<div id = "stock_panel">

	<p id = "p_title">
	scan item to be add to inventory</br></br>

	start scanning...
	</p>

<p id = "input" >product code:
	<input type="text" size="30" name="prod_barcode" autofocus>
	<input type="hidden" name="scan_opt" value="in">
</p>

</div>
</form>


			
			
