<?php


$email = $_POST["email"];
$pass = $_POST["password"];


require "conf.php";

$query = "select * from register where email like '".$email."' and password like '".$pass."';";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0) {
	
	$response = array();
	$code = "login_true";
	$row = mysqli_fetch_array($result);
	$name = $row[1];
	$email = $row[2];
	$message = "".$name." ".$email."";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode(array("server_response"=>$response));
} 
else {
	
	$response = array();
	$code = "login_false";
	$message = "User not Found";
	array_push($response,array("code"=>$code,"message"=>$message));
	echo json_encode(array("server_response"=>$response));
	
}

mysqli_close($conn);

?>