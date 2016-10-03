
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
	
padding: 4px;
border-radius: 0.5em;
background: #cccccc;
border: outset;
font-weight: bold;
margin-right: 10px;
margin-top: 30px;
float:right;
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
margin-right: 10px;
margin-top: 30px;
float:right;

}
#back_btn:hover {
background: #777777;
cursor: pointer;
color:white;
}

#wrap{
	margin-top:50px;
	height:460px;
	width:770px;
	overflow:scroll;
	overflow-x:hidden;
	
}
</style>

<div id = "wrap">


<form class="myForm" method="post" enctype="" action="../php_script/user_proc_add.php">

<fieldset>
<legend>user type</legend>
<p><label class="choice"> <input type="radio" name="user_type"  value="admin"> admin </label></p>
<p><label class="choice"> <input type="radio" name="user_type"  value="employee"> employee </label></p>
</fieldset>



</br>
<p>
<label>username
<input type="text" name="username" >
</label> 
</p>


</br>

<p>
<label>password
<input type="text" name="password" >
</label> 
</p>



</br>	
</br>
</br>

<p>
<label>first name
<input type="text" name="fname" >
</label> 
</p>



<p>
<label>middle name
<input type="text" name="mname" >
</label> 
</p>


<p>
<label>last name
<input type="text" name="lname" >
</label> 
</p>

</br>	
</br>
</br>

<p>
<label>street number
<input type="text" name="street_no" >
</label> 
</p>



<p>
<label>street name
<input type="text" name="street_name" >
</label> 
</p>


<p>
<label>city
<input type="text" name="city" >
</label> 
</p>
</br>

<p>
<label>Email 
<input type="email" name="email_address">
</label>
</p>

</br>

<p>
<label>position
<input type="text" name="position">
</label>
</p>

</br>

<p>
<label>Phone 
<input type="tel" name="phone">
</label>
</p>

</br>

<fieldset>
<legend>gender</legend>
<p><label class="choice"> <input type="radio" name="gender"  value="male"> male </label></p>
<p><label class="choice"> <input type="radio" name="gender"  value="female"> female </label></p>
</fieldset>


<p>
<label>birthdate
<input type="date" name="birthdate" >
</label>
</p>
	



<a id="back_btn" href = "../pages/user_page.php" ><b>back</b></a>
<p><button name = "user_save" onclick = "return confirmation();">add user</button></p>

</form>

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