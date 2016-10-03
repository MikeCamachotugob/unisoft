

<div id = "navigation">

	<ul>
	
		<li><a href = "php_script/logout.php" onclick = "return confirmation();">logout</a></li>

		<li><a href = "php_script/change_page.php?page=prod_page" >products</a></li>
		
		
	<?php if($_SESSION['user_type'] == "employee"){}else{ ?> 
		<li><a href = "php_script/change_page.php?page=user_page"  >user accounts</a></li>
	<?php 	} 	?>
	
	
		<li><a href = "php_script/change_page.php?page=trans_page">transactions</a></li>
		
		<li><a href = "php_script/change_page.php?page=supp_page">suppliants</a></li>
		
		<li><a href = "php_script/change_page.php?page=inv_page">inventory</a></li>
		
		<li><a href = "php_script/change_page.php?page=sales_page">sales</a></li>
	
		<li><a href = "php_script/change_page.php?page=home_page">home</a></li>
		
	
	</ul>

</div> 


<script>

function confirmation() {

if(confirm("you'll be logged out in the system if you click ok.."))
{
   return true;
}else{
	return false;
}

}
</script>