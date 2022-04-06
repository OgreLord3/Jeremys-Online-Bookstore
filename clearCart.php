<!-- Jeremy Gilmore's CSC 242 Cart assignment -->
<!-- Create the capability to fill, view and clear the user's cart -->

<?php
  session_start();

  require_once("header.html"); 

  ini_set ('display_errors', 1); // Let me learn from my mistakes!
  error_reporting (E_ALL);
  
  //must check if there is information in the $_SESSION array
  if (isset($_SESSION['customerID'])) {
	    //destroy the four $_SESSION arrays used for the cart, as well as the tax (but not customer ID and username)
		unset($_SESSION['Title']);
		unset($_SESSION['bookID']);
		unset($_SESSION['qty']);
		unset($_SESSION['linetotal']);
		unset($_SESSION['tax']);
		// following is embedded html to create page to give the user feedback
		echo "<h2>Shopping cart is now empty!</h2>";
    }

  else { echo "<h2>You must be logged in to access your shopping cart!</h2>"; }  // end else                             
  
  $db= null;

  require_once("footer.html"); 
?>