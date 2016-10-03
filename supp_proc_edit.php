<?php			
session_start();
include('../connection/connect.php');

if(isset($_POST['change_supp_info']))
{
                                 
$supp_id		=	$_POST['supp_id'];

$landline		=	$_POST['landline'];
$fax			=	$_POST['fax'];
$mobile			=	$_POST['mobile'];
$position		=	$_POST['position'];
$email			=	$_POST['email'];
$city			=	$_POST['city'];
$street_name	=	$_POST['street_name'];
$street_no		=	$_POST['street_no'];
$gender			=	$_POST['gender'];
$last_name		=	$_POST['last_name'];
$middle_name	=	$_POST['middle_name'];
$first_name		=	$_POST['first_name'];
$company		=	$_POST['company'];


			
			$query="update suppliants set 
										landline	= '$landline',
										mobile 		= '$mobile',
										fax 		= '$fax',
										position 	= '$position',
										email 		= '$email', 
										city 		= '$city',
										street_name = '$street_name',
										street_no 	= '$street_no',
										gender 		= '$gender',
										last_name 	= '$last_name',
										middle_name = '$middle_name',
										first_name 	= '$first_name'
										where supp_id='$supp_id'"; 
										$result = mysql_query($query) or die (mysql_error());
									
							
		$_SESSION['current_page'] 	= "supp_view";
		$_SESSION['user_i_view']	= $supp_id;
		echo "<script>;
				alert('suppliant information successfully changed...');
					window.location='../pages/supp_view.php';
						</script>";
	
	
}else{
				
			$_SESSION['current_page'] = "supp_page";
				echo "<script>;
					alert('oops.. something went wrong...');
						window.location='../pages/supp_page.php';
							</script>";
		
}
				
			
			

?>