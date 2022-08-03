<?php 
  // Headers
  
  
  include('../db.php');

$data = json_decode(file_get_contents('php://input'), true);
   
   
   $query = mysqli_query($db, "INSERT INTO `users` (`user_id`, `fname`, `mname`, `lname`, `username`, `password`, `delivery_address`, `contact_num`, `gcash_num`, `date_created`, `paypal_client_id`) VALUES (NULL, 'failed_payment', '', '', '', '', '', '', '', current_timestamp(), ''); ");

   //echo $data['success']; 

  if($data['success'] == 0) {
  	echo "<script>document.location='https://google.com'</script>";
   }

   


?>