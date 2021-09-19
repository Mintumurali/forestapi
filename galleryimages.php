<?php

require "conf.php";

if (isset($_POST["start"])){
	$query = "select imagelocation,imageurl from galleryimages";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0) {
		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
		echo json_encode($data);
	}
	else {
		echo "no_data";
		
	}
	
}
mysqli_close($conn);

?>