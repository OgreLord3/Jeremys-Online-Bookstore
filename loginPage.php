<!-- Jeremy Gilmore's CSC 242 Verification assignment -->
<!-- Add verification, using JavaScript, to certain parts of the site -->
	<!-- Jeremy Gilmore's CSC 242 Site assignment -->
	<!-- Recreate the previous Forms assignment in PHP form using common header and footer files -->

<?php require_once("header.html"); ?>

<!-- all JavaScript code must be contained within the <script> tags -->
<script>
	//clearForm function will prevent the form from being reset until the user confirms in a popup window
	function clearForm(e)  {
		if(!confirm('Are you sure you want to clear the form?')) { e.preventDefault(); }
    }

    window.addEventListener( "reset", clearForm );
</script>

<h2> Login </h2>
<form method = "post" action = "login.php">
<table style = "width: 30%">
<tbody>
	<tr>
		<td class = "left">
			<label for = "email"> <span class = "red"> E-mail Address: </span> </label>
		</td>
		<td> <input name = "email" id = "email" type = "text" size = "25"> </td>
	</tr>
	<tr>
		<td class = "left">
			<label for = "password"> <span class = "red"> Password: </span> </label>
		</td>
		<td> <input name = "password" id = "password" type = "password" size = "25"> </td>
	</tr>
</tbody>
<tfoot>
	<tr>
		<td colspan=2>
			<input name = "submit1" type = "submit" value = "Login">
			<input name = "submit2" type = "reset" value = "Reset Form">
		</td>
	</tr>
</tfoot>
</table>
</form>	
<em> (Fields in <span class = "red"> red </span> are required) </em>

<?php require_once("footer.html"); ?>