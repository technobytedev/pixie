<?php

include('db.php');

$target_dir = "product_image/";
$target_dir_gcash = "gcash_qr/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file_gcash = $target_dir_gcash . basename($_FILES["gcash_qrcode"]["name"]);


$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$imageFileType2 = strtolower(pathinfo($target_file_gcash,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $item_name = $_POST['item_name'];
  $item_price = $_POST['item_price'];

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  $check2 = getimagesize($_FILES["gcash_qrcode"]["tmp_name"]);

  if($check !== false || $check2 !== false) {
   // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
   // echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file) || file_exists($target_file_gcash)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 6000000 || $_FILES["gcash_qrcode"]["size"] > 6000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
&& $imageFileType2 != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {


  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
     $error = 0;
  } else {
    echo "Sorry, there was an error uploading your file.";
    $error = 1;
  }



    if (move_uploaded_file($_FILES["gcash_qrcode"]["tmp_name"], $target_file_gcash)) {
     $error = 0;
  } else {
    echo "Sorry, there was an error uploading your file.";
    $error = 1;
  }



}



if($error == 0) {

  $qry = mysqli_query($db, "INSERT INTO items(item_name, item_img, gcash_qrcode, item_price,is_available) VALUES('$item_name','$target_file','$target_file_gcash','$item_price',1) ");

 // echo "uploaded to: ". $target_file;

  echo "<script>document.location = 'product.php'</script>";

}

?>