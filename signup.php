<?php
	$gGuestID = $_POST['gGuestID'];
	$gUserName = $_POST['gUserName'];
	$gPassword = $_POST['gPassword'];
	$gFirstName = $_POST['gFirstName'];
	$gLastName = $_POST['gLastName'];
	$gGender = $_POST['gGender'];
	$gCountry = $_POST['gCountry'];
	$gCity = $_POST['gCity'];
	$gAddress = $_POST['gAddress'];
	$gPhoneNumber = $_POST['gPhoneNumber'];
	$gHomePhoneNumber = $_POST['gHomePhoneNumber'];
	$gPassportID = $_POST['gPassportID'];
	$gEmail = $_POST['gEmail'];

	// Database connection
	$conn = new mysqli('localhost','root','','hoteltest1');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into guestinfo(gGuestID, gFirstName, gLastName, gGender, gCountry, gCity, gAddress, gPhoneNumber, gHomePhoneNumber, gPassportID, gEmail) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt -> bind_param("issssssiiss", $gGuestID, $gFirstName, $gLastName, $gGender, $gCountry, $gCity, $gAddress, $gPhoneNumber, $gHomePhoneNumber, $gPassportID, $gEmail);
		$execval = $stmt -> execute();
		echo "User ID: ";
		echo $gGuestID;
		echo " Registration successfully...";
		
	}
	    $stmt = $conn->prepare("insert into GuestACCT(gGuestID, gUserName, gPassword) values(?, ?, ?)");
		$stmt -> bind_param("iss", $gGuestID, $gUserName, $gPassword);
		$execval = $stmt -> execute();
		echo "Guest: ";
		echo $gGuestID;
		echo " Registration successfully...";
		$stmt->close();
		$conn->close();
?>