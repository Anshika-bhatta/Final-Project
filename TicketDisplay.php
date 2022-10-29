<?php
	session_start();
    $Source=$_SESSION['source'];
    $Destination=$_SESSION['destination'];
    $airline=$_SESSION['airline'];
    $id=$_SESSION['FlightNumber'];
    $TicketNumber=$_SESSION['$TicketNumber'];
    $NoofPassenger=$_SESSION['number'];
    $Date=$_SESSION['date'];
    $time=$_SESSION['time'];
    $fullname=$_SESSION['$fullname'];
    $Contact=$_SESSION['$Contact'];
    $Age=$_SESSION['$Age'];
    $Gender=$_SESSION['$Gender'];

    echo '<script>alert("Ticket is Boooked")</script>';
?><!-- <?php
	if (!isset($_SESSION['source'])) {
		unset($_SESSION['source']);
		unset($_SESSION['destination']);
		unset($_SESSION['airline']);
		unset($_SESSION['FlightNumber']);
		unset($_SESSION['$TicketNumber']);
		unset($_SESSION['number']);
		unset($_SESSION['date']);
		unset($_SESSION['time']);
		unset($_SESSION['$fullname']);
		unset($_SESSION['$Contact']);
		unset($_SESSION['$Age']);
		unset($_SESSION['$Gender']);
		session_destroy();
		header("Location:./TicketBook.php");
	}
?> -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ticket Display</title>
	<link rel="stylesheet" type="text/css" href="TicketDisplay.css">
</head>
<body>

<div class="center">
	<div class="head">
	<h4>Ticket</h4>
	<div class="SourceAndDestination">
		<span class="s1"><?php echo $Source; ?></span>
		<p><span class="s2"><?php echo" To ";?></span>
		<span class="s3"><?php echo $Destination; ?></span></p>
	</div>
	<div class="Airline">
		<?php echo $airline; echo " Airlines"; ?>
	</div>
	</div>
	<div class="FlightDetails">
		<div class="TicketNo">
			<label>Ticket Number:</label>
			<input type="text" name="" value="<?php echo $TicketNumber; ?>" readonly>
		</div>
		<div class="FlightnoSeats">
			<div class="Flightno">
				<label>Flight No:</label>
				<input type="text" name="" value="<?php echo $id; ?>" readonly>
			</div>
			<div class="Seats">
				<label>Total Seats:</label>
				<input type="number" name="" value="<?php echo $NoofPassenger; ?>" readonly>
			</div>
		</div>
		<div class="date">
			<label>Date:</label>
			<input type="date" name="" value="<?php echo $Date; ?>" readonly>
		</div>
		<div class="time">
			<label>Time:</label>
			<input type="text" name="" value="<?php echo $time; ?>" readonly>
		</div>
		<div class="passengername">
			<label>Name:</label>
			<input type="text" name="" value="<?php echo $fullname; ?>" readonly>
		</div>
		<div class="contact">
			<label>Contact:</label>
			<input type="text" name="" value="<?php echo $Contact; ?>" readonly>
		</div>
		<div class="Gender">
			<label>Gender:</label>
			<input type="text" name="" value="<?php echo $Age; ?>" readonly>
		</div>
		<div class="Age">
			<label>Age:</label>
			<input type="text" name="" value="<?php echo $Gender; ?>" readonly>
		</div>
		<div class="btn">
			<input type="submit" name="" value="Done" onclick="BookingDone()" class="btn1">
			<script type="text/javascript">
				function BookingDone(){
					location.href="./TicketBook.php"
				}
			</script>
		</div>
	</div>
</div>
</body>
</html>