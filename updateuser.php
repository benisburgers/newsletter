<?php
	// recieved id
	$userId = intval($_GET['id']);

	// connect database
	$con = mysqli_connect('localhost','root','root','tessin');

	// check connection
	if (!$con) {
	    die('Could not connect: ' . mysqli_connect_error($con));
	}

	//mysqli_select_db($con,"tessin");
	$updateParticipation = "UPDATE items SET description='test4' WHERE id=$userId";
	mysqli_query($con,$updateParticipation);

	mysqli_close($con);
	
 ?>