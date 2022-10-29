<?php
	session_start();
	if(!isset($_SESSION['logged'])){
		header("Location:./LoginHtml.php");
	}
	
	?>
<?php
if (isset($_SESSION['source'])) {
	unset($_SESSION['destination']);
	unset($_SESSION['source']);
	unset($_SESSION['Airline']);
	unset($_SESSION['date']);
	unset($_POST['Airline']);
	unset($_POST['source']);
	unset($_POST['destination']);
	unset($_POST['date']);
}
?>

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
 		if (isset($_POST['Airline'])) {
 			$airline=$_POST['Airline'];
 			$source=$_POST['source'];
 			$destination=$_POST['destination'];
 			$date=$_POST['date'];
 			
 			$sql = "Select * from flightdetails where Source='".$source."' and Destination='".$destination."' and Airline='".$airline."' and date='".$date."' limit 1";
 			$result = mysqli_query($con,$sql);
 			if(mysqli_num_rows($result)==1){
 				
 				$_SESSION['logged']="true";
 				$_SESSION['Airline']= $airline;
 				$_SESSION['source']= $source;
 				$_SESSION['destination']=$destination;
 				$_SESSION['date']= $date;
 				

 				header("Location:./ViewTicketsSecond.php");
 			}
 			else{
 				echo'<script> alert("Sorry!! no Flights Available")

 				</script>';
 				echo'<script> location.href="./ViewTickets.php"</script>';

 			}
 		}
 	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Tickets</title>
	<link rel="stylesheet" type="text/css" href="ViewTickets.css">
</head>
<body>
<nav>
        <a href="logout.php">LogOut</a>
        <a href="#" style="background-color: #0aa2c3;">View Booked Tickets</a>
        <a href="AdminPanel.php">Add Flight</a>
		<a class="welcome">Welcome    <?php echo($_SESSION['usrid']); ?></a>	
    </nav>
    <div class="center">
    	<h3>View Tickets</h3>
    	<form method="post" action="#">
    	<ul>
    	<div class="SourceAndDestination">
    		<li>
    	<div>
    		<label>Airline</label>
    		<select name="Airline" class="Airline" required>
    			<option disabled selected value>-Airline-</option>
    			<option value="Buddha">Buddha</option>
 				<option value="Yeti">Yeti</option>
 				<option value="Shree">Shree</option>
 				<option value="Nepal Airlines">Nepal Airlines</option>
    		</select>    	
    	</div></li>
    		<li><div>
    			<label>Source:</label>
    			<select name = "source" required>
			<option  disabled selected value>-Source-</option>
 				<option value="Kathmandu">Kathmandu</option>
 				<option value="Pokhara">Pokhara</option>
 				<option value="Bhairahawa">Bhairahawa</option>
 				<option value="Bharatpur">Bharatpur</option>
 				<option value="Dhangadi">Dhangadi</option>
 			</select>
    		</div></li>
    		<li>
    		<div>
    			<label>Destination:</label>
    			<select name = "destination" required>
			<option  disabled selected value>-Destination-</option>
 				<option value="Kathmandu">Kathmandu</option>
 				<option value="Pokhara">Pokhara</option>
 				<option value="Bhairahawa">Bhairahawa</option>
 				<option value="Bharatpur">Bharatpur</option>
 				<option value="Dhangadi">Dhangadi</option>
 			</select>
    		</div>
    	</li><li>
    	</div>
    	<div class="date">
    		<label>Date:</label>
    		<input type="date" name="date" class="dateinput" id="dateinput" required>
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
    	</div>
    </li><li>
    	<div class="Searchbtn">
    		<input type="submit" name="viewbtn" value="Search" class="viewbtn">

    	</div>
    	</li>
    	</ul>
    </div>

</body>
</html>