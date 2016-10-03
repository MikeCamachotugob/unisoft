<?php
include('../connection/connect.php'); 
session_start();


if(isset($_POST['user_id'])){
	
	$_SESSION['user_id'] = $_POST['user_id'];
	
}
	
	
			$sql = "select * from users where user_id = '".$_SESSION['user_id']."'";
			$query10 = mysql_query($sql) or die(mysql_error());
			$useraa = mysql_fetch_assoc($query10);
	
	



 
?>



<style>
	#upload_panel{
		
		height:300px;
		width:400px;
		margin-left:210px;
		margin-top:120px;
		
	}
</style>




<b>update product image</b>
<div id = "upload_panel" >
<form action = "../php_script/user_update_image.php" method = "post"  enctype = "multipart/form-data">

	<input type = "file" name = "image">
	<input type = "submit" name = "submit" value = "update image" >

</form></br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img height = "200px" width = "200px"  src = "data:image;base64,<?php echo $useraa['image']; ?>">

</div>