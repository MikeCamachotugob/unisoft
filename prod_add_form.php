
<!-- CSS -->
<style>
.myForm {
margin-top:30px;
margin-left:160px;
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.8em;
width: 30em;
padding: 1em;
border: 1px solid #ccc;
}

.myForm * {
box-sizing: border-box;
}

.myForm fieldset {
border: none;
padding: 0;
}

.myForm legend,
.myForm label {
padding: 0;
font-weight: bold;
}

.myForm label.choice {
font-size: 0.9em;
font-weight: normal;
}

.myForm label {
text-align: left;
display: block;
}

.myForm input[type="text"],
.myForm input[type="tel"],
.myForm input[type="email"],
.myForm input[type="date"],
.myForm select,
.myForm textarea {
float: right;
width: 60%;
border: 1px solid #ccc;
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.9em;
padding: 0.3em;
}

.myForm textarea {
height: 100px;
}

.myForm input[type="radio"],
.myForm input[type="checkbox"] {
margin-left: 40%;
}

.myForm button {
padding: 5px;
border-radius: 0.5em;
background: #cccccc;
border: outset;
font-weight: bold;
margin-left: 170px;
margin-top: 1.8em;
}

.myForm button:hover {
background: #777777;
cursor: pointer;
color:white;
}

#back_btn{
color:black;
text-decoration:none;
padding: 3px;
border-radius: 0.5em;
background: #cccccc;
border: outset  #dddddd;
font-weight: bold;
margin-left: 460px;
margin-top: -70px;
position:absolute;
}
#back_btn:hover {
background: #777777;
cursor: pointer;
color:white;
}



</style>



<form class="myForm" method="post" enctype="" action="../php_script/prod_proc_add.php">

<p>
<label>product name
<input type="text" name="prod_name" >
</label> 
</p>


</br>

<p>
<label>product description
<input type="text" name="prod_desc" >
</label> 
</p>



</br>

<p>
<label>product price
<input type="text" name="prod_price" >
</label> 
</p>

</br>

<p>
<label>product barcode
<input type="text" name="prod_barcode" >
</label> 
</p>

</br>

<p><button name = "prod_save" onclick = "return confirmation();" >add product</button></p>

</form>
<a id="back_btn" href = "../pages/prod_page.php" ><b>back</b></a>


<script>

function confirmation() {

if(confirm("this product will be added to the system if you click ok.."))
{
   return true;
}else{
	return false;
}

}
</script>