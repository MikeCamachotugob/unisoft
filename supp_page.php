
<style>
#titlepage{
	
	position:absolute;	
	margin-top:-120px;
}
</style>

<link href = "../css/supp_page_style.css" rel = "stylesheet" type = "css/text" />

<b id = "titlepage">manage suppliants</b>

<div id = "sub_navigation" >

</br></br>

<form action = "" method = "post" >
	<b>search name:</b> <input type="text" size = "40" name="search_box" value="">
	<input id = "search_btn" type="submit" name="search" value="search">
</form>

<a href = "../php_script/change_page.php?page=supp_add_form" >add suppliant</a>
	
</div>



<?php
include('../connection/connect.php');
session_start();

$sql = "select * from suppliants where  ";

if(isset($_POST['search'])){
	$search = $_POST['search_box'];
	if($search == ""){
		$sql .= " ";
	}else{
	$first_letter = substr($search , 0);
	$sql .= " company like '$first_letter%' and ";
	}
}
$sql .= " status != 'archived' order by supp_id desc ";
$query = mysql_query($sql) or die(mysql_error());
?>







<table id="supp_list" border = "1">

<thead>
<tr  bgcolor="#AAAAAA">
	<th width = "320px" >company</th>
	<th width = "320px" >email</th>
	<th id="opt">option</th>
</tr>
</thead>


<tbody>

<?php while($row = mysql_fetch_assoc($query)){?>
<tr align = "center">

	<td width = "320px" ><?php echo $row['company'];?></td>
	<td width = "320px" ><?php echo $row['email'];?></td>
	
<td id="opt" >
<?php	
if( $_SESSION['user_type']  == 'admin'){
?>
		<form action = "supp_delete.php"  method = "post"  >
			<input type = "hidden" name="supp_id" value="<?php echo $row['supp_id'] ?>">		
					<input id="opt_btn_delete" type="image" title="delete suppliant" name = "supp_delete" 
						src="../images/delete.png" alt="Submit" width="20" height="20">
		</form>		
	
	
		<form action = "supp_edit.php"  method = "post"  >
			<input type = "hidden" name="supp_id" value="<?php echo $row['supp_id'] ?>">			
					<input id="opt_btn_edit" type="image" title="edit suppliant information"  name = "supp_edit" 
						src="../images/edit.png" alt="Submit" width="20" height="20">
		</form>
				
<?php
}else{}		
?>
		<form action = "supp_view.php"  method = "post"  >
			<input type = "hidden" name="supp_id" value="<?php echo $row['supp_id'] ?>">		
					<input id="opt_btn_view"  type="image" title="view suppliant information" name = "supp_view" 
						src="../images/view.png" alt="Submit" width="20" height="20">
		</form>	

</td></tr>
 
<?php } ?>


</tbody>
</table>




<script src = "../../js_script/jquery-ui.min.js" type = "text/javascript" ></script>