<?php

$name = $_POST["name"];
$email = $_POST["email"];
$packname = $_POST["packname"];
$amountduea = $_POST["amountduea"];
$purchasedate = $_POST["purchasedate"];
$tourdate = $_POST["tourdate"];




require "conf.php";

	
	$query = "insert into orderdetails (name,email,packagename,amountduea,traveldate,purchasedate) values('".$name."','".$email."','".$packname."','".$amountduea."','".$tourdate."','".$purchasedate."');";
	$result = mysqli_query($conn,$query);
	
	if (!$result) {
		
	$response = array();
	$code = "update_false";
	$message = "server error! and purchase failed!!";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode(array("server_response"=>$response));
		
	}else{
		
	$response = array();
	$code = "update_true";
	$message = "Your order has been placed suucessfully!!";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode(array("server_response"=>$response));
		
	}
	
	mysqli_close($conn);


?>