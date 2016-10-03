
<link href="../css/home_style.css" rel="stylesheet" type="css/text">



<style>
#pending_panel th{
	background:grey;


}
#pending_panel {
	margin-top:10px;
    width:375px;
}

#pending_panel thead {
	display: inline-block;
    width:355px;
    height: 20px;
}

#pending_panel tbody {
	margin-top:6px;
	display: inline-block;
    width:355px;
    height: 415px;       /* Just for the demo          */
    overflow-y: auto;    /* Trigger vertical scroll    */
    overflow-x: hidden;  /* Hide the horizontal scroll */
}


#pending_panel thead, tbody { display: block; }


</style>

<?php
include('../connection/connect.php');
include('../graph/phpgraphlib.php');
session_start();
?>

<div id = "notification"  class = "home_window" >
<?php
						  $sql = "select * from transaction where status = 'pending' ";
							$query = mysql_query($sql) or die(mysql_error());
							  $count = mysql_num_rows($query);
								
									
?>

<p><?php echo'you have <b >'.$count.'</b> pending request';?></p>
<table id = "pending_panel"  >
<thead>
	<tr>
		<th width = "100px" >date created</th>
		<th width = "100px">company</th>
		<th width = "100px">date due</th>
		<th width = "50px">option</th>
	</tr>
</thead>
<tbody>
<?php while($rowr = mysql_fetch_array($query)){ ?>

<tr>
	<td width = "100px"><?php echo date("M d Y",strtotime($rowr['date_created'])) ?></td>
	<td width = "100px"><?php echo $rowr['company'] ?></td>
	<td width = "100px"><?php echo date("M d Y",strtotime($rowr['date_due'])) ?></td>
	
	<td width = "50px"><a href = "trans_details_view.php?trans_id=<?php echo $rowr['trans_id']; ?>" >
		<img src = "../images/view.png" height = "20" width = "20" ></a></td>
</tr>


<?php } ?>
</tbody>
</table>

</div>

<div id = "line_graph_sales" class = "home_window" ><a href="../pages/sales_page.php"><img  height = "100%" width = "100%" src = "../widgets/linegraph.php" ></a></div>
<div id = "bar_graph_stock" class = "home_window" ><a href="../pages/graph.php"><img  height = "100%" width = "100%" src = "../widgets/graph.php" ></a></div>

