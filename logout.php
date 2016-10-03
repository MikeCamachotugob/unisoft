<?php
include("../connection/connect.php");

session_start();
if(session_destroy()) 
{
	
	
					$date = date("Y-m-d H:i:s");
					$action = "out";
					$user_id = $_SESSION['logged_id'];
					$query=mysql_query("insert into log_history
					(user_id, date , action) values ('$user_id','$date','$action')") or die(mysql_error());
	
						
	
	
header("Location:../index.html"); 
}
?>
