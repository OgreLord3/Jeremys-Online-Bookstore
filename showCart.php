<!-- Jeremy Gilmore's CSC 242 Cart assignment -->
<!-- Create the capability to fill, view and clear the user's cart -->

<?php
	// check if session is started, start if not
	if (session_status() == PHP_SESSION_NONE) { session_start(); }
	
	ini_set ('display_errors', 1); // Let me learn from my mistakes!
	error_reporting (E_ALL);
	
	require_once("header.html");
	
	// all JavaScript code must be contained within the <script> tags
	echo "
	<script type = \"text/JavaScript\">
	//checkout function will prevent checkout until the user confirms in a popup window
	function checkout(e)  {
		if(!confirm('Are you sure you want to checkout?')) { e.preventDefault(); }
    }

    window.addEventListener( \"submit\", checkout );
	</script>
	";
	
	//must check if someone is logged in
	if (!isset($_SESSION['customerID'])) {
		echo "<h2>You must be logged in to access your shopping cart!</h2>";
	}
	
	//must also check if the cart is empty
	else if (!isset($_SESSION['Title'][0])) {
		echo "<h2>Shopping cart is currently empty!</h2>";
	}
	
	//otherwise, display the user's cart and provide a button to check out
	else {
		echo "<h2>{$_SESSION['userName']} - Your Cart</h2>";
		echo "
			<form id=\"form\" method=\"post\" action=\"checkout.php\">
			<table style = 'width: 60%'>
				<tbody>
					<tr style='font-size: x-large'>
						<td class = 'left'> <b> <u> Title </u> </b> </td>
						<td class = 'right'> <b> <u> Quantity </u> </b> </td>
						<td class = 'right'> <b> <u> Line Total </u> </b> </td>
					</tr>
		"; //end of echo
		
		//now, iterate through the necessary arrays in $_SESSION to display the user's cart
		for ($i=0; $i<sizeof($_SESSION['Title']); $i++) { 
			echo "
					<tr style = 'font-size: large'>
						<td class = 'left'> {$_SESSION['Title'][$i]} </td>
						<td class = 'right'> {$_SESSION['qty'][$i]} </td>
			"; //end of echo
			//create a copy of $SESSION['linetotal'][$i] with correct number formatting to display on the page
			$lineTotalFormatted = number_format($_SESSION['linetotal'][$i], 2);
			echo "
						<td class = 'right'>$lineTotalFormatted </td>
					</tr>
			"; //end of echo
		}
		
		echo "
				</tbody>
			</table> <br>	
		"; //end of echo
		
		//next, display the sub-total, tax, and grand total
		$subtotal = 0;
		for ($i=0; $i<sizeof($_SESSION['linetotal']); $i++) { $subtotal += $_SESSION['linetotal'][$i]; }
		$subtotalFormatted = number_format($subtotal, 2);
		
		$taxFormatted = number_format($_SESSION['tax'], 2);
		
		$grandtotal = $subtotal + $_SESSION['tax'];
		$grandtotalFormatted = number_format($grandtotal, 2);
		
		echo "
			<table style = 'width: 15%'>
				<tbody>
					<tr style = 'font-size: large'>
						<td class = 'left'> <b> Sub-Total: </b> </td>
						<td class = 'right'> $$subtotalFormatted </td>
					</tr>
					<tr style = 'font-size: large'>
						<td class = 'left'> <b> Tax: </b> </td>
						<td class = 'right'> $$taxFormatted </td>
					</tr>
					<tr style = 'font-size: large'>
						<td class = 'left'> <b> Total: </b> </td>
						<td class = 'right'> $$grandtotalFormatted </td>
					</tr>
				</tbody>
			</table>
			<br><input type=\"submit\" value=\"Checkout\"><br><br>
			</form>			
		"; //end of echo
	} //end of else
	
	require_once("footer.html");
?>