<?php session_start();
  // Headers
  
  
  include('../db.php');

//   $data = json_decode(file_get_contents('php://input'), true);

// $description = $_GET['description'];
$amount = $_GET['amount'];
$customermobile = $_GET['customermobile'];
$customeremail = $_GET['customeremail'];
// $customername = $_GET['customername'];
$user_id = $_GET['user_id'];

date_default_timezone_set('Asia/Manila');

// Then call the date functions
$date = date('Y-m-d H:i:s');


$order_no = "100";


// $json_customeremail = $data['customeremail']; 

$customername = $_SESSION['customername'];


    $queryCart = mysqli_query($db, 
    "SELECT cart.item_id, cart.option_id, items.item_name, options.option_name,cart.quantity 
    FROM cart
    LEFT JOIN items ON items.item_id = cart.item_id
    LEFT JOIN options ON options.option_id = cart.option_id
    WHERE user_id = '$user_id' ");
    
    
    while($row = mysqli_fetch_array($queryCart)) {

        $option_id = $row['option_id'];
        $item_id = $row['item_id'];
        $quantity = $row['quantity'];
        $option_name = $row['option_name'];
        $description = $row['item_name']." - ".$row['option_name'];
        $query = mysqli_query($db, "INSERT INTO `orders` (`order_id`, `order_no`, `item_id`, `option_id`,  `option_name` ,`quantity`, `description`, `amount`, `customermobile`, `customeremail`, `customername`, `user_id`) 
        VALUES (NULL, '$order_no', '$item_id', '$option_id', '$option_name' ,'$quantity','$description', '$amount', '$customermobile', '$customeremail', '$user_id', '$user_id') ");  
  
    }
 
   //echo $data['success']; 

// echo '<script>window.location.replace("https://boostyxdota.com/pixie/");</script>';


// header("Location: https://boostyxdota.com/pixie/");



?>