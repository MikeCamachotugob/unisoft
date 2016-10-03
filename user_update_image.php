

<?php 
		
session_start();
include('../connection/connect.php');
$supported_image = array(
    'gif',
    'jpg',
    'jpeg',
    'png'
);
	if(isset($_POST['submit'])){
		$ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
		if(in_array($ext, $supported_image) ){
			$image = addslashes($_FILES['image']['tmp_name']);
			$name = addslashes($_FILES['image']['name']);
			$image = file_get_contents($image);
			$image = base64_encode($image);
			saveimage($name,$image);
			
			
		}else{
			
			echo "<script>
					alert('please select an image');
					window.location = '../pages/user_change_image_form.php';
				</script>";
		}
	}
	function saveimage($name,$image){
		
			
			$query="update users set
							image = '$image' , image_name = '$name'
										where user_id='". $_SESSION['user_id'] ."'"; 
										$result1 = mysql_query($query) or die (mysql_error());
			if($result1){
				$_SESSION['current_page'] == "user_page";
				echo "<script>
					alert('image uploaded');
					
					
					window.location = '../pages/user_change_image_form.php';
				</script>";
			}else{
				echo "<script>
					alert('image not uploaded');
					
					
					window.location = '../pages/user_change_image_form.php';
				</script>";
				
			}
		
	}

?>