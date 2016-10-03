<?php 

include('../connection/connect.php');

session_start();


if (isset($_POST['user_id'])){
$_SESSION['user_i_view'] = $_POST['user_id'];	
$_SESSION['current_page'] = "user_edit";
echo "<script>;
	window.location='../main.php';
	</script>";

}else{

if ($_SESSION['current_page'] != "trans_form_page"){
	
$_SESSION['selected'] = "";
$query4="DELETE  FROM purchase_list"; 
$rs4=mysql_query($query4,$con) or die (mysql_error());


}else{}








if ( $_GET['page'] == "home_page"){
	
$_SESSION['current_page'] = "home_page";
echo "<script>;
	window.location='../main.php';
	</script>";
}


else if ( "archive_page" == $_GET['page']){
	
$_SESSION['current_page'] = "archive_page";
echo "<script>;
	window.location='../main.php';
	</script>";
}


else if ( "arc_users_page" == $_GET['page']){
	
$_SESSION['current_page'] = "arc_users_page";
echo "<script>;
	window.location='../pages/arc_users_page.php';
	</script>";
}

else if ( "arc_supp_page" == $_GET['page']){
	
$_SESSION['current_page'] = "arc_supp_page";
echo "<script>;
	window.location='../pages/arc_supp_page.php';
	</script>";
}

else if ( "arc_prod_page" == $_GET['page']){
	
$_SESSION['current_page'] = "arc_prod_page";
echo "<script>;
	window.location='../pages/arc_prod_page.php';
	</script>";
}


else if ( "trans_form_page" == $_GET['page']){
	
$_SESSION['current_page'] = "trans_form_page";
echo "<script>;
	window.location='../pages/trans_form_page.php';
	</script>";
}


else if ( "trans_chse_company" == $_GET['page']){
	
$_SESSION['current_page'] = "trans_chse_company";
echo "<script>;
	window.location='../pages/trans_chse_company.php';
	</script>";
}


else if ( "sales_page" == $_GET['page']){
	
$_SESSION['current_page'] = "sales_page";
echo "<script>;
	window.location='../main.php';
	</script>";
}

else if ( "supp_page" == $_GET['page']){
	
$_SESSION['current_page'] = "supp_page";
echo "<script>;
	window.location='../main.php';
	</script>";
}

else if ( "trans_page" == $_GET['page']){
	
$_SESSION['current_page'] = "trans_page";
echo "<script>;
	window.location='../main.php';
	</script>";
}


else if ( "inv_page" == $_GET['page']){
	
$_SESSION['current_page'] = "inv_page";
echo "<script>;
	window.location='../main.php';
	</script>";
}


else if ( "user_page" == $_GET['page']){
	
$_SESSION['current_page'] = "user_page";
echo "<script>;
	window.location='../main.php';
	</script>";
}

else if ( "user_add_form" == $_GET['page']){
	
$_SESSION['current_page'] = "user_add_form";
echo "<script>;
	window.location='../pages/user_add_form.php';
	</script>";
}


else if ( "supp_add_form" == $_GET['page']){
	
$_SESSION['current_page'] = "supp_add_form";
echo "<script>;
	window.location='../pages/supp_add_form.php';
	</script>";
}


else if ( "inv_in_form" == $_GET['page']){
	
$_SESSION['current_page'] = "inv_in_form";
echo "<script>;
	window.location='../pages/inv_in_form.php';
	</script>";
}

else if ( "inv_in_out_record" == $_GET['page']){
	
$_SESSION['current_page'] = "inv_in_out_record";
echo "<script>;
	window.location='../pages/inv_in_out_record.php';
	</script>";
}


else if ( "inv_out_form" == $_GET['page']){
	
$_SESSION['current_page'] = "inv_out_form";
echo "<script>;
	window.location='../pages/inv_out_form.php';
	</script>";
}

//product related

else if ( "prod_page" == $_GET['page']){
	
$_SESSION['current_page'] = "prod_page";
echo "<script>;
	window.location='../main.php';
	</script>";
}


else if ( "prod_add_form" == $_GET['page']){
	
$_SESSION['current_page'] = "prod_add_form";
echo "<script>;
	window.location='../pages/prod_add_form.php';
	</script>";
}


//end 
else{}

}


?>