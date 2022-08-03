<?php session_start();


// if(empty($_SESSION['user_id'])) {
//   echo "<script>document.location='../index.php'</script>";
// }

$use_id = $_SESSION['user_id'];

include('../db.php');

$redirect_to_index = "<script>document.location='../index.php'</script>";
$redirect_to_cart = "<script>document.location='../cart.php'</script>";
$redirect_to_products = "<script>document.location='../product.php'</script>";




if(isset($_POST['add-cart'])) {

    $addons = NULL;

    $qry = mysqli_query($db, "SELECT cart_id FROM cart ORDER BY cart_id DESC LIMIT 1");
    $row = mysqli_fetch_assoc($qry);
    $cart_id = $row['cart_id'] + 1;

    $orderid = date('mdy').$cart_id;

   $item_id = $_POST['item_id'];
   $quantity = $_POST['quantity'];
   
   
   $queryStock = mysqli_query($db, "SELECT total_items_left FROM items WHERE item_id = '$item_id' ");
   
   $rowStock = mysqli_fetch_array($queryStock);
   $stock = $rowStock['total_items_left'];
   
       if($quantity > $stock) {
           
            $_SESSION['alert'] = '<script>swal({
                                  title: "",
                                  text: "Sorry, available items left is: '.$stock.'",
                                  icon: "error",
                                });</script>';
    
    
        
        //  $redirect_to_item = "<script>document.location='../view-product.php?item-id='</script>";
         echo $redirect_to_products;
           
       }
       
       else {

               if(empty($_POST['selection_names'])) {
            
                   $qry = mysqli_query($db, "INSERT INTO cart(item_id,order_id,option_id,quantity,user_id) VALUES('$item_id','$orderid','0','$quantity','$use_id') ");
              
               }
               else {
            
                   foreach($_POST['selection_names'] as  $value) {
            
                    $option =   str_replace(" ","",$value);
            
                    $option_new =  $_POST[$option];
            
            
                     $qry = mysqli_query($db, "INSERT INTO cart(item_id,order_id,option_id,quantity,user_id) VALUES('$item_id','$orderid','$option_new','$quantity','$use_id') ");          
               
                    }
            
               }
            
               if($qry == TRUE) {
                   
                        $_SESSION['alert'] = '<script>swal({
                                          title: "",
                                          text: "Added to Cart",
                                          icon: "success",
                                        });</script>';
            
            
                
                 echo $redirect_to_products;
                   
               }
        }


} //end post



if(isset($_POST['add_selection_name'])) {
    $selection_name = $_POST['selection_name'];
    $product_id = $_POST['product_id'];

    $qry = mysqli_query($db, "INSERT INTO selection(selection_name,product_id) VALUES('$selection_name','$product_id') ");


    $redirect = "<script>document.location='../view-product.php?item-id=".$product_id."'</script>";

    $_SESSION['alert'] = '<script>swal({
                              title: "",
                              text: "Successfully Added",
                              icon: "success",
                            });</script>';

    echo $redirect;



   
}




if(isset($_POST['add_option_name'])) {
    $selection_id = $_POST['selection_id'];
    $option_name = $_POST['option_name'];
    $product_id = $_POST['product_id'];

    $qry = mysqli_query($db, "INSERT INTO options(option_name,selection_id) VALUES('$option_name','$selection_id') ");


    $redirect = "<script>document.location='../view-product.php?item-id=".$product_id."'</script>";

    $_SESSION['alert'] = '<script>swal({
                              title: "",
                              text: "Successfully Added",
                              icon: "success",
                            });</script>';

    echo $redirect;



   
}


if(isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
   	$email = $_POST['email'];
    $contact = $_POST['contact'];
    $gcash = $_POST['gcash'];
    $delivery = $_POST['delivery'];
    $fname = ucfirst(strtolower($_POST['fname']));
    $lname = ucfirst(strtolower($_POST['lname']));
    $mname = ucfirst(strtolower($_POST['mname']));
    include('../db.php');
    
   // echo "ok";

    $querySelect = mysqli_query($db, "SELECT username FROM users WHERE username = '$username' ");

    $rows = mysqli_num_rows($querySelect);

    if($rows > 0) {
    	$_SESSION['alert'] = '<script>swal({
							  title: "",
							  text: "The username is already taken!",
							  icon: "info",
							});</script>';
    }
    else {

    	$queryReg = mysqli_query($db, "INSERT INTO `users`(`fname`, `mname`, `lname`, `username`, `password`, `delivery_address`, `contact_num`, `gcash_num`, `paypal_client_id`) 
    	VALUES ('$fname', '$mname', '$lname', '$username', '$password', '$delivery_address', '$contact', '$gcash', '0')");

    	if($queryReg == TRUE):

    		$_SESSION['alert'] = '<script>swal({
							  title: "",
							  text: "Successfully Registered",
							  icon: "success",
							});</script>';
         echo $redirect_to_index;
         
        else:
            echo "false";
    	endif;

    }

   


} //end register


if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
  

    $querySelect = mysqli_query($db, "SELECT fname,user_id FROM users WHERE username = '$username' AND password = '$password' ");

    $rows = mysqli_num_rows($querySelect);

    if($rows > 0) {
    	$_SESSION['alert'] = '<script>swal({
							  title: "",
							  text: "Successfully Logged In",
							  icon: "success",
							});</script>';

		$row = mysqli_fetch_assoc($querySelect);
		$_SESSION['fname'] = $row['fname'];
		$_SESSION['user_id'] = $row['user_id'];

    }
    else {

    		$_SESSION['alert'] = '<script>swal({
							  title: "",
							  text: "Wrong username or password",
							  icon: "error",
							});</script>';

    }

    echo $redirect_to_index;


} //end login





?>