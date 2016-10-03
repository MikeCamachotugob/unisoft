<style>
#titlepage{
	
	position:absolute;	
	margin-top:-30px;
}
</style>

<link href = "../css/inv_page_style.css" rel = "stylesheet" type = "css/text" />

<?php include('../connection/connect.php'); ?>


<b id = "titlepage">manage inventory</b>


<div id = "curr_stock_sub" >
&nbsp;
<b>current stock of unisoft</b>
&nbsp;&nbsp;&nbsp;&nbsp;

<a id = "inv_btn" href = "../php_script/change_page.php?page=inv_out_form" >out</a>

<a id = "inv_btn" href = "../php_script/change_page.php?page=inv_in_form"  >in</a>

</div>

<?php //stock status

$sql = "select * from warehouse";
$query = mysql_query($sql) or die(mysql_error());

?>

<table id="stock_list" border="1">

<thead>
<tr bgcolor="#AAAAAA">
	<th width = "240px">product</th>
	<th width = "240px">desciption</th>
	<th width = "240px">current stock quantity</th>
</tr>
</thead>


<tbody>

<?php while($row = mysql_fetch_assoc($query)){?>
<tr>

	<td width = "240px" align = "center"><?php echo $row['prod_name'] ;?></td>
	<td width = "240px" align = "center"><?php echo $row['prod_desc'] ;?></td>
	<td width = "240px" align = "center"><?php echo $row['prod_qty'];?></td>
	


</tr>
	
<?php } ?>
 
 


</tbody>
</table>



<div id = "curr_stock_sub" >
&nbsp;
<b>movement record of stock</b>
&nbsp;&nbsp;&nbsp;&nbsp;
<a id = "inv_btn" href = "../php_script/change_page.php?page=inv_in_out_record" name="view_stock">view record</a>


</div>



<?php //in out table 

$sql2 = "select * from in_out_stock_log order by action_id desc";
$query2 = mysql_query($sql2) or die(mysql_error());

?>


<table id="in_out_list" border="1">

<thead>
<tr bgcolor="#AAAAAA">
	<th width = "50px">action</th>
	<th width = "90px">date</th>
	<th width = "90px">time</th>
	<th width = "210px">product</th>
	<th width = "130px">qty before</th>
	<th width = "130px">qty after</th>
</tr>
</thead>


<tbody>

<?php while($row2 = mysql_fetch_assoc($query2)){ ?>

<tr>

	<td width = "50px" align = "center"><?php echo $row2['action'] ;?></td>
	<td width = "90px" align = "center"><?php echo date("M-d-y" , strtotime($row2['date'])) ;?></td>
	<td width = "90px" align = "center"><?php echo date("h:i:a" , strtotime($row2['date'])) ;?></td>
	<td width = "210px" align = "center"><?php echo $row2['prod_name'] ;?></td>
	<td width = "130px" align = "center"><?php echo $row2['prev_qty'];?></td>
	<td width = "130px" align = "center"><?php echo $row2['prod_qty'];?></td>
	

</tr>
	
<?php } ?>
 

</tbody>
</table>


