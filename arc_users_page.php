<style>
#titlepage{
	
	position:absolute;	
	margin-top:-120px;
}
</style>


<link href = "../css/arc_user_style.css" rel = "stylesheet" type = "css/text" />

<b id = "titlepage">manage deleted users</b>

<div id = "sub_navigation" >

</br></br>

<form action = "" method = "post" >
	<b>search name:</b> <input type="text" size = "40" name="search_box" value="">
	<input id = "search_btn" type="submit" name="search" value="search">
</form>

<a href = "archive_page.php" >back</a>
	
</div>



<?php
include('../connection/connect.php');


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
$sql .= " status = 'archived' order by user_id desc ";
$query = mysql_query($sql) or die(mysql_error());
?>







<table id="user_list" border = "1">

<thead>
<tr  bgcolor="#AAAAAA">
	<th width = "280px" >name</th>
	<th width = "280px" >position</th>
	<th id="opt">user type</th>
	<th id="opt">option</th>
</tr>
</thead>


<tbody>

<?php while($row = mysql_fetch_assoc($query)){?>
<tr>
	<td width = "280px" align = "center"><?php echo $row['first_name'] .' '. $row['last_name'];?></td>
	<td width = "280px" align = "center"><?php echo $row['position'];?></td>
	<td id="opt" align = "center"><?php echo $row['user_type'];?></td>
	

<td id="opt" align = "center">

	<a href = "../php_script/restore_users.php?user_id=<?php echo $row['user_id']?>" onclick = "return confirmation();"  >restore</a>

		
	</td></tr>
<?php } ?>


</tbody>
</table>


<script>

function confirmation() {

if(confirm("are you sure you want to restore this user?"))
	{ return true; }
		else{ return false; }

}
</script>
									
				

<script src = "../../js_script/jquery-ui.min.js" type = "text/javascript" ></script>