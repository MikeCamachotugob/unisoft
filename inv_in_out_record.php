




<style>

#back_btn{
	
	color:black;
	margin-right:30px;
	margin-top:60px;
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


#search_btn{
	
	color:black;
	text-decoration:none;
	background: #ccc;
	width:100px;
	border-radius: 6px;
	text-align:center;
	padding:1px;
	border-style: outset;
	border-color:#dddddd;
	font-weight:bold;

}
#search_btn:hover{
	background:#777777;
	cursor: pointer;
	color:white;
}



#in_out_list {
	border:none;
     width:765px;
}

#in_out_list thead {
	margin-top:10px;
   display: inline-block;
    width:765px;
    height: 20px;
	
}
#in_out_list tbody {
	margin-top:6px;
	display: inline-block;
    width:765px;
    height: 360px;       /* Just for the demo          */
    overflow-y: auto;    /* Trigger vertical scroll    */
    overflow-x: hidden;  /* Hide the horizontal scroll */
}
#in_out_list thead, tbody { display: block; }


#wrap{
	
	width:765px;
    height: 500px;  
}



</style>

<?php 

session_start();
include('../connection/connect.php');


$sql = "select * from in_out_stock_log   ";

if(isset($_POST['search'])){
	$search = $_POST['search_box'];
	if($search == ""){
		$sql .= " ";
	}else{
	$first_letter = substr($search , 0);
	$sql .= " where action like '$first_letter%' ";
	$sql .= " or prod_name like '$first_letter%' ";
	$sql .= " or handled_by like '$first_letter%' ";
	}
}
$sql .= " order by action_id desc ";
$query2 = mysql_query($sql) or die(mysql_error());
?>


<div id = "wrap">
<b>stock movement record</b>
<a id = "back_btn" href = "inv_page.php" name="view_stock">back</a>

</br></br></br>
<form action = "" method = "post" >
	<b>search:</b> <input type="text" size = "40" name="search_box" value="">
	<input id = "search_btn" type="submit" name="search" value="search">
</form>


<table id="in_out_list" border="1">

<thead>
<tr bgcolor="#AAAAAA">
	<th width = "200px">product name</th>
	<th width = "70px">action</th>
	<th width = "90px">date</th>
	<th width = "90px">time</th>
	<th width = "90px">qty before</th>
	<th width = "90px">qty after</th>
	<th width = "70px">option</th>
</tr>
</thead>


<tbody>

<?php while($row2 = mysql_fetch_assoc($query2)){ ?>

<tr>

	<td width = "200px" align = "center"><?php echo $row2['prod_name'] ;?></td>
	<td width = "70px" align = "center"><?php echo $row2['action'] ;?></td>
	<td width = "90px" align = "center"><?php echo date("M-d-y" , strtotime($row2['date'])) ;?></td>
	<td width = "90px" align = "center"><?php echo date("h:i:a" , strtotime($row2['date'])) ;?></td>
	<td width = "90px" align = "center"><?php echo $row2['prev_qty'];?></td>
	<td width = "90px" align = "center"><?php echo $row2['prod_qty'];?></td>
	
	<td width = "70px" align = "center"><form action = "inv_view_data.php" method = "post">
		<input type = "image" src = "../images/view.png" name = "action_id" value = "<?php echo $row2['action_id'];?>"
			height = "20px" width = "20px" alt = "submit" title = "view this record" >
	</form>
	</td>
	

</tr>
	
<?php } ?>
 
</tbody>
</table>

</div>
