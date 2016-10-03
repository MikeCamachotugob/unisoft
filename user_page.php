<style>
#titlepage{
	
	position:absolute;	
	margin-top:-120px;
}
</style>


<link href = "../css/user_page_style.css" rel = "stylesheet" type = "css/text" />

<b id = "titlepage">manage users</b>

<div id = "sub_navigation" >

</br></br>

<form action = "" method = "post" >
	<b>search name:</b> <input type="text" size = "40" name="search_box" value="">
	<input id = "search_btn" type="submit" name="search" value="search">
</form>

<a href = "../php_script/change_page.php?page=user_add_form" >add user</a>
	
</div>



<?php
include('../connection/connect.php');
session_start();

$sql = "select * from users where  ";

if(isset($_POST['search'])){
	$search = $_POST['search_box'];
	if($search == ""){
		$sql .= " ";
	}else{
	$first_letter = substr($search , 0);
	$sql .= " first_name like '$first_letter%' ";
	$sql .= " or last_name like '$first_letter%' and ";
	}
}
$sql .= " status != 'archived' and user_id != '".$_SESSION['logged_id']."' order by user_id desc ";
$query = mysql_query($sql) or die(mysql_error());
?>







<table id="user_list" border = "1">

<thead>
<tr  bgcolor="#AAAAAA">
	<th id="opt" >status</th>
	<th>name</th>
	<th>position</th>
	<th id="opt">user type</th>
	<th id="opt">option</th>
</tr>
</thead>


<tbody>

<?php while($row = mysql_fetch_assoc($query)){?>
<tr>

	<td id="opt" align = "center"><?php echo $row['status'] ;?></td>
	<td align = "center"><?php echo $row['first_name'] .' '. $row['last_name'];?></td>
	<td align = "center"><?php echo $row['position'];?></td>
	<td id="opt" align = "center"><?php echo $row['user_type'];?></td>
	
<?php	
echo'<td id="opt" align = "center">
		<form action = "user_delete.php"  method = "post"  >
			<input type = "hidden" name="user_id" value="'.$row['user_id'].'">		
					<input id="opt_btn_delete" type="image" title="delete user" name = "user_delete" value = "delete user"
						src="../images/delete.png" alt="Submit" width="20" height="20">
		</form>		
	

	
		<form action = "user_edit.php"  method = "post"  >
			<input type = "hidden" name="user_id" value="'.$row['user_id'].'">			
					<input id="opt_btn_edit" type="image" title="edit user information"  name = "user_edit" value = "edit user"
						src="../images/edit.png" alt="Submit" width="20" height="20">
		</form>
				


		<form action = "user_view.php"  method = "post"  >
			<input type = "hidden" name="user_id" value="'.$row['user_id'].'">		
					<input id="opt_btn_view"  type="image" title="view user information" name = "user_view" value = "view user"
						src="../images/view.png" alt="Submit" width="20" height="20">
		</form>	
		
	</td></tr>' ;
 } ?>


</tbody>
</table>




<script src = "../../js_script/jquery-ui.min.js" type = "text/javascript" ></script>