 <?php
    session_start();
    if(!isset($_SESSION['logged'])){
        header("Location:./LoginHtml.php");
    }
    
?>
 <?php  
 $source=$_SESSION['source'];
        $destination=$_SESSION['destination'];
        $airline=$_SESSION['Airline'];
        $date=$_SESSION['date'];
?>
<!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>View Booked Tickets</title>
     <link rel="stylesheet" type="text/css" href="ViewTicketsSecond.css">
     <script type="text/javascript">
         function functiontocancel(){
            location.href="./ViewTickets.php"
         }
     </script>
     <script type="text/javascript">

</script>
 </head>
 <body>
    <div class="nav">
    <span class="Airline">
        <label>Airline:</label>
        <?php echo $airline; ?>
    </span>
        
    <span class="Source">
        <label>Source:</label>
        <?php echo $source; ?>
    </span>
    <span class="Destination">
        <label>Destination:</label>
        <?php echo $destination; ?>
    </span>
    <span class="Date">
        <label>Date:</label>
        <?php echo $date; ?>
    </span>
    <span class="search">
        <label>Search</label>
        <input id="myInput"  type="text" placeholder="Search Ticket Number.." onkeyup="searchFun()" class="searchinput">
        
    </span>
    <span class="btn">
        <input type="submit" name="Cancel" value="Back" class="btninput" onclick="functiontocancel()">
    </span>
    </div>
    <!-- <iframe width="100$"> -->
    <!-- <div class="center"> -->
    <table id="myTable">
        <tr>
            <th>Ticket Number</th>
            <th>Flight Number</th>
            <th>Passenger Name</th>
            <th>Total Booked Seats</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Time</th>
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
        
        // $source=$_SESSION['source'];
        // $destination=$_SESSION['destination'];
        // $airline=$_SESSION['Airline'];
        // $date=$_SESSION['date'];

 		$sql="Select TicketNumber,FlightNumber,PassengerName, TotalBookedSeat, Age, Gender,Contact,Time  from passengerdetails where Source='".$source."' and Destination='".$destination."' and Airline='".$airline."' and date='".$date."' order by FlightNumber ASC";
 		$result = $con-> query($sql);
 		if($result -> num_rows > 0){
            $i=0;
            
 			while ($row= $result-> fetch_assoc()) {
                ?><tr> 
 				<td> 
                    <?php echo $row['TicketNumber'] ;?></td>
                <td><?php echo $row['FlightNumber']; ?></td>
                <td><?php echo $row['PassengerName']; ?></td>
                <td><?php echo $row['TotalBookedSeat']; ?></td>
                <td><?php echo $row['Age']; ?></td>
                <td><?php echo $row['Gender']; ?></td>
                <td><?php echo $row['Contact']; ?></td>
                <td><?php echo $row['Time']; ?></td>
                <td><button><a href="ViewTicketsThird.php?TicketNumber=<?php echo $row['TicketNumber'];?>" class="ViewTicketsSecond">Delete</a></button></td></tr>
                
 		<?php  }
           $i++;
 			echo "</table>";
 	}
 	elseif(!isset($_SESSION['source'])){
        header("location:./ViewTickets.php");
    }else{
 		?><td colspan="7" style="background-color:white;"><?php echo "Flight is empty";?><?php 
 	}
 	$con-> close();
 }
?> 

</table>
<div class="empty"></div>
<script type="text/javascript">
    function searchFun(){
        let filter = document.getElementById('myInput').value.toUpperCase();
        let myTable = document.getElementById('myTable');
        let tr = myTable.getElementsByTagName('tr');

        for(var i=0; i<tr.length; i++){
            let td = tr[i].getElementsByTagName('td')[0];

            if(td){
                let textvalue= td.textContent || td.innerHTML;

                if (textvalue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display ="";
                }else{
                    tr[i].style.display = "none";
                }
            }
        }
    }

</script>
  
<!-- </div> -->
<!-- </iframe> -->
</body>
</html>