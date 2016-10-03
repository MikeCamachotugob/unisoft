
<style>
#titlepage{
	
	position:absolute;	
	margin-top:-100px;
}
</style>
<link href = "../css/trans_page_style.css" rel = "stylesheet" type = "css/text" />

<b id = "titlepage">manage transactions</b>

<div id = "sub_navigation" >


<form action = "" method = "post" >
	<b>search:</b> <input type="text" size = "40" name="search_box" value="">
	<input id = "search_btn" type="submit" name="search" value="search">
</form>

<a href = "../php_script/change_page.php?page=trans_chse_company" >new transaction</a>
	
</div>



<?php
include('../connection/connect.php');


$sql = "select * from transaction";

if(isset($_POST['search'])){
	$search = $_POST['search_box'];
	if($search == ""){
		$sql .= " ";
	}else{
	$first_letter = substr($search , 0);
	$sql .= " where company like '$first_letter%' ";
	$sql .= " or handled_by like '$first_letter%' ";
	$sql .= " or status like '$first_letter%' ";
	}
}
$sql .= " where status != 'archived' order by trans_id desc ";
$query = mysql_query($sql) or die(mysql_error());
?>







<table id="trans_list" border = "1" align = "center">

<thead>
<tr  bgcolor="#AAAAAA" align = "center">
	<th width = "120px">status</th>
	<th width = "260px">company</th>
	<th width = "110px">date created</th>
	<th width = "110px">due date</th>
	<th width = "110px">option</th>
</tr>
</thead>


<tbody>

<?php while($row = mysql_fetch_assoc($query)){?>
<tr align = "center" >

	<td width = "120px" ><?php echo $row['status'] ;?></td>
	<td width = "260px"><?php echo $row['company'];?></td>
	<td width = "110px"><?php echo date("M d,y",strtotime($row['date_created']));?></td>
	<td width = "110px"><?php echo $row['date_due'];?></td>
	
<?php	
echo'<td width = "110px">

		<form action = "trans_details_view.php"  method = "post"  >
			<input type = "hidden" name="trans_id" value="'.$row['trans_id'].'">		
					<input id="opt_btn_view" type="image" title="view transaction data" name = "trans_data_view" value = "view transaction data"
						src="../images/view.png" alt="Submit" width="20" height="20">
		</form>		
		
	</td></tr>' ;
	
 } ?>


</tbody>
</table>




<script src = "../../js_script/jquery-ui.min.js" type = "text/javascript" ></script>