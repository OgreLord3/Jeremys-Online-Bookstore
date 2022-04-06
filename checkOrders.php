<!-- Jeremy Gilmore's CSC 242 Order assignment -->
<!-- Allow the user to check out, adding their order details to the database.
	 Also adds new pages for users to view their orders -->

<?php
	session_start();
	
	ini_set ('display_errors', 1); // Let me learn from my mistakes!
	error_reporting (E_ALL);
	
	$db= new PDO("sqlite:bookstore.db");
	
	require_once("header.html");
	
	//must check if someone is logged in
	if (!isset($_SESSION['customerID'])) {
		echo "<h2>You must be logged in to access your orders!</h2>";
	}
	
	else {
		echo "<h2>{$_SESSION['userName']} - Your Orders</h2>";
	
		//must also check if the user has placed any orders
		$query = "SELECT * from Orders WHERE CustomerID = ?";
		$result = $db->prepare($query);
		$result->execute([$_SESSION['customerID']]);
		$row = $result->fetch();
		if (!$row) { echo "<h2>You have not placed any orders!</h2>"; }
	
		//otherwise, display the user's orders
		else {
			echo "
				<table style = 'width: 70%'>
					<tbody>
						<tr style='font-size: large'>
							<td class = 'center'> <b> <u> Order Number </u> </b> </td>
							<td class = 'center'> <b> <u> Order Date </u> </b> </td>
							<td class = 'right'> <b> <u> Book Total </u> </b> </td>
							<td class = 'right'> <b> <u> Tax </u> </b> </td>
							<td class = 'right'> <b> <u> Grand Total </u> </b> </td>
						</tr>
			"; //end of echo
		
			$aquery = "SELECT OrderID, OrderDate, BookCost, Tax, Total from Orders WHERE CustomerID = ?";
			$aresult = $db->prepare($aquery);
			$aresult->execute([$_SESSION['customerID']]);
			while ($arow = $aresult->fetch(PDO::FETCH_ASSOC)) {
	  
				$orderID = $arow["OrderID"];
				$orderDate = $arow["OrderDate"];
				$bookCost = $arow["BookCost"];
				$tax = $arow["Tax"];
				$total = $arow["Total"];
			
				$bookCostFormatted = number_format($bookCost, 2);
				$taxFormatted = number_format($tax, 2);
				$totalFormatted = number_format($total, 2);
			
				echo "
					<tr style='font-size: large'>
						<td class = 'center'><a href=checkOrderDetails.php?&orderID=$orderID>$orderID</a></td>
						<td class = 'center'> $orderDate </td>
						<td class = 'right'> $$bookCostFormatted </td>
						<td class = 'right'> $$taxFormatted </td>
						<td class = 'right'> $$totalFormatted </td>
					</tr>
				"; // end of echo
			}
		
			echo "
					</tbody>
				</table>
			"; //end of echo
		} //end of else
	}		
	
	$db= null;
	
	require_once("footer.html");
?>