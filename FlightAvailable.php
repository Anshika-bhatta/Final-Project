 
<!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Available Flights</title>
     <link rel="stylesheet" type="text/css" href="FlightAvailable.css">
     <script type="text/javascript">
         function functiontocancel(){
            location.href="./cancelbooking.php"
         }
     </script>
     <script type="text/javascript">

</script>
 </head>
 <body>
    <div class="nav">
        <div class="btn">
        <input type="submit" name="Cancel" value="Cancel" class="btninput" onclick="functiontocancel()">
    </div>
    </div>
    
    <div class="center">
    <table id="table">
        <tr>
            <th>Airline</th>
            <th>Flight Number</th>
            <th>From</th>
            <th>To</th>
            <th>Departure Date</th>
            <th>Departure Time</th>
            <th>Action</th>
        </tr>
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
        session_start();
        $source=$_SESSION['source'];
        $destination=$_SESSION['destination'];
        $number=$_SESSION['number'];
        $date=$_SESSION['date'];

 		$sql="Select * from flightdetails where Source='".$source."' and Destination='".$destination."' and Noofpassenger>='".$number."' and date='".$date."' order by Time";
 		$result = $con-> query($sql);
 		if($result -> num_rows > 0){
            $i=0;
            
 			while ($row= $result-> fetch_assoc()) {
                ?> 
 				<td> 
                    <?php echo $row['Airline'] ;?></td>
                <td><?php echo $row['FlightNumber']; ?></td>
                <td><?php echo $row['Source']; ?></td>
                <td><?php echo $row['Destination']; ?></td>
                <td><?php echo $row['Date']; ?></td>
                <td><?php echo $row['Time']; ?></td>
                <td><button><a href="TicketBookSecond.php?FlightNumber=<?php echo $row['FlightNumber'];?>" class="TicketBookSecond">Book</a></button></td></tr>
                
 		<?php  }
           $i++;
 			echo "</table>";
 	}
 	elseif(!isset($_SESSION['source'])){
        header("location:./TicketBook.php");
    }else{
 		?><td colspan="7"><?php echo "No Flights Available";?><?php 
 	}
 	$con-> close();
 }
?> 

</table>

</div>
<div class="empty"></div>
</body>
</html>