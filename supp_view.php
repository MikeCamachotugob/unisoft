<style>

#company_panel{
	background:#fdfdff;
	height:440px;
	width:770px;
	position:absolute;
	overflow:scroll;
	overflow-x:hidden;
	margin-top:30px;
	
}


#company_title{
	
	margin-left:320px;

}

#company_info{
	position:absolute;
	margin-left:20px;
	width:720px;
	padding-top:10px;
}



#back_button{
	
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
#back_button:hover{
	background:#777777;
	cursor: pointer;
	color:white;
}


</style>
<?php
session_start();
include('../connection/connect.php');

	if(isset($_POST['supp_id'])){
			$_SESSION['supp_i_view'] = $_POST['supp_id'];

			
		$_SESSION['current_page'] = "supp_view";
	}
	if($_SESSION['current_page'] == "supp_view"){
		$_SESSION['current_page'] = "supp_view";
		
	}
	
	if(isset($_GET['ret_page'])){
			
		$_SESSION['current_page'] = "supp_page";
		echo "<script>;
		window.location='../pages/supp_page.php';
		</script>";
	}	
	
			$sql = "select * from suppliants where supp_id = '".$_SESSION['supp_i_view']."'";
			$query10 = mysql_query($sql) or die(mysql_error());
			$user_data = mysql_fetch_assoc($query10);
?>

<p id = "company_title"><b>view suppliant information</b></p>

<a id = "back_button" href = "../pages/supp_view.php?ret_page" >back</a>
<div  id = "company_panel" >
					


<p id = "company_info" >
<b>company information:</b></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>suppliant id:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $user_data['supp_id']; ?></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>company name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $user_data['company']; ?></br></br>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>address:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
#<?php echo $user_data['street_no']; ?>&nbsp;&nbsp;
<?php echo $user_data['street_name']; ?>&nbsp;street,&nbsp;&nbsp;
<?php echo $user_data['city']; ?>

</br></br>
</br></br>


<b>company contact information:</b></br></br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>name:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $user_data['first_name'] ." ".$user_data['last_name']; ?></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>position:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $user_data['position']; ?></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>gender:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $user_data['gender']; ?></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;
<b>email:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $user_data['email']; ?></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>mobile:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $user_data['mobile']; ?></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>landline:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $user_data['landline']; ?></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>fax:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $user_data['fax']; ?></br></br>


</br></br>
</p>

</br></br>

</div>
					
					
					
					
				
				