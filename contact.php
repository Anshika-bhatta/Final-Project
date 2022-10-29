<?php
  session_start();
  unset($_SESSION['usrid']);
  unset($_SESSION['logged']);
  session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Ticket Reservation</title>
    <link rel="stylesheet" type="text/css" href="styles1.css">
</head>
<body> 
    <nav>
        <a href="home.php">About us</a>
        <a href="contact.php" style="background-color: #0aa2c3;">Contact us</a>
        <a href="LoginHtml.php">Admin login</a>
      <a href="TicketBook.php">Book a ticket</a>
      <a href="Enquiry.php">Enquiry about your ticket</a>
    </nav>
    
        <p style="font-size: 25px;">CONTACT INFORMATION</p>
     <div class="row grid"><div class="grid-sizer" ></div> <div class="col-md-4 grid-item" style="border: 1px solid #ffffff;margin-bottom:20px;padding-right:20px;" ><div style="background: #f3f3f3;padding:5px 20px 10px;" ><p style="border-bottom: 1px solid rgb(255, 209, 1);  font-weight: bold; line-height: 27px;" >
    
Address
</p> <p style="font-size:14px;padding-top:10px;" >Avion Airlines Corporation Building,Sanepa,Lalitpur,Nepal</p></div></div></div>


<div class="row grid"><div class="grid-sizer" ></div> <div class="col-md-4 grid-item" style="border: 1px solid #ffffff;margin-bottom:20px;padding-right:20px;" ><div style="background: #f3f3f3;padding:5px 20px 10px;" ><p style="border-bottom: 1px solid rgb(255, 209, 1);  font-weight: bold; line-height: 27px;" >
    Emails
</p> <p style="font-size:14px;" ></p><p>girisuraksha90@gmail.com</p><p>anshikabhatt83@gmail.com</p><p>prashantc632@gmail.com</p><p>kcalina09@gmail.com</p></div>
</div>
<div class="row grid"><div class="grid-sizer" ></div> <div class="col-md-4 grid-item" style="border: 1px solid #ffffff;margin-bottom:20px;padding-right:20px;" ><div style="background: #f3f3f3;padding:5px 20px 10px;" ><p style="border-bottom: 1px solid rgb(255, 209, 1);  font-weight: bold; line-height: 27px;" >
    Nepal Airlines Corpporation
</p> <p style="font-size:14px;" ></p><p>info@nac.com.np</p></div>
</div>
<div class="row grid"><div class="grid-sizer" ></div> <div class="col-md-4 grid-item" style="border: 1px solid #ffffff;margin-bottom:20px;padding-right:20px;" ><div style="background: #f3f3f3;padding:5px 20px 10px;" ><p style="border-bottom: 1px solid rgb(255, 209, 1);  font-weight: bold; line-height: 27px;" >
    Buddha Airlines Corporation
</p> <p style="font-size:14px;" ></p>buddhaair@buddhaair.com</div>
</div>
<div class="row grid"><div class="grid-sizer" ></div> <div class="col-md-4 grid-item" style="border: 1px solid #ffffff;margin-bottom:20px;padding-right:20px;" ><div style="background: #f3f3f3;padding:5px 20px 10px;" ><p style="border-bottom: 1px solid rgb(255, 209, 1);  font-weight: bold; line-height: 27px;" >
    Shree Airlines Corporation
</p> <p style="font-size:14px;" ></p>www.shreeairlines.com</div>
</div>
</body>
</html>