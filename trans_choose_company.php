

<?php

//query for company selecting pay attention to row po please lang
$sql = "SELECT * FROM suppliants";
$result = mysql_query($sql);

//gather selected company and distribute to filleds
$sql3 = "SELECT * FROM suppliants ";
//check if the current person selected a suppliant
	if(isset($_POST['select'])){
		$_SESSION['selected'] = $_POST['selected'];	

		$sql3 .= " WHERE company = '$_SESSION[selected]'";
	}if(!isset($_POST['select'])){
		
		if(!empty($_SESSION['selected'])){
		$sql3 .= " WHERE company = '$_SESSION[selected]'";
						
		}else{
		$sql3 .= " WHERE company = '' ";
		}	
	}
	

$rs = mysql_query($sql3);
$data = mysql_fetch_array($rs);

?>	


