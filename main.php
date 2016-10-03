<style>
#archive_btn:hover{

color:black;

}	
	
#archive_btn{
	
	float:right;
	margin-right:10px;
	margin-top:10px;
	color:white;
	diplay:block;

	background:#b973ff;
	text-align:center;
	
}
</style>



<?php
include('connection/connect.php');


session_start();


include('php_script/authenticate.php');
?>

<html>

	<head>
	
		<title>Welcome to unisoft</title>
		
		<!-- line up all page styles below -->
		<link href = "css/index_style.css" rel = "stylesheet" type = "css/text" />
		<link href = "css/main_style.css" rel = "stylesheet" type = "css/text" />
		
		
	
	</head>
	<body>
	
		<a id = "archive_btn" href = "php_script/change_page.php?page=archive_page" ><img src = "images/delete.png" height = "20px" width = "20px" title = "recycle bin" ></a>
	<div id = "wrapper">
	
	<div id = "header"></div><!-- end of header -->
	<div id = "body">
	
	
	<?php //include navigation tabs
	
		include("widgets/navigation.php");  ?>
	
	
	
	<iframe id = "main_content" name = "main_content" scrolling="no" src="pages/<?php echo $_SESSION['current_page']; ?>.php" ></iframe>
	
	
	<div id = "profile_panel">
	
	<?php //include profile panel 
	
		include("widgets/profile_panel.php");  ?>
	
	</div><!-- end of profile panel-->

	
	<div id = "footer"></div><!-- end of footer-->
	
	</div><!-- end of body -->
	
	
	</div><!-- end of  wrapper-->
	
	
	</body>
	

</html>