<!-- Jeremy Gilmore's CSC 242 Cart assignment -->
<!-- Create the capability to fill, view and clear the user's cart -->

<?php
	session_start();
	
	ini_set ('display_errors', 1); // Let me learn from my mistakes!
	error_reporting (E_ALL);
	
	//must check if the $_SESSION array is empty (can't add to a cart if nobody is logged in)
	if (!isset($_SESSION['customerID'])) {
		// following is embedded html to create page to give the user feedback
		require_once("header.html");
		echo "<h2>You must be logged in to access your shopping cart!</h2>";
		require_once("footer.html");
	}
	
	/*otherwise, get the information supplied by the form in bookInfo.php and store it in a set of parallel arrays
	within the $_SESSION array*/
	else {
		$bookID = $_POST['bookID'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];
		$title = $_POST['name'];
		
		//use the quantity and price to calculate the line total
		$lineTotal = $price * $quantity;
		
		//create the four parallel arrays if necessary
		if (!isset($_SESSION['Title'][0])) {
			$_SESSION['Title'] = array();
			$_SESSION['bookID'] = array();
			$_SESSION['qty'] = array();
			$_SESSION['linetotal'] = array();
		}
		
		//push each piece of information to add it to the end of the cooresponding array
		array_push($_SESSION['Title'], $title);
		array_push($_SESSION['bookID'], $bookID);
		array_push($_SESSION['qty'], $quantity);
		array_push($_SESSION['linetotal'], $lineTotal);
		
		/*finally, calculate sales tax and add it to $_SESSION as well
		in order to calculate sales tax, we must iterate through the $_SESSION['linetotal'] array to get a subtotal*/
		$taxrate = 0.06;
		$subtotal = 0;
		for ($i=0; $i<sizeof($_SESSION['linetotal']); $i++) { $subtotal += $_SESSION['linetotal'][$i]; }
		$_SESSION['tax'] = $taxrate * $subtotal;
		
		require_once("showCart.php");
	}
?>