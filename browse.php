<!-- Jeremy Gilmore's CSC 242 Browse assignment -->
<!-- Create the Browse section to allow users to browse a SQL database of books -->

<?php
  require_once("header.html"); 

  ini_set ('display_errors', 1); // Let me learn from my mistakes!
  error_reporting (E_ALL);

  //Connect to the database
  $db= new PDO("sqlite:bookstore.db");

  // Select all categories in database
  $query = "SELECT CategoryID, CategoryName FROM Categories";
  $result = $db->query($query);

  if (!$result) {
     echo "<h2>There are no categories of books in the database!</h2>";
  } // end if

  else {
    // following is embedded html to create book category links
    echo "
      <h2>Browse by Category</h2>
      <table style = 'width: 60%'>
        <tbody>
           <tr style='font-size: x-large;'>
             <td class = 'left' style='padding-left: 15%'><b><em><u>Category</u></em></b></td>
             <td style='text-align: center'><b><em><u>Number of Authors</u></em></b></td>
           </tr>
    "; // end of echo

    while($row = $result->fetch()) {
      $catID= $row['CategoryID'];
      $catName= $row['CategoryName'];

      $tquery = "SELECT distinct AuthorID from Books WHERE CategoryID=$catID";
      $tresult = $db->query($tquery);
      $all = $tresult->fetchall(PDO::FETCH_ASSOC);
      $numAuthors= sizeof($all);
      echo "
        <tr>
        <td class = 'left' style='font-size: large; padding-left: 15%'><a href=showCategory.php?&catID=$catID>$catName</a></td>
        <td style='text-align: center'> <a style='font-size: large'>$numAuthors</a>    
        </td>
        </tr>
      "; // end of echo
    } // end while

    echo "
        </tbody>
      </table>
      <br>
    "; // end of echo
  }  // end else                              
  
  $db= null;

  require_once("footer.html"); 
?>
