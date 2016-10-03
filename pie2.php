<?php   
 /* CAT:Pie charts */
    //include database connection
    include ('../connection/connect.php');
 

 /* pChart library inclusions */
 include("../pChart2.1.4/class/pData.class.php");
 include("../pChart2.1.4/class/pDraw.class.php");
 include("../pChart2.1.4/class/pPie.class.php");
 include("../pChart2.1.4/class/pImage.class.php");

 /* Create and populate the pData object */
 $MyData = new pData();   

 
   
    //query all records from the database
    $query = "select *,sum(prod_qty) from trans_details  group by prod_barcode ";
 
    //execute the query
    $result = mysql_query($query,$con) or die ('sql error2');
 
    //get number of rows returned
    $num_results = mysql_num_rows($result);
 
    if( $num_results > 0){
       while( $row = mysql_fetch_assoc($result) ){
                    
					
                       
                    
 $MyData->addPoints(array($row['sum(prod_qty)']));  
 $MyData->addPoints(array($row['prod_name'] ),"Labels");
	}
	}

 $MyData->setAbscissa("Labels");

 /* Create the pChart object */
 $myPicture = new pImage(300,200,$MyData);
$Settings = array("R"=>225, "G"=>225, "B"=>225);
$myPicture->drawFilledRectangle(0,0,300,300,$Settings);

 /* Create the pPie object */ 
 $PieChart = new pPie($myPicture,$MyData);

 /* Draw a simple pie chart */ 
 $PieChart->draw2DPie(200,100,array( "Border"=>TRUE,"Radius"=>80));

 /* Write the legend */
 $myPicture->setFontProperties(array("FontName"=>"../pChart2.1.4/fonts/pf_arma_five.ttf"));


 /* Write the legend box */ 
 $myPicture->setFontProperties(array("FontSize"=>10,"R"=>0,"G"=>0,"B"=>0));
 $PieChart->drawPieLegend(10,10,array());

 /* Render the picture (choose the best way) */
 $myPicture->autoOutput("../pChart2.1.4/pictures/example.draw2DPie.png");
?>