<?php

include('db.php');
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
header('Content-type: text/javascript');

echo 'haha';
		



if(isset($_POST['firstname'])) {

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

	if($lastname != '' || $firstname != '') {
	$query = mysqli_query($db, "INSERT INTO `users` (`user_id`, `fname`, `mname`, `lname`, `username`, `password`, `delivery_address`, `contact_num`, `gcash_num`, `date_created`, `paypal_client_id`) VALUES (NULL, '$firstname', '$lastname', '1', '1', '1', '1', '1', '1', current_timestamp(), '10');");
		if($query == TRUE) {
			echo 'Saved Successfully';
		}
	}
	else {
		echo 'Cannot Save Blank';
	}
}


// echo  file_get_contents("data1.json");




?>