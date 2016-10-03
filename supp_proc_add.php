<?php
include('../connection/connect.php');
session_start();

	if(isset($_POST['user_save'])){
		
		
		$company		 = $_POST['company'];
		$first_name		 = $_POST['first_name'];
		$middle_name	 = $_POST['middle_name'];
		$last_name		 = $_POST['last_name'];
		$email 			 = $_POST['email'];
		$landline 		 = $_POST['landline'];
		$fax			 = $_POST['fax'];
		$mobile 		 = $_POST['mobile'];
		$position		 = $_POST['position'];
		$street_no 		 = $_POST['street_no'];
		$street_name 	 = $_POST['street_name'];
		$city			 = $_POST['city'];
		$gender			 = $_POST['gender'];
				
			$query=mysql_query("INSERT INTO suppliants(
							company,
							first_name,
							middle_name,
							last_name,
							email,
							landline,
							fax,
							position,
							street_no,
							street_name,
							city,
							gender,
							status,
							mobile) 
										
					VALUES (
					'$company',
					'$first_name',
					'$middle_name',
					'$last_name',
					'$email',
					'$landline',
					'$fax',
					'$position',
					'$street_no',
					'$street_name',
					'$city',
					'$gender',
					'active',
					'$mobile'
					)") or die(mysql_error());
							
		
							
		mysql_close($con);
		
		$_SESSION['current_page_nav'] = "supp_page";
		
		echo "<script>;
		window.location='../pages/supp_page.php';
		</script>";
				
		
	}else{}

?>