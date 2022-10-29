<?php
session_start();
if ($_GET['TicketNumber']) {
	$TicketNumber = $_GET['TicketNumber'];
	$source=$_SESSION['source'];
        $destination=$_SESSION['destination'];
        $airline=$_SESSION['Airline'];
        $date=$_SESSION['date'];

	$host="localhost";
    $user="root";
    $password="";
    $database="projectlogin";
    $msg="";

    $con=mysqli_connect($host,$user,$password,$database);
    if (!$con) {
        echo "Database connection failed".mysqli_connect_error();
    }
    $sql= "Select TotalBookedSeat,FlightNumber,Time from passengerdetails where TicketNumber='".$TicketNumber."' ";
    $result = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($result)){
    	$Seats= $row['TotalBookedSeat'];
    	$FlightNumber= $row['FlightNumber'];
    	$Time= $row['Time'];
    	
    }
    
    $query="Update flightdetails set Noofpassenger=Noofpassenger+$Seats where Source='".$source."' and Destination='".$destination."' and Airline='".$airline."' and Date='".$date."' and Time ='".$Time."' and FlightNumber='".$FlightNumber."' ";
    $syntax="Delete from passengerdetails where TicketNumber='$TicketNumber'";
    $run=mysqli_query($con,$query);
    $play=mysqli_query($con,$syntax,$logic);
    if($play){
    	echo'<script> window.alert("Deleted Successfully")
        location.href="./ViewTicketsSecond.php"
        </script>';
    }
    else{
    	echo'<script> alert("Failed To Delete")</script>';
    }
}
?>