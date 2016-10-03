<?php

include("../connection/connect.php");
session_start();

	if(isset($_POST['login'])){
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
			$sql = "select * from users where username = '$username' and status = 'active'";
			$query = mysql_query($sql) or mysql_error();
			$data = mysql_fetch_array($query);
			$row=mysql_num_rows($query);
			
			
			if($row > 0){
				
					if($data['password'] == $password ){
						$_SESSION['user_i_view'] ='';
						$_SESSION['between_dates'] ='';
						$_SESSION['due_date'] = '';
						$_SESSION['display'] ='day';
						$_SESSION['logged_id'] = $data['user_id']; 
						$_SESSION['user_type'] = $data['user_type']; 
						$_SESSION['name'] = $data['first_name'] ." ". $data['last_name']; 
						$_SESSION['current_page'] = "home_page"; 
					
					
					
					
					//---------------------------------------//
					
					
					$date = date("Y-m-d H:i:s");
					$action = "in";
					$user_id = $data['user_id'];
					$query=mysql_query("insert into log_history
					(user_id, date , action) values ('$user_id','$date','$action')") or die(mysql_error());
	
					
					//---------------------------------------//
					
					
						echo "<script>;
						window.location='../main.php'
						alert('login successful');
						</script>";	
						
					}else{
						
						
						echo "<script>;
						window.location='../index.html'
						alert('password incorrect');
						</script>";	
						
					}//check password
			
			}else{
				
				echo "<script>;
						window.location='../index.html'
						alert('no user exist!');
						</script>";	
				
			}
	}else{
		
		echo "<script>;
		window.location='../index.html'
		alert('not working');
		</script>";	
						
	}//end of isset login

?>