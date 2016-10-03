
    
    <style>
	
	#wrap{
		
		overflow-y:scroll;
		height:400px;
	}
    .invoice-box{
        max-width:800px;
        padding:30px;
        font-size:16px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
		
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
   
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td{
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
	
	#back_btn{
	border: outset #dddddd;
	text-decoration:none;
	background: #ccc;
	display:block;
	width:100px;
	float:left;
	border-radius: 6px;
	text-align:center;
	margin: -40 5 0 5;
	float:right;
	padding:3px;
	font-weight:bold;
	color:black;
	}
	#back_btn:hover{
		background:#777777;
		cursor: pointer;
		color:white;
	}
	
	
	#accept_btn{
	border: outset #dddddd;
	text-decoration:none;
	background: #ccc;
	display:block;
	width:100px;
	position:absolute;
	margin-left:390px;
	margin-top:-40px;
	border-radius: 6px;
	text-align:center;
	padding:3px;
	font-weight:bold;
	color:black;
	}
	#accept_btn:hover{
		background:#777777;
		cursor: pointer;
		color:white;
	}
	#reject_btn{
	border: outset #dddddd;
	text-decoration:none;
	background: #ccc;
	display:block;
	width:100px;
	position:absolute;
	margin-left:520;
	margin-top:-40px;
	border-radius: 6px;
	text-align:center;
	padding:3px;
	font-weight:bold;
	color:black;
	}
	#reject_btn:hover{
		background:#777777;
		cursor: pointer;
		color:white;
	}


    </style>

<?php 
session_start();
include('../connection/connect.php');

if(isset($_GET['trans_id'])){
	
	$trans_id = $_GET['trans_id'];

}
if(isset($_POST['trans_id'])){
	
	$trans_id = $_POST['trans_id'];

}
	
	//query for transaction number
	$sql = "select * from transaction where trans_id = '$trans_id'";
	$query = mysql_query($sql) or die(mysql_error());
	$trans_data = mysql_fetch_assoc($query);

	//query for transaction details
	$sqls = "select * from trans_details where trans_id = '$trans_id'";
	$querys = mysql_query($sqls) or die(mysql_error());
	

	
	//query for company details
	$sqld = "select * from suppliants where company = '".$trans_data['company']."'";
	$queryd = mysql_query($sqld) or die(mysql_error());
	$trans_datad = mysql_fetch_assoc($queryd);


?>

  
<center><b>transaction details</b></center></br></br></br>
<?php	if($_SESSION['user_type'] == 'admin' and $trans_data['status'] != "success" and $trans_data['status'] != "rejected"){ ?>					
	<a href = "../php_script/trans_proc_admin_accept.php?action=accept&trans_id=<?php echo $trans_data['trans_id']; ?>" 
id = "accept_btn"  >accept</a>
	<a href = "../php_script/trans_proc_admin_accept.php?action=reject&trans_id=<?php echo $trans_data['trans_id']; ?>" 
id = "reject_btn"  >reject</a>

<?php	}else{} ?>


<a href = "trans_page.php" id = "back_btn"  >back</a>
<div id = "wrap">
    <div class="invoice-box">
            
            
								<b>date created:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php echo date("M d Y",strtotime($trans_data['date_created'])); ?><br>
								<b>date due:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php echo date("M d Y",strtotime($trans_data['date_due'])); ?><br></br>
                              	<b>company:</b>&nbsp;&nbsp;&nbsp;
								<?php echo $trans_datad['company']; ?><br>
								<b>address:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php echo $trans_datad['street_no'] ." ". $trans_datad['street_name']." ". $trans_datad['city']; ?><br>
                              	<b>email:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php echo $trans_datad['email']; ?><br>
                              	<b>mobile:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php echo $trans_datad['mobile']; ?><br>
                              	<b>landline:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php echo $trans_datad['landline']; ?><br>
                              	<b>fax:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php echo $trans_datad['fax']; ?><br>
								
                           
                            </br>
                            </br>
                            </br>
        <table  cellpadding="0" cellspacing="0">
            
            <tr class="heading" >
                <td>
                    product name
                </td> 
				
				<td>
                   description
                </td>
                
                <td>
                    quantity
                </td><td>
                    Price
                </td><td>
                    total
                </td>
            </tr>
            
<?php     
$total = .00;
		while($trans_datas = mysql_fetch_assoc($querys)){
?>		  <tr class="item">
                <td>
                    	<?php echo $trans_datas['prod_name']; ?>
                </td>
				<td>
                    	<?php echo $trans_datas['prod_desc']; ?>
                </td>
                
                <td>
                    	<?php echo $trans_datas['prod_qty']; ?>
                </td>
				<td>
                    	<?php echo $trans_datas['prod_price']; ?>
                </td>
				
                <td>
                    	<?php echo $subtotal = $trans_datas['prod_qty'] + $trans_datas['prod_price']; ?>
                </td>
            </tr>
<?php
$total += $subtotal;
}           
?>         
           
            
            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
                <td>
                   Total: <?php echo $total; ?>
                </td>
            </tr>   
  
        </table>
    </div>

</div>
