 <!--  -->
 <?php
    session_start();
    if(isset($_SESSION['logged'])){
        header("Location:./AdminPanel.php");
    }
    ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title> Login </title>
 	<link rel="stylesheet" type="text/css" href="Logincss.css">
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
 		if(isset($_POST['userid'])){
 			$usrid = $_POST['userid'];
 			$pass=$_POST['password'];

 			$sql ="Select * from logindetail where UserID='".$usrid."' and Password='".$pass."' limit 1";
 			$check = mysqli_query($con,$sql);
 			if(mysqli_num_rows($check)==1){
 				
 				$_SESSION['logged']="true";
 				$_SESSION['usrid']=$usrid;
                $_SESSION['start']= time();
                $_SESSION['expire']=$_SESSION['start']+(5*60);
 				header("Location:./AdminPanel.php");
 				exit();
 			}	
 			else{
 				$msg="*Invalid UserID or Password";
 			}
 			 		}
 	}
 	?>
 </head>
 <body>
        <nav>
        <a href="home.php">About us</a>
        <a href="contact.php">Contact us</a>
        <a href="LoginHtml.php" style="background-color: #0aa2c3;">Admin login</a>
      <a href="TicketBook.php">Book a ticket</a>
      <a href="Enquiry.php">Enquiry about your ticket</a>
    </nav>
 		<div class="center">
 			<h1>Login</h1> 
 			<form method="POST" action="#">
 				<div class="txt_field">
 					<input type="text" placeholder="Enter UserID" name="userid" required>
 				</div>
 				<div class="txt_field">
 					<input type="password" placeholder="Enter Password" name="password" id="password" required>
 				</div>
 				
 				<div class="showpassword" >

 					<input type="checkbox" onclick="toShowPassword()" >
 					<label>Show Password</label>
 					<script type="text/javascript">
 					function toShowPassword(){
 					var x = document.getElementById("password");
 					if (x.type==="password") {
 						x.type="text";
 					}
 					else{
 						x.type="password";
 					}
 				}
 				</script>
 				</div>
 				<input type="submit" value="Login" class="submitbtn">
                <div class="Errormsg">
                    <?php
                        echo ($msg);
                        
                    ?>
                </div>
 			</form>
          
 </body>
 </html>