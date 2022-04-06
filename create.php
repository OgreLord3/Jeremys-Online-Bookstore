<!-- Jeremy Gilmore's CSC 242 Verification assignment -->
<!-- Add verification, using JavaScript, to certain parts of the site -->
	<!-- Jeremy Gilmore's CSC 242 Site assignment -->
	<!-- Recreate the previous Forms assignment in PHP form using common header and footer files -->

<?php require_once("header.html"); ?>

<!-- all JavaScript code must be contained within the <script> tags -->
<script type = "text/JavaScript">
	// checkReq function will prevent the form from being submitted until all requirements are met
	function checkReq()  {
		var msg = "";
		var focusFld = "";
		//the two arrays are used to store the email address after it is split later
		var myArr = new Array("", "");
		var myArr2 = new Array("", "");
		myArr = document.getElementById("email").value.split("@",2);
		var myStr = myArr[1];
		//myArr2 = myStr.split(".",2);
		
		// validate the username (field must not be empty)
		if (document.getElementById("user").value == "") {
			msg = msg + "  You must enter a username.\n";
			if (focusFld == "") focusFld = "user";
		} // end if
		
		// validate the email address (must be properly formatted as username@domain.___)
		// field is empty
		if (document.getElementById("email").value == "") {
			msg = msg + "  You must enter an email address.\n";
			if (focusFld == "") focusFld = "email";
		} // end if
		// email does not contain @;
		else if (document.getElementById("email").value.indexOf("@") == -1)  {
			msg = msg + "  Email address is missing @ symbol.\n";
			if (focusFld == "") focusFld = "email";
		} // end if
		else if (myArr[0] == "")  {
			msg = msg + "  Email address does not have username before @ symbol.\n";
			if (focusFld == "") focusFld = "email";
		} // end if
		else if (myArr[1].indexOf(".") == -1)  {
			msg = msg + "  Email address does not have period after @ symbol.\n";
			if (focusFld == "") focusFld = "email";
		}  // end if
		// email does not have domain name
		/*if (myArr2[0] == "")  {
			msg = msg + "  Email address does not have domain name after @ symbol.\n";
			if (focusFld == "") focusFld = "email";
		} // end if
		if (myArr2[1] == "")  {
			msg = msg + "  Email address does not have domain name after period.\n";
			if (focusFld == "") focusFld = "email";
		} // end if*/
		// the two values in "Email" and "Confirm Email" must match
		if (document.getElementById("email").value != document.getElementById("email2").value) {
			msg = msg + "  \"E-mail Address\" and \"Confirm E-mail Address\" do not match.\n";
			if (focusFld == "") focusFld = "email";
		} // end if
		
		// validate the password (must be at least 5 characters)
		if (document.getElementById("password").value == "") {
			msg = msg + "  You must enter a password.\n";
			if (focusFld == "") focusFld = "password";
		} // end if
		else if (document.getElementById("password").value.length < 5) {
			msg = msg + "  Password must be at least 5 characters.\n";
			if (focusFld == "") focusFld = "password";
		}  // end if
		// the two values in "Password" and "Confirm Password" must match
		else if (document.getElementById("password").value != document.getElementById("password2").value) {
			msg = msg + "  \"Password\" and \"Confirm Password\" do not match.\n";
			if (focusFld == "") focusFld = "password";
		} // end if
		
		// validate phone number (each section must only be a certain amount of numbers)
		if (isNaN(document.getElementById("phone").value) == true) {
			msg = msg + "  Phone Number (section 1) must only contain numbers.\n";
			if (focusFld == "") focusFld = "phone";
		}  // end if
		// first section must be only 3 digits long
		else if (document.getElementById("phone").value != "" && document.getElementById("phone").value.length != 3) {
			msg = msg + "  Phone Number (section 1) must be 3 digits.\n";
			if (focusFld == "") focusFld = "phone";
		}  // end if
		else if (isNaN(document.getElementById("phone2").value) == true) {
			msg = msg + "  Phone Number (section 2) must only contain numbers.\n";
			if (focusFld == "") focusFld = "phone2";
		}  // end if
		// second section must be only 3 digits long
		else if (document.getElementById("phone2").value != "" && document.getElementById("phone2").value.length != 3) {
			msg = msg + "  Phone Number (section 2) must be 3 digits.\n";
			if (focusFld == "") focusFld = "phone2";
		}  // end if
		else if (isNaN(document.getElementById("phone3").value) == true) {
			msg = msg + "  Phone Number (section 3) must only contain numbers.\n";
			if (focusFld == "") focusFld = "phone3";
		}  // end if
		// third section must be only 4 digits long
		else if (document.getElementById("phone3").value != "" && document.getElementById("phone3").value.length != 4) {
			msg = msg + "  Phone Number (section 3) must be 4 digits.\n";
			if (focusFld == "") focusFld = "phone3";
		}  // end if
		
		if (msg == "") return true;
		else { // errors were made
			alert("The following fields are invalid:\n" + msg);            
			document.getElementById(focusFld).focus();
			event.preventDefault();
		}// end else
    }// end checkReq function

	// clearForm function will prevent the form from being reset until the user confirms in a popup window
	function clearForm(e)  {
		if(!confirm('Are you sure you want to clear the form?')) { e.preventDefault(); }
    }

	window.addEventListener( "submit", checkReq );
    window.addEventListener( "reset", clearForm );
</script>

<h2> Create Account </h2>
<form method = "post" action = "addAccount.php">
<table style = "width: 30%">
<tbody>
	<tr>
		<td class = "left">
			<label for = "user"> <span class = "red"> User Name: </span> </label>
		</td>
		<td> <input name = "user" id = "user" type = "text" size = "25"> </td>
	</tr>
	<tr>
		<td class = "left">
			<label for = "email"> <span class = "red"> E-mail Address: </span> </label>
		</td>
		<td> <input name = "email" id = "email" type = "text" size = "25"> </td>
	</tr>
	<tr>
		<td class = "left">
			<label for = "email2"> <span class = "red"> Confirm E-mail Address: </span> </label>
		</td>
		<td> <input name = "email2" id = "email2" type = "text" size = "25"> </td>
	</tr>
	<tr>
		<td colspan = "2" class = "left">
			<p> Select a password (minimum of 5 characters): </p>
		</td>
	</tr>
	<tr>
		<td class = "left">
			<label for = "password"> <span class = "red"> Password: </span> </label>
		</td>
		<td> <input name = "password" id = "password" type = "password" size = "25"> </td>
	</tr>
	<tr>
		<td class = "left">
			<label for = "password2"> <span class = "red"> Confirm Password: </span> </label>
		</td>
		<td> <input name = "password2" id = "password2" type = "password" size = "25"> </td>
	</tr>
	<tr>
		<td class = "left">
			<label for = "phone"> Phone: </label>
		</td>
		<td> <input name = "phone" id = "phone" type = "text" size = "3"> <input name = "phone2" id = "phone2" type = "text" size = "3"> <input name = "phone3" id = "phone3" type = "text" size = "4"> </td>
	</tr>
</tbody>
<tfoot>
	<tr>
		<td colspan=2>
			<input name = "submit1" type = "submit" value = "Create Account">
			<input name = "submit2" type = "reset" value = "Reset Form">
		</td>
	</tr>
</tfoot>
</table>
</form>	
<em> (Fields in <span class = "red"> red </span> are required) </em>

<?php require_once("footer.html"); ?>