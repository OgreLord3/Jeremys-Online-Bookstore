<!-- Jeremy Gilmore's CSC 242 Session assignment -->
<!-- Use the SQL database and $_SESSION array to add the capability to create accounts, as well as log in and out -->

<?php
  require_once("header.html"); 

  ini_set ('display_errors', 1); // Let me learn from my mistakes!
  error_reporting (E_ALL);
  
  /*Collect the email address supplied by the user
    (must check if an account already exists under it)*/
  $email = $_POST['email'];

  //Connect to the database and search for the given email address 
  $db= new PDO("sqlite:bookstore.db");

  $query = "SELECT Email FROM Customers WHERE Email = ?";
  $result = $db->prepare($query);
  $result->execute([$email]);
  $row = $result->fetch();

  // following is embedded html to create page to give the user feedback
  //if the query found a match, don't add the new account
  if ($row) {
    echo "<h2>An account already exists for that e-mail address!</h2>";
  } // end if

  /*otherwise, collect the rest of the information supplied by the user
    and add the new account to the Customers table*/
  else {
	$username = $_POST['user'];
	$password = $_POST['password'];
	$phone = $_POST['phone'] . $_POST['phone2'] . $_POST['phone3'];
	$newUser = "INSERT INTO Customers (UserName, Email, Passwd, PhoneNumber) VALUES ('$username', '$email', '$password', '$phone')";
	$db->exec($newUser);
	
	echo "<h2>Account created for <em>$username</em> !</h2>";
  }  // end else                             
  
  $db= null;

  require_once("footer.html"); 
?>