<?php $db = mysqli_connect("localhost", "boostyxd_user", "Webdeveloping08", "boostyxd_new");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }