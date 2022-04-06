<!DOCTYPE html>
<?php
  // check if session is started, start if not
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
?>

<html>
<head>
   <meta charset="utf-8">
   <title>Online Store</title>
   <title>Dump data using PHP</title>
</head>

<body>
    <h3>
    <a href='index.php'>Back to Home</a>
    </h3>
    Get array:
    <pre>
    <?php
       print_r($_GET);
    ?>
    </pre>

    Post array:
    <pre>
    <?php
       print_r($_POST);
    ?>
    </pre>

    Session array:
    <pre>
    <?php
       print_r($_SESSION);
    ?>
    </pre>
</body>
</html>

