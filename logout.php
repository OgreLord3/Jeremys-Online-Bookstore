<!-- Jeremy Gilmore's CSC 242 Session assignment -->
<!-- Use the SQL database and $_SESSION array to add the capability to create accounts, as well as log in and out -->

<?php
  session_start();

  require_once("header.html"); 

  ini_set ('display_errors', 1); // Let me learn from my mistakes!
  error_reporting (E_ALL);
  
  //must check if there is information in the $_SESSION array
  if (isset($_SESSION['customerID'])) {
		session_unset();
		// following is embedded html to create page to give the user feedback
		echo "<h2>You have successfully logged out!</h2>";
    }

  else { echo "<h2>You are not logged in.</h2>"; }  // end else                             
  
  $db= null;

  require_once("footer.html"); 
?>