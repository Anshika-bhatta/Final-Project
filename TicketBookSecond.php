<?php
session_start();
 if (isset($_SESSION['$fullname'])) {
    
     unset($_SESSION['$fullname']);
     unset($_SESSION['$Age']);
     unset($_SESSION['$Gender']);
     unset($_SESSION['$Contact']);
     
     header("Location:./TicketBook.php");
 }
 ?>
  <?php
if (!isset($_SESSION['source'])) {
        unset($_SESSION['source']);
        unset($_SESSION['destination']);
        unset($_SESSION['airline']);
        unset($_SESSION['FlightNumber']);
        unset($_SESSION['date']);
        unset($_SESSION['time']);
        session_destroy();
        header("Location:./TicketBook.php");
}
else{
        $now = time();
        if ($now > $_SESSION['expire']) {
            echo '<script>alert("Session Expired Please Enter Details Again")</script>';
            echo ' <script>location.href="logout1.php"</script>';
        }
        else{
 ?> 
 <?php
if($_GET['FlightNumber']){
    $Source=$_SESSION['source'];
    $Destination=$_SESSION['destination'];
    $NoofPassenger=$_SESSION['number'];// total number of passenger travelling
    $Date=$_SESSION['date'];
    $id=$_GET['FlightNumber'];
    $_SESSION['FlightNumber']=$id;
    
    $host="localhost";
    $user="root";
    $password="";
    $database="projectlogin";
    $msg="";

    $con=mysqli_connect($host,$user,$password,$database);
    if (!$con) {
        echo "Database connection failed".mysqli_connect_error();
    }else{
    $sql ="Select Time,Airline from flightdetails where Source='".$Source."' and Destination='".$Destination."' and Date ='".$Date."' and FlightNumber='".$id."' ";
    $result=mysqli_query($con,$sql);
   if (!$result) {
       echo"Sql didn't run";
   }
   else{
    while($row = mysqli_fetch_assoc($result)){
        
        $time=$row['Time'];
        $airline=$row['Airline'];
        $_SESSION['time']=$time;
        $_SESSION['airline']=$airline;
        
    }
    
   }
   } 
}
else{
    echo "Failed To Fetch";
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
            if (isset($_POST['ProceedBooking'])){
               $fullname=$_POST['FullNameField'];
               $Age=$_POST['AgeField'];
               $Gender=$_POST['Gender'];
               $Contact=$_POST['ContactField'];
            
               $TicketNumber= uniqid();
               $_SESSION['$fullname']=$fullname;
               $_SESSION['$Age']=$Age;
               $_SESSION['$Gender']=$Gender;
               $_SESSION['$Contact']=$Contact;
               $_SESSION['$TicketNumber']=$TicketNumber;
               // echo $TicketNumber;
               // echo uniqid();
                              $sql="Insert into passengerdetails values('$TicketNumber','$airline','$id','$Source','$Destination','$Date','$time','$NoofPassenger','$fullname','$Age','$Gender','$Contact')";
                              $backup="Insert into backupdata values('$TicketNumber','$airline','$id','$Source','$Destination','$Date','$time','$NoofPassenger','$fullname','$Age','$Gender','$Contact')";
                              $query="Update flightdetails set Noofpassenger=Noofpassenger-$NoofPassenger where Airline='".$airline."' and FlightNumber='".$id."' and Date='".$Date."' and Time ='".$time."' and Source='".$Source."' and Destination='".$Destination."'";
               $check=mysqli_query($con,$sql);
               $check1=mysqli_query($con,$backup);
               $run=mysqli_query($con,$query);
               if (!$check && !$run && $check1) {
                   echo"Failed To Book";
               }
               else{
                header("location:./TicketDisplay.php");
               }
            }
        }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Ticket</title>
    <link rel="stylesheet" type="text/css" href="TicketBookSecond.css">
    <script type="text/javascript">
        function CancelTicketBooking(){
            location.href="Cancelbookingticket.php"
        }

    </script>

    

</head>
<body>
    
       
    
    <div class="container">
        <h1>Book Your Ticket</h1>
        <form action="#" method="POST" name ="myForm" id="myForm"  >
            <div class="FlightandAirline">
                <div class="BookedAirline">
                    <label>Airline:</label>
                    <input type="text" name="AirlineField" class="AirlineField" value="<?php echo $airline;?>" readonly>
                </div>
                <div class="BookedFlightNumber">
                    <label>Flight Number:</label>
                    <input type="text" name="FlightNumberField" class="FlightNumberField" value="<?php echo $id;?>" readonly>
                </div>
            </div>
            <div class="SourceAndDestination">
                <div class="BookedSource">
                    <label>Source:</label>
                    <input type="text" name="SourceField" class="SourceField" value="<?php echo $Source;?>" readonly>
                </div>
                <div class="BookedDestination">
                    <label>Destination:</label>
                    <input type="text" name="DestinationField" class="DestinationField" value="<?php echo $Destination;?>" readonly>
                </div>
            </div>
            <div class="DateAndTime">
                <div class="BookedDate">
                <label>Date:</label>
                <input type="text" name="DateField" class="DateField" value="<?php echo $Date;?>" readonly>
                </div>
                <div class="BookedTime">
                <label>Time:</label> 
                 <input type="text" name="TimeField" class="TimeField" value="<?php echo $time;?>" readonly>  
                </div>
            </div>
            <div class="TotalPassenger">
                <label>Number of Passenger:</label>
                <input type="text" name="NoOfPassengerField" class="NoOfPassengerField" value="<?php echo $NoofPassenger;?>" readonly>
            </div>
            <div class="FullName">
                <label>Full Name:</label>
                 <input type="text" name="FullNameField" class="FullNameField" id="FullNameField" placeholder="Enter Your Full Name Here"  required>
            </div>
            <div class="Age">
                <label>Age:</label>
                <input type="number" name="AgeField" class="AgeField" id="AgeField" placeholder="Enter Your Age Here" min="18" max="100" title="Enter Valid age" required>
                <script type="text/javascript">
                        var myInput0 = document.getElementById("AgeField");
myInput0.addEventListener("invalid", validate);
myInput0.addEventListener("keyup", validate);

function validate() {
  var val0 = parseFloat(this.value);
  var min0 = parseFloat(this.min);
  var max0 = parseFloat(this.max);
  
  if (val0 < min0) {
    this.setCustomValidity('Only 18+ can book ticket');
  } else if (val0 > max0) {
    this.setCustomValidity('Invalid Age');
  } else {
    this.setCustomValidity("");
  }
}
                    </script>
            </div>
            <div class="Gender">
                <label>Gender:</label>
                <input type="Radio" name="Gender" value="Male" required>Male
                <input type="Radio" name="Gender" value="Female" required>Female
                <input type="Radio" name="Gender" value="Others" required>Others
            </div>
            <div class="ContactNumber">
                <label>Contact:</label>
                <input type="number" name="ContactField" class="ContactField" id="ContactField" placeholder="Enter Your Contact Number"  min="9000000000" max="9999999999" title="Enter Valid Phone Number">
                    <script type="text/javascript">
                        var myInput = document.getElementById("ContactField");
myInput.addEventListener("invalid", validate);
myInput.addEventListener("keyup", validate);

function validate() {
  var val = parseFloat(this.value);
  var min = parseFloat(this.min);
  var max = parseFloat(this.max);
  
  if (val < min) {
    this.setCustomValidity('Enter Valid Phone Number');
  } else if (val > max) {
    this.setCustomValidity('Enter Valid Phone Number');
  } else {
    this.setCustomValidity("");
  }
}
                    </script>
            </div>
            <div class="buttons">
                 <input type="submit" name="ProceedBooking" value="Book Now" onclick="ValidateForm()" class="ProceedBooking">
                 <!-- <button onclick="ValidateForm()" class="ProceedBooking" id="ProceedBooking"></button> -->
                 
        <input type="cancel" name="CancelBooking" value="Cancel Booking" onclick="CancelTicketBooking()" class="CancelBooking">

            </div>
            <span class="error-msg" id="submit-error"></span>
        </form>
    </div>
<?php
}
}
?>
</body>
</html>