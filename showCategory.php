<!-- Jeremy Gilmore's CSC 242 Browse assignment -->
<!-- Create the Browse section to allow users to browse a SQL database of books -->

<?php
  require_once("header.html"); 

  ini_set ('display_errors', 1); // Let me learn from my mistakes!
  error_reporting (E_ALL);
  
  //Collect the correct category ID
  $catID = $_GET['catID'];

  //Connect to the database and grab the correct category name plus all books in it
  $db= new PDO("sqlite:bookstore.db");

  $query = "SELECT * from Books WHERE CategoryID=$catID";
  $result = $db->query($query);
  
  $aquery = "SELECT CategoryName from Categories WHERE CategoryID=$catID";
  $aresult = $db->query($aquery);
  while ($row = $aresult->fetch(PDO::FETCH_ASSOC)) { $catName = $row["CategoryName"]; }

  if (!$result) {
     echo "<h2>There are no books matching this category!</h2>";
  } // end if

  else {
    // following is embedded html to create book links
    echo "
      <h2>Category: $catName</h2>
      <table style = 'width: 60%'>
        <tbody>
           <tr style='font-size: x-large;'>
             <td class = 'left' style='padding-left: 15%'><b><em><u>Title</u></em></b></td>
             <td class = 'left'><b><em><u>Author</u></em></b></td>
           </tr>
    "; // end of echo
	
	//grab information for all books in the desired category (bookID needs to be passed to bookInfo.php)
	while($arow = $result->fetch(PDO::FETCH_ASSOC)) {
		$bquery = "SELECT BookID, AuthorID, Title from Books WHERE CategoryID = ?";
		$bresult = $db->prepare($bquery);
		$bresult->execute([$catID]);
		
		$bookID = $arow["BookID"];
		$AuthorID = $arow["AuthorID"];
		$bookName = $arow["Title"];
		
		//do another query to grab the author name matching the correct author ID
		$cquery = "SELECT AuthorName from Authors WHERE AuthorID = ?";
		$cresult = $db->prepare($cquery);
		$cresult->execute([$AuthorID]);
		
		while ($brow = $cresult->fetch(PDO::FETCH_ASSOC)) { $authorName = $brow["AuthorName"]; }
			
		echo "
		<tr>
		<td class = 'left' style='font-size: large; padding-left: 15%'><a href=bookInfo.php?&bookID=$bookID>$bookName</a></td>
		<td class = 'left'> <a style='font-size: large'>$authorName</a></td>
        </tr>
	    "; // end of echo
	}

    echo "
        </tbody>
      </table>
      <br>
    "; // end of echo
  }  // end else                         
  
  $db= null;

  require_once("footer.html"); 
?>