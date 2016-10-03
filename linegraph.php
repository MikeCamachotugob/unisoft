<?php
include('../connection/connect.php');
include('../graph/phpgraphlib.php');
session_start();
$graph = new PHPGraphLib(960,420);



 $query = "select * , sum(total_price) from transaction ";  
 

			if($_SESSION['display'] == "day"){

			$query .= ''; 
			$query .= $_SESSION['between_dates'];
			$query .= " group by day(date_created) ";
			
			}
			if($_SESSION['display'] == "month"){
				
			$query .= ''; 
			
			$query .= $_SESSION['between_dates'];
			$query .= "  group by month(date_created) ";
			}	 
			if($_SESSION['display'] == "year"){
				
			$query .= ''; 
			
			$query .= $_SESSION['between_dates'];
			$query .= "  group by year(date_created) ";
			}	  


 $query .= " order by date_created asc ";
  $result = mysql_query($query) or die ('sql error2');

  
  while($row = mysql_fetch_assoc($result)){
	  
	//change format if display is month or year  or daily
	 	if($_SESSION['display'] == "month" || $_SESSION['display'] == "day"){	
		   $r = date("M d,Y",strtotime($row['date_created']));
		  }  
	 	if($_SESSION['display'] == "year"){	
		   $r = date("Y",strtotime($row['date_created']));
		  }
	  
	  
	   
	   
	$data[$r]= $row['sum(total_price)'] ;
	}
				
$graph->addData($data);
$graph->setTitleColor('#000000');
$graph->setGridColor('#acac9d');
$graph->setBars(false);
$graph->setLine(true);
$graph->setDataPoints(true);
$graph->setDataPointColor('maroon');
$graph->setDataValues(true);
$graph->setDataValueColor('#313140');

$graph->setBackgroundColor("#dfdfd0");
$graph->setTextColor('#313140');
$graph->setDataCurrency("Php");
$graph->setXValuesHorizontal(true);
$graph->setLineColor('#b3002d');
$graph->setGoalLineColor('red');
$graph->createGraph();
	
?>