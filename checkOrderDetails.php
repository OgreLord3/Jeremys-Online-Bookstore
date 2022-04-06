<!-- Jeremy Gilmore's CSC 242 Order assignment -->
<!-- Allow the user to check out, adding their order details to the database.
	 Also adds new pages for users to view their orders -->

<?php
	session_start();
	
	ini_set ('display_errors', 1); // Let me learn from my mistakes!
	error_reporting (E_ALL);
	
	require_once("header.html");
	
	//Collect the correct order ID
	$orderID = $_GET['orderID'];

	//Connect to the database and grab the correct order details
	$db= new PDO("sqlite:bookstore.db");

	$query = "SELECT * from OrderDetails WHERE OrderID = ?";
	$result = $db->prepare($query);
	$result->execute([$orderID]);
	if (!$result) { echo "<h2>No order exists with that order ID!</h2>"; }
	
	//otherwise, display the order details
	else {
		//first, grab the order date, cost, tax and total from the Orders table
		$aquery = "SELECT OrderDate, BookCost, Tax, Total from Orders WHERE OrderID = ?";
		$aresult = $db->prepare($aquery);
		$aresult->execute([$orderID]);
		$row = $aresult->fetch();
	  
		$orderDate = $row["OrderDate"];
		$bookCost = $row["BookCost"];
		$tax = $row["Tax"];
		$total = $row["Total"];
			
		$bookCostFormatted = number_format($bookCost, 2);
		$taxFormatted = number_format($tax, 2);
		$totalFormatted = number_format($total, 2);
		
		echo "
			<h2>Order Number: $orderID</h2>
			<table style = 'width: 25%'>
				<tbody>
					<tr style = 'font-size: large'>
						<td class = 'left'> <b> Order Date: </b> </td>
						<td class = 'right'> $orderDate </td>
					</tr>
					<tr style = 'font-size: large'>
						<td class = 'left'> <b> Cost: </b> </td>
						<td class = 'right'> $ $bookCostFormatted </td>
					</tr>
					<tr style = 'font-size: large'>
						<td class = 'left'> <b> Tax: </b> </td>
						<td class = 'right'> $ $taxFormatted </td>
					</tr>
					<tr style = 'font-size: large'>
						<td class = 'left'> <b> Total: </b> </td>
						<td class = 'right'> $ $totalFormatted </td>
					</tr>
				</tbody>
			</table>		
		"; //end of echo
		
		echo "
			<table style = 'width: 50%'>
				<tbody>
					<tr style='font-size: large'>
						<td class = 'left'> <b> <u> Title </u> </b> </td>
						<td class = 'right'> <b> <u> ID </u> </b> </td>
						<td class = 'right'> <b> <u> Quantity </u> </b> </td>
						<td class = 'right'> <b> <u> Line Total </u> </b> </td>
					</tr>
		"; //end of echo
		
		while ($arow = $result->fetch(PDO::FETCH_ASSOC)) {
			//grab all the required information from the OrderDetails table
			$bquery = "SELECT BookID, Quantity, LineTotal from OrderDetails WHERE OrderID = ?";
			$bresult = $db->prepare($bquery);
			$bresult->execute([$orderID]);
	  
			$bookID = $arow["BookID"];
			$quantity = $arow["Quantity"];
			$lineTotal = $arow["LineTotal"];
			$lineTotalFormatted = number_format($lineTotal, 2);
			
			//preform another query to get the correct title matching the book ID
			$cquery = "SELECT Title from Books WHERE BookID = ?";
			$cresult = $db->prepare($cquery);
			$cresult->execute([$bookID]);
			while ($brow = $cresult->fetch(PDO::FETCH_ASSOC)) { $title = $brow["Title"]; }
			
			echo "
				<tr style='font-size: large'>
						<td class = 'left'> $title </td>
						<td class = 'right'> $bookID </td>
						<td class = 'right'> $quantity </td>
						<td class = 'right'> $$lineTotalFormatted </td>
				</tr>
			"; // end of echo
		}
		
		echo "
				</tbody>
			</table> <br>	
		"; //end of echo
		
	} //end of else
	
	$db= null;

	require_once("footer.html");
?>