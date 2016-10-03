
<style>

#linegraph{
	
	overflow-y:hidden;
	overflow-x:hidden;
	width:80px;
	height:400px;
	position:absolute;
	margin-top:50px;
	z-index:1;
}
#linegraph1{
	float:right;
	overflow-y:hidden;
	overflow-x:scroll;
	width:760px;
	height:430px;
	position:absolute;
	margin-top:50px;
}
 #search_panel input , #search_panel select{
	
	height:100%;
	width:100%;
	display:block;
}
#search_panel{
	width:760px;
	height:40px;
	position:absolute;
}

</style>
<?php
session_start();

if(isset($_POST['submit'])){
		
		if($_POST['view'] == "day"){
				
				if($_POST['from'] != '' and $_POST['to'] != ''){
				$_SESSION['between_dates'] = "  where date_created between '".$_POST['from']."' and '".$_POST['to']."'";
				}else{ $_SESSION['between_dates'] = ''; }
				
		$_SESSION['display']="day";
		}
		if($_POST['view'] == "month"){
			
				if($_POST['from'] != '' and $_POST['to'] != ''){
				$_SESSION['between_dates'] = "  where date_created between '".$_POST['from']."' and '".$_POST['to']."'";
				}else{ $_SESSION['between_dates'] = ''; }
				
		$_SESSION['display']="month";
		}
		if($_POST['view'] == "year"){
		$_SESSION['display']="year";
		}
		
}	
?>

<b>this graph represent the sales of unisoft</b>
<table id = "search_panel">
<form action="" method="post"><tr><td>
	<select name="view" >
		<option value="day">--select dates--</option>
		<option value="day">daily</option>
		<option value="month">monthly</option>
		<option value="year">yearly</option>
	</select>
</td><td>	

	<input type="date" name="from">

</td><td>	

	<input type="date" name="to">

</td><td>	

	<input type="submit" name="submit" value="display">
</td></tr>
</form>
</table>

<div id = "linegraph">



<img src = "../widgets/linegraph.php">


</div>
<div id = "linegraph1">



<img src = "../widgets/linegraph.php">


</div>