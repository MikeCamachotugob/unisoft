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


#change_btn2{
	
	color:black;
	text-decoration:none;
	background: #ccc;
	display:block;
	width:100px;
	border-radius: 6px;
	text-align:center;
	padding:5px;
	margin-top:10px;
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
</style>
<?php
session_start();
include('../connection/connect.php');

	if(isset($_POST['supp_id'])){
			$_SESSION['supp_i_view'] = $_POST['supp_id'];

			
		$_SESSION['current_page'] = "supp_edit";
	}
	if($_SESSION['current_page'] == "supp_edit"){
		$_SESSION['current_page'] = "supp_edit";
		
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

<p id = "company_title"><b>edit suppliant information</b></p>

<a id = "back_button" href = "../pages/supp_edit.php?ret_page" >back</a>
<div  id = "company_panel" >
					

<form action = "../php_script/supp_proc_edit.php" method = "post" >
<p id = "company_info" >
<b>company information:</b></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>suppliant id:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "" name = "supp_id" value = "<?php echo $user_data['supp_id']; ?>">
</br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>company name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "" name = "company" value = "<?php echo $user_data['company']; ?>">
</br></br>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>address:</b></br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>street number:</b>
&nbsp;
<input type = "" name = "street_no" value = "<?php echo $user_data['street_no']; ?>"></br></br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>street name:</b>
&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "" name = "street_name" value = "<?php echo $user_data['street_name']; ?>"></br></br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>city:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "" name = "city" value = "<?php echo $user_data['city']; ?>">



</br></br>
</br></br>


<b>company contact information:</b></br></br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>contact person:</b></br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
<b>first name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "" name = "first_name" value = "<?php echo $user_data['first_name']; ?>"></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
<b>middle name:</b>&nbsp;&nbsp;&nbsp;
<input type = "" name = "middle_name" value = "<?php echo $user_data['middle_name']; ?>"></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
<b>last name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "" name = "last_name" value = "<?php echo $user_data['last_name']; ?>"></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>position:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "" name = "position" value = "<?php echo $user_data['position']; ?>"></br></br>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>gender:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "" name = "gender" value = "<?php echo $user_data['gender']; ?>"></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;
<b>email:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "" name = "email" value = "<?php echo $user_data['email']; ?>"></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>mobile:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "" name = "mobile" value = "<?php echo $user_data['mobile']; ?>"></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>landline:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "" name = "landline" value = "<?php echo $user_data['landline']; ?>"></br></br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>fax:</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type = "" name = "fax" value = "<?php echo $user_data['fax']; ?>"></br></br>


<input id = "change_btn2" type = "submit" name = "change_supp_info" value = "update" onclick = "return confirmation2()" >

</br></br>
</p>
</form>
</br></br>

</div>
					
					

<script>

function confirmation2() {

if(confirm("changes in the information in this suppliant will be saved if you click ok.."))
	{ return true; }
		else{ return false; }

}
</script>					
					
				
				