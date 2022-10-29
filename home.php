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
        <a href="home.php" style="background-color: #0aa2c3;">About us</a>
        <a href="contact.php">Contact us</a>
        <a href="LoginHtml.php">Admin login</a>
      <a href="TicketBook.php">Book a ticket</a>
      <a href="Enquiry.php">Enquiry about your ticket</a>
    </nav>
    <div>
        
<h1><marquee direction="right">Book Your Ticket Now On Avion!!</marquee></h1>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 6</div>
  <img src="aeroplane.jfif" style="width:100%;height: 500px;" >
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 6</div>
  <img src="plane2.jfif" style="width:100%;height: 500px;">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 6</div>
  <img src="plane.jfif" style="width:100%;height: 500px;">
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 6</div>
  <img src="air.jfif" style="width:100%;height: 500px;">
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 6</div>
  <img src="image.jfif" style="width:100%;height: 500px;">
</div>

<div class="mySlides fade">
    <div class="numbertext">6 / 6</div>
    <img src="aircraft.jfif" style="width:100%;height: 500px;">
  </div>
</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span> 
  <span class="dot"></span>
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); 
}
</script>
<section>
  <div class="row">
      <div class="column side">
      <h2>Online Ticket Reservation System</h2>
      <p>An online ticket reservation system is a software that grants probable customers to book and pay for a flight ticket directly through the website.That means all stages of booking from choosing a destination to paying for the reservation, are handled online that naturally reduces the staff workload and defeat double-bookings.<br><br>Ticket system in travel technologyaid an online ticket booking system. Online ticketing system afford search and booking facilities of flights, hotels, transfer, sightseeing, cars, cruises and holiday packages. Ticketing systems capabilities realtime booking of travel deals. Ticketing system system also indicate to travel agency software, which are widely used by global travel management companies.<br><br>The brunt of internet on modern day travel technology has been tremendous. Online booking system, which empowers travel companies/agents to book the services online, has become high achievement business equipment in the last few years.<br><br>Global travel companies have accepted the model of online booking system software, not only to deliver active bookings/services to end users but also settled the great network of B2B agents using the B2B and B2BC models of these online reservations systems.</p>
      <img src="image1.jpg" alt="nature" class="responsive">
      </div>
      <div class="column middle">
         <h2>Benefits of Online Ticket Reservation System</h2>
         <p> <ul>
          <li>24/7 bookings
            <ol>
              One of the benefits of online booking system is that they grant customers to place their booking at a time that is most acceptable for them. Using an online booking system, they can generate their booking at time of day or night, without having to worry if it's within business hours or not. 
            </ol>
              </li>
          <li> Saving money
          <dl>
            <dt>Online booking system can also save business time and money used on admin. A number of develoments can be automated by the software including:</dt>
            <dd>- Checking your availability to avoid double bookings</dd>
            <dd>- Collecting customers information</dd>
            <dd>- Spending out emails to confirm booking</dd>
            <dd>- Updating availability after booking has been made</dd>
          </dl>
      </li>
      <li>Increase profits
        <ol>
          Investing in an online booking system will confirm to offer an excellent return on investment, as not only will it boost you to increase the number of bookings you take, but also grant you to make a higher profit on your assignments.<br>
          The great thing about online booking forms is that they can also be used to sell your products or services, advertising things like add-ons and extras to customers.
        </ol>
      </li>
      </ul></p>
      
     </div>
     <div class="column side">
      <h2>Flight Reservation System</h2>
      <p>Flight Booking System is an exhaustive flight booking quotation system which automates flight booking process to boost book flight online for particular seats available from different flights and increase revenue.<br><br>FlightsLogic is a Travel Software Company globally that develops best flight booking engine for travel companies to automate flight booking process with various flight suppliers integration and instant acceptance to boost and users to search and book airline/flight tickets in worldwide destinations.<br><br>Flight Booking Engine is online booking system that boosts end users to search and book flight tickets online for particular seats from different flights.</p>
     
     </div>
  </div>
</section>
<footer>
  <p>Copyright &copy; 2023 online ticket booking </p>
</footer>
</body>
</html>