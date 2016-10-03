<style>

#user_panel{
	background:#fdfdff;
	height:440px;
	width:770px;
	position:absolute;
	overflow:scroll;
	overflow-x:hidden;
	margin-top:30px;
	
}


#user_title{
	
	margin-left:320px;

}
#user_image{

	position:absolute;
	margin-left:20px;
	margin-top:20px;
	
}

#user_barcode{
	
	position:absolute;
	margin-top:20px;

	margin-left:150px;

}

#user_personal_info{
	margin-top:320px;
	position:absolute;
	margin-left:20px;
	width:720px;
	padding-top:10px;
}

#user_login_info{
	margin-top:0px;
	position:absolute;
	margin-left:220px;
	height:320px;
	width:520px;
	padding-top:10px;
}



#user_button{
	
	color:black;
	text-decoration:none;
	background: #ccc;
	display:block;
	width:100px;
	float:left;
	border-radius: 6px;
	text-align:center;
	float:right;
	padding:5px;
	margin-top:-10px;
	margin-right:20px;
	border-style: outset;
	border-color:#dddddd;
	font-weight:bold;

}
#user_button:hover{
	background:#777777;
	cursor: pointer;
	color:white;
}

#change_btn2{
	
	color:black;
	text-decoration:none;
	background: #ccc;
	display:block;
	width:100px;
	border-radius: 6px;
	text-align:center;
	padding:5px;
	margin-top:100px;
	margin-bottom:150px;
	margin-left:20px;
	border-style: outset;
	border-color:#dddddd;
	font-weight:bold;

}
#change_btn2:hover{
	background:#777777;
	cursor: pointer;
	color:white;
}
#change_btn1{
	
	color:black;
	text-decoration:none;
	background: #ccc;
	display:block;
	width:100px;
	border-radius: 6px;
	text-align:center;
	padding:5px;
	margin-top:10px;
	margin-left:0px;
	border-style: outset;
	border-color:#dddddd;
	font-weight:bold;

}
#change_btn1:hover{
	background:#777777;
	cursor: pointer;
	color:white;
}

</style>
<?php
session_start();
include('../connection/connect.php');

	if(isset($_POST['user_edit'])){
			
			if($_SESSION['user_type'] == 'admin'){
			$_SESSION['user_i_view'] = $_POST['user_id'];
			}else{
				
			$_SESSION['user_i_view'] = $_SESSION['user_id'];
			}
			
		$_SESSION['current_page'] = "user_edit";
	}
	if($_SESSION['current_page'] == "user_edit"){
		$_SESSION['current_page'] = "user_edit";
		
	}
	
	if(isset($_GET['ret_page'])){
			
		$_SESSION['current_page'] = "user_page";
		echo "<script>;
		window.location='../pages/user_page.php';
		</script>";
	}	
	
			$sql = "select * from users where user_id = '".$_SESSION['user_i_view']."'";
			$query10 = mysql_query($sql) or die(mysql_error());
			$user_data = mysql_fetch_assoc($query10);
$user_status = 	$user_data['status'];		
?>

<p id = "user_title"><b>edit user information page</b></p>

<a id = "user_button" href = "../pages/user_view.php?ret_page" >back</a>
<div  id = "user_panel" >

</br></br></br>					

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>login information:</b></br>
	<form action = "user_change_image_form.php" method = "post">
		<input type = "hidden" name = "user_id" value = "<?php echo $user_data['user_id']; ?>">
		<input type="image" src = "data:image;base64,<?php echo $user_data['image']; ?>" 
		id = "user_image" alt = "submit" height="160" width="160" title = "change this image?"></br>
	</form>
	


<form action = "../php_script/user_proc_edit.php" method = "post" >
<p id = "user_login_info" >
<input type = "hidden"  name = "user_id"
value = "<?php echo $user_data['user_id']; ?>">
<b>status:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
&nbsp;
<select name = "status">
	<option value = "<?php echo $user_data['user_id']; ?>"><?php echo $user_status; ?></option>
	<option value = "activate">activate</option>
	<option value = "deactivate">deactivate</option>
</select>

</br></br>
<b>id:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
&nbsp;	
<?php echo $user_data['user_id']; ?>

</br></br>

<b>user type:</b>
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $user_data['user_type']; ?>

</br></br>


<b>username:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "text" size = "30" name = "username"
value = "<?php echo $user_data['username']; ?>">

</br></br>

<b>password:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "text" size = "30" name = "password"
value = "<?php echo $user_data['password']; ?>">

</br></br>

<b>confirm password:</b>
&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "text" size = "30" name = "password"
value = "<?php echo $user_data['password']; ?>">

</br></br>

<input id = "change_btn1" type = "submit" name = "change_log_info" value = "update" onclick = "return confirmation1()" >

</br></br>

</p>
</form>





<form action = "../php_script/user_proc_edit.php" method = "post" >
<p id = "user_personal_info" ></br></br>
<b>personal information:</b></br></br>

&nbsp;&nbsp;&nbsp;
<b>first name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type = "text" size = "30" name = "first_name"
	 value = "<?php echo $user_data['first_name']; ?>"></br></br>

&nbsp;&nbsp;&nbsp;
<b>middle name:</b>&nbsp;&nbsp;
	<input type = "text" size = "30" name = "middle_name"
	value = "<?php echo $user_data['middle_name']; ?>"></br></br>

&nbsp;&nbsp;&nbsp;
<b>last name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type = "text" size = "30" name = "last_name"
	value = "<?php echo $user_data['last_name']; ?>"></br></br></br>

&nbsp;&nbsp;&nbsp;
<b>position:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "text" size = "30" name = "position"
value = "<?php echo $user_data['position']; ?>">
</br></br>

&nbsp;&nbsp;&nbsp;
<b>gender:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "text" size = "30" name = "gender"
value = "<?php echo $user_data['gender']; ?>"></br></br>

&nbsp;&nbsp;&nbsp;
<b>birthday:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo date("F d, Y" , strtotime($user_data['birthdate'])); ?></br>

&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "date" size = "30" name = "birthdate"
value = "<?php echo date("F d, Y" , strtotime($user_data['birthdate'])); ?>">

</br></br></br></br>

<b>address:</b></br></br>

&nbsp;&nbsp;&nbsp;
<b>street no:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type = "text" size = "30" name = "street_no"
	value = "<?php echo $user_data['street_no']; ?>" ></br></br>

&nbsp;&nbsp;&nbsp;
<b>street name:</b>&nbsp;&nbsp;&nbsp;
	<input type = "text" size = "30" name = "street_name"
	value = "<?php echo $user_data['street_name']; ?>" ></br></br>

&nbsp;&nbsp;&nbsp;
<b>city:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type = "text" size = "30" name = "city"
	value = "<?php echo $user_data['city']; ?>" >
	
</br></br></br></br>

<b>contact information:</b></br></br>

&nbsp;&nbsp;&nbsp;
<b>email:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "email" size = "30" name = "email"
value = "<?php echo $user_data['email']; ?>" >
</br></br>

&nbsp;&nbsp;&nbsp;
<b>mobile:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "text" size = "30" name = "mobile_no"
value = "<?php echo $user_data['mobile_no']; ?>" >
</br></br>
&nbsp;&nbsp;&nbsp;
<b>landline:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "text" size = "30" name = "landline_no"
value = "<?php echo $user_data['landline_no']; ?>" >
</br></br>

<input type = "hidden" name = "user_id"
value = "<?php echo $user_data['user_id']; ?>" >


<input id = "change_btn2" type = "submit" name = "change_person_info" value = "update" onclick = "return confirmation2()" >
</p>
</form>
</br></br></br></br></br>
</div>
					
					
<script>

function confirmation1() {

if(confirm("changes in the login information in this user will be saved if you click ok.."))
{
	if(confirm("please remember your new username and password before clicking ok.."))
	{ return true; }
		else{ return false; }

}	
else{ return false; }
}
</script>

<script>

function confirmation2() {

if(confirm("changes in the personal information in this user will be saved if you click ok.."))
	{ return true; }
		else{ return false; }

}
</script>
									
					
				
				