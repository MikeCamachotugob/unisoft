

<?php include('connection/connect.php');?>

<?php 

		$logged_id=$_SESSION['logged_id'];
		$sqlgo="select * from users where user_id='$logged_id'";
		$resultgo=mysql_query($sqlgo) or die ('sql error2');
	
		//display data
		$rowgo=mysql_fetch_assoc($resultgo);
		

?>


<?php 

		$sqlto="select * from log_history where user_id ='$logged_id' order by log_id desc  ";
		$resultto=mysql_query($sqlto) or die ('sql error2');


?>


<style>

#edit_profile{
	
	position:absolute;
	margin-top:46px;
	margin-left:155px;
	
}

</style>

<link href = "css/profile_panel_style.css" rel = "stylesheet" type = "css/text" />
<center><b>user information</b></center>
	<form action = "php_script/change_page.php" method = "post">
		<input type = "hidden" name = "user_id" value = "<?php echo $rowgo['user_id']; ?>">
		<input type="image" src = "images/edit.png"
		id = "edit_profile" alt = "submit" height="15" width="15" title = "edit my profile"></br>
	</form>
<input type="image" id = "profile_image"  height="160" width="160" src = "data:image;base64,<?php echo $rowgo['image']; ?>"> 
<div id = "profile_info" >
<b>name:&nbsp;&nbsp;</b><?php echo $rowgo['first_name'] . " " . $rowgo['last_name'] ?></br>
<b>position:&nbsp;&nbsp;</b><?php echo $rowgo['position']?></br>
<b>user type:&nbsp;&nbsp;</b><?php echo $rowgo['user_type']?></br>
</div>
<center><b>log history</b></center>
<div id = "log_history" >
</br>
</br>


<?php 
while($rowto=mysql_fetch_assoc($resultto)){
?>	
	<b><?php  echo "logged " . $rowto['action']; ?></b></br>
	<b><?php  echo date("M-d-Y l h:i:a" , strtotime($rowto['date'])); ?></b></br></br>
	
<?php	
}
?>

</div>



