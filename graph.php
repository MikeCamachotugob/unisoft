<style>

#view_graph1{
	float:right;
	overflow-y:hidden;
	overflow-x:scroll;
	width:760px;
	height:470px;
	position:absolute;
}	
#view_graph2{
overflow-y:hidden;
	overflow-x:hidden;
	width:80px;
	height:480px;
	position:absolute;
	z-index:1;
}	
#back_btn{
	border: outset #dddddd;
	text-decoration:none;
	background: #ccc;
	display:block;
	width:100px;
	margin-left:650px;
	margin-top:-20px;
	margin-bottom:10px;
	border-radius: 6px;
	text-align:center;
	padding:3px;
	font-weight:bold;
	color:black;
	}
	#back_btn:hover{
		background:#777777;
		cursor: pointer;
		color:white;
	}

</style>
<b>this graph represents the stock level of unisoft<a id = "back_btn" href = "home_page.php">back</a></b>
<div id = "view_graph1">
<img  src = "../widgets/graph.php" >
</div>
<div id = "view_graph2">
<img  src = "../widgets/graph.php" >
</div>