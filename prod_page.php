
<style>
#titlepage{
	
	position:absolute;	
	margin-top:-120px;
}
</style>

<link href = "../css/prod_page_style.css" rel = "stylesheet" type = "css/text" />

<b id = "titlepage">manage products</b>

<div id = "sub_navigation" >

<form action = "" method = "post" >

	<b>search product name: </b><input type = "text" name = "search_box" size = "40">
	<input id = "search_btn" type = "submit" name = "search" value = "search" >

</form>


<a href = "../php_script/change_page.php?page=prod_add_form" >add product</a>
	
</div>



<?php
include('../pages/prod_opt_panel.php');
include('../connection/connect.php');
session_start();
$_SESSION['prod_barcode'] = '';
$sql = "select * from warehouse where status != 'archived' ";

if(isset($_POST['search'])){
	$search = $_POST['search_box'];
	if($search == ""){
		$sql .= " ";
	}else{
	$first_letter = substr($search,0);
	$sql .= " and prod_name like '$first_letter%'";
	
	}
}
$sql .= "   order by prod_id desc";
$query = mysql_query($sql) or die(mysql_error());
?>






<table align = "center" id="prod_list" border = "1">
<thead>
<tr bgcolor="#AAAAAA">
	<th width = "310px" >product</th>
	<th width = "310px" >description</th>
	<th width = "100px">option</th>
</tr>
</thead>

<tbody>
<?php while($row = mysql_fetch_assoc($query)){?>


<tr align = "center">

	<td width = "310px" ><?php echo $row['prod_name'];?></td>
	<td width = "310px" ><?php echo $row['prod_desc'];?></td>
	
<td width = "100px" align = "center">
<?php	
if($_SESSION['user_type'] == 'admin'){
?>	
		<form action = "prod_delete.php"  method = "post"  >
			<input type = "hidden" name="prod_id" value="<?php echo $row['prod_id'] ?>">		
				<input type = "hidden" name="prod_barcode" value="<?php echo $row['prod_barcode'] ?>">	
					<input id="opt_btn_delete" type="image" title="delete product" name = "prod_delete" value = "delete product"
						src="../images/delete.png" alt="Submit" width="20" height="20">
		</form>		
	

	
		<form action = "prod_edit.php"  method = "post"  >
			<input type = "hidden" name="prod_id" value="<?php echo $row['prod_id'] ?>">		
				<input type = "hidden" name="prod_barcode" value="<?php echo $row['prod_barcode'] ?>">	
					<input id="opt_btn_edit" type="image" title="edit product"  name = "prod_edit" value = "edit product"
						src="../images/edit.png" alt="Submit" width="20" height="20">
		</form>
				
<?php
}else{}
?>

		<form action = "prod_view.php"  method = "post"  >
			<input type = "hidden" name="prod_id" value="<?php echo $row['prod_id'] ?>">		
				<input type = "hidden" name="prod_barcode" value="<?php echo $row['prod_barcode'] ?>">
					<input id="opt_btn_view"  type="image" title="view product" name = "prod_view" value = "view product"
						src="../images/view.png" alt="Submit" width="20" height="20">
		</form>	
		
	</td></tr>
<?php } ?>
</tbody>

</table>



