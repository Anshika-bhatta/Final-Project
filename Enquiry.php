<?php
  session_start();
  unset($_SESSION['usrid']);
  unset($_SESSION['logged']);
  session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Enquiry About Tickets</title>
	<link rel="stylesheet" type="text/css" href="Enquiry.css">
</head>
<body>
	<nav>
        <a href="home.php">About us</a>
        <a href="contact.php">Contact us</a>
        <a href="LoginHtml.php">Admin login</a>
      <a href="TicketBook.php">Book a ticket</a>
      <a href="Enquiry.php" style="background-color:#0aa2c3;">Enquiry about your ticket</a>
    </nav>
 <h1>Coming Soon</h1>
</body>
</html>