
<!-- CSS -->
<style>
.myForm {
margin-top:0px;
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
	
padding: 4px;
border-radius: 0.5em;
background: #cccccc;
font-weight: bold;
margin-right: 160px;
margin-top: 20px;
float:right;
}

.myForm :hover {
background: #777777;
cursor: pointer;
color:white;
}

#back_btn{
color:black;
text-decoration:none;
padding: 3px;
width:80px;
border-radius: 0.5em;
background: #cccccc;
border: outset  #dddddd;
font-weight: bold;
margin-right: 10px;
margin-top: 30px;
float:right;
text-align:center;
}
#back_btn:hover {
background: #777777;
cursor: pointer;
color:white;
}

#wrap{
	margin-top:20px;
	height:400px;
	width:770px;
	overflow:scroll;
	overflow-x:hidden;
	
}
</style>
<center><h3>add suppliant form</h3></center><a id="back_btn" href = "../pages/supp_page.php" >
<b>back</b></a>
<div id = "wrap">


<form class="myForm" method="post" enctype="" action="../php_script/supp_proc_add.php">





</br>

<p>
<label>company name:
<input type="text" name="company" >
</label> 
</p>


</br></br></br>

<p><b>contact person:</b></p>

</br>

<p>
<label>first name
<input type="text" name="first_name" >
</label> 
</p>

<p>
<label>middle name
<input type="text" name="middle_name" >
</label> 
</p>


<p>
<label>last name
<input type="text" name="last_name" >
</label> 
</p>

</br> 

<fieldset>
<legend>gender</legend>
<p><label class="choice"> <input type="radio" name="gender"  value="male"> male </label></p>
<p><label class="choice"> <input type="radio" name="gender"  value="female"> female </label></p>
</fieldset>

</br> 

<p>
<label>position
<input type="text" name="position">
</label>
</p>
</br></br></br></br>

<p><b>company information:</b></p>

</br></br>

<p>
<label>address</br></br>&nbsp;
street number:
<input type="text" name="street_no">
</label>
</p>


<p>
<label>&nbsp;&nbsp;street name: 
<input type="text" name="street_name">
</label>
</p>


<p>
<label>&nbsp;&nbsp;city: 
<input type="text" name="city">
</label>
</p>
</br></br>
<p>
<label>Email 
<input type="email" name="email">
</label>
</p>


</br>

<p>
<label>landline 
<input type="tel" name="landline">
</label>
</p>
<p>
<label>mobile 
<input type="tel" name="mobile">
</label>
</p>

<p>
<label>fax 
<input type="tel" name="fax">
</label>
</p>


</br>



<button name = "user_save" onclick = "return confirmation();">add user</button>

</form>

</br></br></br>
</br>
</div>

<script>

function confirmation() {

if(confirm("this user will be saved in the system if you click ok.."))
{
   return true;
}else{
	return false;
}

}
</script>