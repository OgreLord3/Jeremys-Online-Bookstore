<!-- Jeremy Gilmore's CSC 242 Session assignment -->
<!-- Use the SQL database and $_SESSION array to add the capability to create accounts, as well as log in and out -->

<?php
  session_start();

  require_once("header.html"); 

  ini_set ('display_errors', 1); // Let me learn from my mistakes!
  error_reporting (E_ALL);
  
  /*Collect the login info supplied by the user
    (must check if it is a valid account)*/
  $email = $_POST['email'];
  $password = $_POST['password'];

  //Connect to the database and search for the given account info
  $db= new PDO("sqlite:bookstore.db");

  $query = "SELECT Email, Passwd FROM Customers WHERE Email = ? AND Passwd = ?";
  $result = $db->prepare($query);
  $result->execute([$email, $password]);
  $row = $result->fetch();

  // following is embedded html to create page to give the user feedback
  //if the query did not find a match, give an error message
  if (!$row) {
    echo "<h2>Incorrect account information.</h2>";
  } // end if

  //otherwise, log the user in by storing the customer ID and username in the $_SESSION array
  else {
	//must retrieve these from the database first
	$aquery = "SELECT CustomerID, UserName FROM Customers WHERE Email = ? AND Passwd = ?";
	$aresult = $db->prepare($aquery);
	$aresult->execute([$email, $password]);
	while ($arow = $aresult->fetch(PDO::FETCH_ASSOC)) 
	{
		$_SESSION['customerID'] = $arow["CustomerID"];
		$_SESSION['userName'] = $arow["UserName"];
	}
	
	echo "<h2>Welcome <em>{$_SESSION['userName']}</em> to our Book Store!</h2>";
  }  // end else                             
  
  $db= null;

  require_once("footer.html"); 
?>