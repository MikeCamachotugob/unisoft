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
	border-top:2px solid #794cff;
	margin-top:180px;
	position:absolute;
	margin-left:20px;
	width:720px;
	padding-top:10px;
}

#user_login_info{
	margin-top:0px;
	position:absolute;
	margin-left:220px;
	width:320px;
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


</style>
<?php
session_start();
include('../connection/connect.php');

	if(isset($_POST['user_view'])){
			$_SESSION['user_i_view'] = $_POST['user_id'];

			
		$_SESSION['current_page'] = "user_view";
	}
	if($_SESSION['current_page'] == "user_view"){
		$_SESSION['current_page'] = "user_view";
		
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
?>

<p id = "user_title"><b>view user information</b></p>

<a id = "user_button" href = "../pages/user_view.php?ret_page" >back</a>
<div  id = "user_panel" >
					
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>login information:</b></br>
<input type="image" id = "user_image"  height="160" width="160" src = "data:image;base64,<?php echo $user_data['image']; ?>"> </br>



<p id = "user_login_info" >
<b>status:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		

<?php echo $user_data['status']; ?></br>
<b>id:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
<?php echo $_SESSION['user_i_view']; ?></br></br>

<b>user type:</b>
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $user_data['user_type']; ?></br></br>


<b>username:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $user_data['username']; ?></br></br>

<b>password:</b>
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;
<?php echo $user_data['password']; ?></br></br>

</p>




<p id = "user_personal_info" >
<b>personal information:</b></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>name:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $user_data['first_name'] ." ". $user_data['last_name']?></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>position:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $user_data['position']; ?></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>gender:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $user_data['gender']; ?></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>birthday:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo date("F d, Y" , strtotime($user_data['birthdate'])); ?></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>address:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
#<?php echo $user_data['street_no']; ?>&nbsp;&nbsp;
<?php echo $user_data['street_name']; ?>&nbsp;street,&nbsp;&nbsp;
<?php echo $user_data['city']; ?></br></br>

<b>contact information:</b></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;
<b>email:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $user_data['email']; ?></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>mobile:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user_data['mobile_no']; ?></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>landline:</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user_data['landline_no']; ?></br></br>

</br></br>
</p>

</br></br>

</div>
					
					
					
					
				
				