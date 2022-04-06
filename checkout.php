<!-- Jeremy Gilmore's CSC 242 Order assignment -->
<!-- Allow the user to check out, adding their order details to the database.
	 Also adds new pages for users to view their orders -->

<?php
	require_once("header.html");
	
	session_start();
	
	ini_set ('display_errors', 1); // Let me learn from my mistakes!
	error_reporting (E_ALL);
	
	$db= new PDO("sqlite:bookstore.db");
	
	// required to assign the current date/time to each order
	date_default_timezone_set('America/New_York');
	
	// STEP 1: add a new entry to the Orders table
	// first, gather information about the total, tax and grand total
	$subtotal = 0;
	for ($i=0; $i<sizeof($_SESSION['linetotal']); $i++) { $subtotal += $_SESSION['linetotal'][$i]; }
	$tax = $_SESSION['tax'];	
	$grandtotal = $subtotal + $_SESSION['tax'];
	
	// get the current date/time and customer ID to attach to the order
	$currentdate = date('Y-m-d H:i:s');
	$customerID = $_SESSION['customerID'];
	
	// now create a new entry in the Orders table
	$newOrder = "INSERT INTO Orders (CustomerID, BookCost, Tax, Total, OrderDate) VALUES ('$customerID', '$subtotal', '$tax', '$grandtotal', '$currentdate')";
	$db->exec($newOrder);
	
	// STEP 2: add entries in the OrderDetails table for each item in the cart
	// first, grab the order ID from the entry we just made in Orders
	$query = "SELECT OrderID from Orders WHERE OrderDate = ?";
	$result = $db->prepare($query);
	$result->execute([$currentdate]);
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) { $orderID = $row["OrderID"]; }
	
	// iterate through three of the $_SESSION arrays to grab the relevant information for an item in the cart, then add it to the OrderDetails table
	for ($i=0; $i<sizeof($_SESSION['bookID']); $i++) { 
		$bookID = $_SESSION['bookID'][$i];
		$qty = $_SESSION['qty'][$i];
		$linetotal = $_SESSION['linetotal'][$i];
		
		$newLine = "INSERT INTO OrderDetails (OrderID, BookID, Quantity, LineTotal) VALUES ('$orderID', '$bookID', '$qty', '$linetotal')";
		$db->exec($newLine);
	}
	
	// STEP 3: clear the cart (code copied from clearCart.php)
	// we already checked twice if the user is logged in (in addToCart.php and showCart.php) and once if the cart is empty (in showCart.php), so checking again isn't necessary
	unset($_SESSION['Title']);
	unset($_SESSION['bookID']);
	unset($_SESSION['qty']);
	unset($_SESSION['linetotal']);
	unset($_SESSION['tax']);
	
	// STEP 4: display the order confirmation
	echo "<h2>Order #$orderID Confirmed... <br> ...Thank you for shopping with us!!!</h2>";
	
	$db= null;
	
	require_once("footer.html");
?>