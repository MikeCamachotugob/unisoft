
<?php  session_start(); ?>
<?php  include('../connection/connect.php'); ?>
<?php  include('../pages/trans_scanned_prod.php'); ?>
<?php  include('../php_script/trans_choose_company.php'); ?>


<?php
$sql = "SELECT * FROM suppliants WHERE company = '$_SESSION[selected]'";
$rs = mysql_query($sql3);
$data = mysql_fetch_array($rs);
?>



<div id ="purch_info_left">
</br>



	<b>due date:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo date("M d,Y", strtotime($_SESSION['due_date'])); ?></br>
	
	
	<b>company:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo $data['company']?></br>
	
	<b>contact person:</b>&nbsp;
	<?php echo $data['first_name'] ." ". $data['last_name']; ?></br>
	
	<b>email:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo $data['email']?></br>
	
	<b>landline:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo $data['landline']?></br>
	
	<b>fax:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo $data['fax']?></br>



</div>










<?php


$total_price = .00;
$total_items  = 0;

?>





<table id="purch_list" border = "1">
<thead>

<tr bgcolor="#AAAAAA">
	<th>product</th>
	<th>product description</th>
	<th>unit price</th>
	<th>qty</th>
	<th>total</th>
</tr>
</thead>

<tbody>
<tr>
<?php


	$sqllist="select * from purchase_list";
	$purchaselist=mysql_query($sqllist,$con) or die(mysql_error());
	

	
	
		while($list=mysql_fetch_array($purchaselist))
		{	
		
		echo'<tr align="center">'.
			
			
			
			'<form action = "" method = "post">
			<input type = "hidden" name = "scanned" value = "'.$list['prod_barcode'].'">
			<td >'.$list['prod_barcode'].'</td>'.
			'<td >'.$list['prod_desc'].'</td>'.
			'<td >'.$list['prod_price'].'</td>'.
			'<td >'.$list['prod_qty'].'
			<input type="image" id = "edit_btn" src="../images/edit.png" title = "change this value" alt = "submit" ></form></td>'.
			'<td >'.$row_total = $list['prod_qty'] * $list['prod_price'] .'</td>';
?>
</tr>					
<?php		
		$total_items += $list['prod_qty'];
		$total_price += $row_total;
		}
?>


</tbody>
</table>




<div id = "purch_info_right">
</br>
	<form  action ="" method="post">	
		
		<td ><input type="text" name="scanned" size="30" placeholder="enter product code" required autofocus></td>

	</form>
	<b >total items:</b> <?php echo $total_items; ?>
</br>
	<b >total price:</b> <?php echo $total_price; ?>
</br>

</br>
	<form action = "../php_script/trans_save.php" method = "post">

		<input id = "save_btn" type = "submit" name = "trans_btn" onclick = "return confirmation1();" value = "save">
		&nbsp;
		<input id = "cancel_btn1" type = "submit" name = "trans_btn" onclick = "return confirmation2();" value = "cancel">
	
	</form>

</div>



<script>

function confirmation1() {

if(confirm("purchase request will be saved if you click ok.."))
{
   return true;
}else{
	return false;
}

}
</script>

<script>

function confirmation2() {

if(confirm("previous work will not be saved if you click ok.."))
{
   return true;
}else{
	return false;
}

}
</script>


<script>
$(function(){
    $('#due_date').combodate();    
});
</script>