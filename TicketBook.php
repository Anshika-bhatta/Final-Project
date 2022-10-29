<?php
session_start();
  if (isset($_SESSION['usrid'])) {
  unset($_SESSION['usrid']);
  unset($_SESSION['logged']);
  session_destroy();}
?>
<?php
  
  if (isset($_SESSION['source'])) {
    
  
 
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
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Ticket</title>
	<link rel="stylesheet" type="text/css" href="TicketBookCss.css">
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
 		if (isset($_POST['source'])) {
 			$source=$_POST['source'];
 			$destination=$_POST['Destination'];
      $adult=$_POST['adult'];
      $child=$_POST['child'];
      $number=$adult+$child;
 			// $number=$_POST['Number'];
 			$date=$_POST['date'];
      
if($number>0){
 			$sql="Select * from flightdetails where Source='".$source."' and Destination='".$destination."' and Noofpassenger>'".$number."' or Noofpassenger='".$number."' and date='".$date."' limit 1";
 			$check=mysqli_query($con,$sql);
 			if(mysqli_num_rows($check)==1){
 				session_start();
 				$_SESSION['logged']="true";
 				$_SESSION['source']=$source;
 				$_SESSION['destination']=$destination;
 				$_SESSION['number']=$number;
 				$_SESSION['date']=$date;
        $_SESSION['start']= time();
                $_SESSION['expire']=$_SESSION['start']+(5*60);
        
 				header("Location:./FlightAvailable.php");

 			}
 			else{
 				$msg="*No Flights Available";
 			}
 		}
    else{
      $msg="Select Number of Seats";
    }
  }
 	}
 		?>
 
</head>
<body>
	 <nav>
        <a href="home.php">About us</a>
        <a href="contact.php">Contact us</a>
        <a href="LoginHtml.php">Admin login</a>
      <a href="TicketBook.php" style="background-color: #0aa2c3;">Book a ticket</a>
      <a href="Enquiry.php">Enquiry about your ticket</a>
    </nav>
 <div class="center">
 	<h1>Find Flights</h1>
 	<form method="post" action="#">
 		<div class="fromto">
 			<label>From:</label>
 			<select name = "source">
        <option disabled selected value>-Source-</option>
 				<option value="Kathmandu">Kathmandu</option>
 				<option value="Pokhara">Pokhara</option>
 				<option value="Bhairahawa">Bhairahawa</option>
 				<option value="Bharatpur">Bharatpur</option>
 				<option value="Dhangadi">Dhangadi</option>
 			</select>
 			<label>To:</label>
 			<select name="Destination" >
        <option disabled selected value>-Destination-</option>
 				<option value="Kathmandu">Kathmandu</option>
 				<option value="Pokhara">Pokhara</option>
 				<option value="Bhairahawa">Bhairahawa</option>
 				<option value="Bharatpur">Bharatpur</option>
 				<option value="Dhangadi">Dhangadi</option>
 			</select>
 			
 		</div>
 		<div class="Noofpassenger">
 			<label >No. of Passenger:</label>
      <label class="ladult">Adults-</label>
      <input type="number" name="adult" class="adult">
      <label class="lchild">Child-</label>
      <input type="number" name="child" class="child">
      <!-- <input type="number" name="Number" class="traveller" placeholder="Number of passenger" required> -->
 		</div>
 		<div class="Date">
 			<label>Date Of Travel:</label>
 			<input type="date" name="date" class="datepicker" id="datepicker" required>
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
    document.getElementById("datepicker").setAttribute('min',minDate);
    
  </script>
 		
 		<div class="button">
 			<input type="submit" name="find" value="Find Flights">
 		</div>
 		<div class="message">
 			<?php
 				echo($msg);
 			?>
 	</form>
 </div>
</body>
</html>