<?php
session_start();
	unset($_SESSION['time']);
	unset($_SESSION['airline']);
	header("location:./FlightAvailable.php");
?>