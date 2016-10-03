
    
    <style>
	

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
	border-radius: 6px;
	text-align:center;
	margin: -20 5 0 5;
	float:right;
	padding:1px;
	font-weight:bold;
	color:black;
	}
	#back_btn:hover{
		background:#777777;
		cursor: pointer;
		color:white;
	}	
	#proceed_btn{
	border: outset #dddddd;
	text-decoration:none;
	background: #ccc;
	display:block;
	width:100px;
	border-radius: 6px;
	text-align:center;
	margin: -50 100 0 5;
	float:right;
	padding:3px;
	font-weight:bold;
	color:black;
	}
	#proceed_btn:hover{
		background:#777777;
		cursor: pointer;
		color:white;
	}

    </style>

<?php 
session_start();
include('../connection/connect.php');
include('../php_script/trans_choose_company.php');

$_SESSION['due_date'] = '';

if(isset($_POST['due_date']) and $_SESSION['selected'] != ''){
	
$_SESSION['due_date'] = $_POST['due_date'];
	$_SESSION['current_page'] = "trans_form_page";
	
echo "<script>;
	window.location='../pages/trans_form_page.php';
	</script>";
	
}elseif(isset($_SESSION['selected'])){
}else{
	
		
echo "<script>;
	alert('please select a company and set the due date before proceeding..');
	</script>";
}



?>

  </br>
<center><b>choose company</b></center></br>
<a href = "trans_page.php" id = "back_btn"  >cancel</a>
    <div class="invoice-box">
            
            
        <table>
					<tr>	
						<form action="" method="post">
								<td><b>choose company:</b></td>
						<td align = "left" >
								<?php	
								echo "<select name='selected' >
								<option value=''> --select-- </option>";
								while ($row = mysql_fetch_assoc($result)) {
								echo "<option value='" . $row['company'] . "'>" . $row['company'] . "</option>";
								} 
								echo "</select>";
								?>
								
								<input id = "select_btn1" type="submit" name="select" value="select">
		
						</form>									
						</td>				
					</tr>
<form action = "" method = "post">   <input id = "proceed_btn" type = "submit" value = "proceed" >         
            <tr><td><b> due date:		</b></td><td> <input type="date" id="due_date"  name="due_date" required><br></td></tr>
	
</form>
			<tr><td><b> company:		</b></td><td> <?php echo $data['company']; ?><br></td></tr>
            <tr><td><b> address:		</b></td><td> <?php echo $data['street_no'] ." ". $data['street_name']." ". $data['city']; ?><br></td></tr>
            <tr><td><b> contact person:	</b></td><td> <?php echo $data['first_name'] ." ". $data['middle_name']." ". $data['last_name']; ?><br></td></tr>
            <tr><td><b> email:			</b></td><td> <?php echo $data['email']; ?><br></td></tr>
            <tr><td><b> mobile:			</b></td><td> <?php echo $data['mobile']; ?><br></td></tr>
            <tr><td><b> landline:		</b></td><td> <?php echo $data['landline']; ?><br></td></tr>
            <tr><td><b> fax:			</b></td><td> <?php echo $data['fax']; ?><br></td></tr>
            
        </table>
    </div>
	
	
	