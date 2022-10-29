<?php
	session_start();
	if(!isset($_SESSION['logged'])){
		header("Location:./LoginHtml.php");
	}
	else{
		$now = time();
		if ($now > $_SESSION['expire']) {
			echo '<script>alert("Session Expired Please Login Again")</script>';
			echo ' <script>location.href="logout.php"</script>';
		}
		else{
	
	?>

	
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin LoggedIn</title>
	<link rel="stylesheet" type="text/css" href="AdminPanel.css">

<script type="text/javascript">
	var airlineObject = {
		"Buddha":{
			"BAS102":["18"],
			"BMX341":["45"],
			"BYD777":["60"]
		},
		"Yeti":{
			"YAS102":["18"],
			"YMX341":["45"],
			"YYD777":["60"]
		},
		"Shree":{
			"SAS102":["52"],
			"SMX341":["60"],
			"SYD777":["72"]
		},
		"Nepal":{
			"NAS102":["18"],
			"NMX341":["120"],
			"NYD777":["250"]
		}
	}
	window.onload = function(){
		var airlineSel = document.getElementById("airlineselect");
		var FlightSel = document.getElementById("Flightnoinput");
		var SeatSel = document.getElementById("seatinput");
		for(var x in airlineObject){
			airlineSel.options[airlineSel.options.length] = new Option(x,x);
		}
		airlineSel.onchange = function(){
			FlightSel.length = 1;
			SeatSel.length = 1;

			for(var y in airlineObject[this.value]){
				FlightSel.options[FlightSel.options.length] = new Option(y, y);
			}
		}
		FlightSel.onchange = function(){
			SeatSel.length=1;
			var z = airlineObject[airlineSel.value][this.value];
			for(var i =0; i<z.length; i++){
				SeatSel.options[SeatSel.options.length]= new Option(z[i],z[i]);
			}
		}
	}
</script>

	<?php
		$host="localhost";
		$user="root";
		$password="";
		$database="projectlogin";
		$msg="";

		$con=mysqli_connect($host,$user,$password,$database);
		if (!$con) {
			echo "Database connection failed".mysqli_connect_error();
		}
		else{
			if (isset($_POST['airline'])){
			if (!empty($_POST['airline']) && !empty($_POST['airlineno']) &&!empty($_POST['source']) &&!empty($_POST['destination']) &&!empty($_POST['datepicker']) &&!empty($_POST['seatofflights']) &&!empty($_POST['time'])) {
			 	 
				$airline=$_POST['airline'];
				$airlineno=$_POST['airlineno'];
				$source=$_POST['source'];
				$destination=$_POST['destination'];
				$datepicker=$_POST['datepicker'];
				$seatofflights=$_POST['seatofflights'];
				$time=$_POST['time'];
				
				$sql="Insert into flightdetails values('$source','$destination','$seatofflights','$datepicker','$airlineno','$airline','$time')";

				try {
					
					$check=mysqli_query($con,$sql);
				if(!$check){

					throw new Exception("Duplicate Entry", 1);
					
				}
				else{
					
					$msg = "Flight is scheduled!!";
					// echo'<script>location.href="./AdminPanel.php"</script>';
				}

			}
				 catch (Exception $e) {
					
					$msg="Flight is already schedule!!";
				}

			}
		
		}
	}
	?>



</head>

<body>
<nav>
        <a href="logout.php">LogOut</a>
        <a href="ViewTickets.php">View Booked Tickets</a>
        <a href="AdminPanel.php" style="background-color: #0aa2c3;">Add Flight</a>
		<a class="admin">Welcome    <?php echo($_SESSION['usrid']); ?></a>
    </nav>
<div class="center">
	<h1>Add New Flight</h1>
	<form method="post" action="#">
	<div class="airline">
		<label>Airline:</label>
	
 			<select name="airline" id="airlineselect" class="airlineselect" required>
 				<option value="" disabled selected value>Select Airline</option>
 			</select>
	</div>
	<div class="Flightno">
		<label>Flight Number:</label>
			
			<select name="airlineno" class="Flightnoinput" id="Flightnoinput" required>
				<option value="" disabled selected value>Select Flight Number</option>
			</select>
	</div>
	<div class="from">
		<label>Source:</label>
		<select name = "source" required>
			<option disabled selected value >-Source-</option>
 				<option value="Kathmandu">Kathmandu</option>
 				<option value="Pokhara">Pokhara</option>
 				<option value="Bhairahawa">Bhairahawa</option>
 				<option value="Bharatpur">Bharatpur</option>
 				<option value="Dhangadi">Dhangadi</option>
 			</select>
 		</div><div class="to">
	<label>To:</label>
		<select name = "destination" required>
			<option disabled selected value>-Destination-</option>
 				<option value="Kathmandu">Kathmandu</option>
 				<option value="Pokhara">Pokhara</option>
 				<option value="Bhairahawa">Bhairahawa</option>
 				<option value="Bharatpur">Bharatpur</option>
 				<option value="Dhangadi">Dhangadi</option>
 			</select>
	</div>
	<div class="dateoftravel">
		<label>Date:</label>
		<input type="date"  name="datepicker" class="dateinput" id="dateinput" required>
	</div>
	<script type="text/javascript">
		var date = new Date();
		var tdate = date.getDate();
		var month = date.getMonth()+1;
		if (tdate<10) {
			tdate = '0'+tdate;
		}
		if(month<10){
			month='0'+month;  
		}
		var year = date.getUTCFullYear();  
		var minDate = year +"-"+ month +"-"+ tdate;
		document.getElementById("dateinput").setAttribute('min',minDate);
		
	</script>
	<div class="totalseats">
		<label>Total Seats:</label>
		<!-- <input type="number" name="seatofflights" class="seatinput" id="seatinput"  required> -->
		<select name="seatofflights" class="seatinput" id="seatinput"  >
				<option value="" disabled selected value>Select Total Seats</option>
			</select>
		
	</div>
	<div class="time">
		<label>Time:</label>
		<input type="time" name="time" class="timeinput" required>
	</div>
	<div class="btn">
		<input type="submit" name="Addflight" value="Schedule Flight" class="addflight" >
	</div>
	<div class="dltbtn">
		<input type="submit" name="dltflight" value="Delete Flight" class="deleteflight" >
	</div>
	<div class="errormsg">
		<?php
		echo($msg);
		
		?>
	</div>
</div >

	</form>
<?php
	}
	}
?>

</body>
</html>