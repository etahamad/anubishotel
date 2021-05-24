<?php
	$gGuestID = $_POST['gGuestID'];
	$gFirstName = $_POST['gFirstName'];
	$gLastName = $_POST['gLastName'];
	$gGender = $_POST['gGender'];
	$gCountry = $_POST['gCountry'];
	$gCity = $_POST['gCity'];
	$gAddress = $_POST['gAddress'];
	$gPhoneNumber = $_POST['gPhoneNumber'];
	$gHomePhoneNumber = $_POST['gHomePhoneNumber'];
	$gEmail = $_POST['gEmail'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into guestinfo(gGuestID, gFirstName, gLastName, gGender, gCountry, gCity, gAddress, gPhoneNumber, gHomePhoneNumber, gEmail) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt -> bind_param("issssssiis", $gGuestID, $gFirstName, $gLastName, $gGender, $gCountry, $gCity, $gAddress, $gPhoneNumber, $gHomePhoneNumber, $gEmail);
		$execval = $stmt -> execute();
		echo $gGuestID;
		echo " Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>