<!DOCTYPE html>

<!-- Jeremy Gilmore's CSC 242 Forms assignment -->
<!-- This PHP file takes the info submitted via the form and prints it out in a legible format -->

<html>
   <head>
     <meta charset="utf-8">
	 <title>J.O.B Submission</title>
   </head>

<body>
   Post array:
   <pre>
     <?php
       print_r($_POST);
     ?>
   </pre>