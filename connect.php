<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
    $phone = $_POST['phone'];
	$seats = $_POST['seats'];
    $time = $_POST['time'];

	// Database connection
	$conn = new mysqli('localhost','root','','eternity');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, email, phone, seats, time) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssiii", $name, $email, $phone, $seats, $time,);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>