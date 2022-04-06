<!-- Jeremy Gilmore's CSC 242 Verification assignment -->
<!-- Add verification, using JavaScript, to certain parts of the site -->
	<!-- Jeremy Gilmore's CSC 242 Browse assignment -->
	<!-- Create the Browse section to allow users to browse a SQL database of books -->
	
<!-- all JavaScript code must be contained within the <script> tags -->
<script>
	//checkReq function will prevent the form from being submitted until all requirements are met
	function checkReq()  {
		var msg = "";
		var focusFld = "";
		
		/*validate the book quantity
		There are 3 way the quantity can be invalid: if it is empty...*/
		if (document.getElementById("quantity").value == "") {
			msg = msg + "  Quantity must be filled in.\n";
			if (focusFld == "") focusFld = "quantity";
		} // end first quantity if
		// ...if it is equal to zero...
		else if (document.getElementById("quantity").value == 0) {
			msg = msg + "  Quantity must be greater than zero.\n";
			if (focusFld == "") focusFld = "quantity";
		} // end second quantity if
		// ...or if it is not numeric.
		else if (isNaN(document.getElementById("quantity").value) == true) {
			msg = msg + "  Quantity must be a valid number.\n";
			if (focusFld == "") focusFld = "quantity";
		}// end third quantity if
		
		if (msg == "") return true;
		else { //errors were made
			alert("The following fields are invalid:\n" + msg);            
			document.getElementById(focusFld).focus();
			event.preventDefault();
		}// end else
    }// end checkReq function

    window.addEventListener( "submit", checkReq );
</script>	

<?php
  require_once("header.html"); 

  ini_set ('display_errors', 1); // Let me learn from my mistakes!
  error_reporting (E_ALL);
  
  //Collect the correct book ID
  $bookID = $_GET['bookID'];

  //Connect to the database and grab the correct book
  $db= new PDO("sqlite:bookstore.db");

  $query = "SELECT * from Books WHERE BookID=$bookID";
  $result = $db->query($query);
  
  //grab all the required information from the Books table
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	  $aquery = "SELECT Title, AuthorID, Image, CategoryID, Year, Rating, ISBN, ISBN13, Price from Books WHERE BookID = ?";
	  $aresult = $db->prepare($aquery);
	  $aresult->execute([$bookID]);
	  
	  $bookName = $row["Title"];
	  $AuthorID = $row["AuthorID"];
	  $image = $row["Image"];
	  $categoryID = $row["CategoryID"];
	  $year = $row["Year"];
	  $rating = $row["Rating"];
	  $isbn = $row["ISBN"];
	  $isbn13 = $row["ISBN13"];
	  $price = $row["Price"];
	  
	  //preform another query to get the correct author name from the Authors table
	  $bquery = "SELECT AuthorName from Authors WHERE AuthorID = ?";
	  $bresult = $db->prepare($bquery);
	  $bresult->execute([$AuthorID]);
	  while ($arow = $bresult->fetch(PDO::FETCH_ASSOC)) { $authorName = $arow["AuthorName"]; }
	  
	  //preform a third query to get the correct category name from the Categories table
	  $cquery = "SELECT CategoryName from Categories WHERE CategoryID = ?";
	  $cresult = $db->prepare($cquery);
	  $cresult->execute([$categoryID]);
	  while ($brow = $cresult->fetch(PDO::FETCH_ASSOC)) { $categoryName = $brow["CategoryName"]; }
	  
	  //finally, create a copy of $price with correct number formatting to display on the page
	  $priceFormatted = number_format($price, 2);
  }

  if (!$result) {
     echo "<h2>There are no books matching this selection!</h2>";
  } // end if

  else {
    // following is embedded html to create the book page
    echo "
      <h2>$bookName</h2>
	  <h3><em>by: </em>$authorName</h3>
    "; // end of echo
	
	//create a table within a form in order to hold all the information as well as allow the user to submit the quantity
	echo "
	<form id=\"form\" method=\"post\" action=\"addToCart.php\">
	<input type=\"hidden\" name=\"bookID\" value=\"$bookID\"/>
	<input type=\"hidden\" name=\"name\" value=\"$bookName\"/>
	<input type=\"hidden\" name=\"price\" value=\"$price\">
	<table style = 'width: 40%'>
    <tbody>
	<tr>
		<td rowspan = \"5\"><img src = \"$image\" alt = \"Book Cover\"/></td>
		<td class = \"left\" style='padding-left: 15%'><em>Category: </em></td>
		<td class = \"left\">$categoryName</td>
	</tr>
	<tr>
		<td class = \"left\" style='padding-left: 15%'><em>Year: </em></td>
		<td class = \"left\">$year</td>
	</tr>
	<tr>
		<td class = \"left\" style='padding-left: 15%'><em>Rating: </em></td>
		<td class = \"left\">$rating</td>
	</tr>
	<tr>
		<td class = \"left\" style='padding-left: 15%'><em>ISBN: </em></td>
		<td class = \"left\">$isbn</td>
	</tr>
	<tr>
		<td class = \"left\" style='padding-left: 15%'><em>ISBN13: </em></td>
		<td class = \"left\">$isbn13</td>
	</tr>
	<tr>
		<th class = \"background\"><em>Price</em></th>
		<th class = \"background\"></th>
		<th class = \"background\" style='padding-right: 15%'><em>Quantity</em></th>
	</tr>
	<tr>
		<td>$$priceFormatted</td>
		<td></td>
		<td style='padding-right: 15%'><input name=\"quantity\" id=\"quantity\" type=\"text\" size=\"2\"></td>
	</tr>
	"; // end of echo

    echo "
        </tbody>
      </table>
      <br><input type=\"submit\" value=\"Add to Cart\"><br><br>
	  </form>
    "; // end of echo
  }  // end else                         
  
  $db= null;

  require_once("footer.html"); 
?>