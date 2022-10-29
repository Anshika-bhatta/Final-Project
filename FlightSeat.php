<?php
$con = mysqli_connect("localhost","root","","projectlogin");

if (isset($_POST['AirlineID' ])) {
	$AirlineID=$_POST['AirlineID' ];
	$sql = mysqli_query($con,"Select * from dataflightnumber where AirlineID='$AirlineID' ");
	?>
	<select name="airlineno"> 
		<option value="">-Select FlightNumber-</option>
		<?php
			while($row = mysqli_fetch_array($sql)){
				?>
				<option value="<?php echo $row['FlightID'];?>"><?php echo $row['FlightNumber'];?></option>
				<?php
			}
		?>
	</select>
}
?>