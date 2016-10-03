<?php   
 /* CAT:Barcode */

 /* pChart library inclusions */
 include("../pChart2.1.4/class/pDraw.class.php");
 include("../pChart2.1.4/class/pBarcode128.class.php");
 include("../pChart2.1.4/class/pImage.class.php");

 /* Create the barcode 128 object */
 $Barcode = new pBarcode128("../pChart2.1.4/");



 /* Retrieve the barcode projected size */
 $Settings = array("R"=>0,"G"=>0,"B"=>0,"AreaR"=>255,"AreaG"=>255,"AreaB"=>255,"ShowLegend"=>TRUE,"DrawArea"=>TRUE);
 $Size = $Barcode->getSize($Settings);

 /* Create the pChart object */
 $myPicture = new pImage($Size["Width"],$Size["Height"]);

 /* Set the font to use */
 $myPicture->setFontProperties(array("FontName"=>"../pChart2.1.4/fonts/GeosansLight.ttf","FontSize"=>10));

 /* Render the barcode */
 $Barcode->draw($myPicture,$prod_id,5,10,$Settings);

 /* Render the picture (choose the best way) */
 $myPicture->autoOutput("example.singlebarcode128.png");
?>