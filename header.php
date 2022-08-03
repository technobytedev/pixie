 <?php if(!empty($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
    }
 ?>      

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="background:#ff47d9!important; color:white!important">
  <b><a class="navbar-brand" href="#"  style="color:white!important; font-size:18px">Pixie</a></b>

      
      
      


                             

                          

  <div >
      
            <?php if(empty($_SESSION['user_id'])): ?>
                           
                           
                           
                            
                             <span  style="cursor: pointer;" data-toggle="modal" data-target="#modal_log_reg">
                            Login / Register 
                            </span>
                       

                      <?php else: ?>

                         <?php 
                               $qryCountCart = mysqli_query($db, "SELECT DISTINCT order_id FROM cart WHERE user_id = '$user_id' ");

                             
                                $num_rows = mysqli_num_rows($qryCountCart);
                               
                               ?>
                               <a href="cart.php"><img src="images/shopping-cart.png" style="width: 20px; "> <sup id="cart_product_number" style="color:black;margin-right: 8px;"><?php echo $num_rows; ?></sup></a>
                              
                      

                     <?php endif; ?>

    <button style="color:white!important;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" ><div  class="navbar-toggler-icon text-white bg-white"></div></button>
  </div>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" style="color:white!important">
      <li class="nav-item active">
        <a  style="color:white!important; font-size:18px" class="nav-link" href="users.php">Users </a>
      </li>
      <li class="nav-item">
        <a  style="color:white!important; font-size:18px" class="nav-link" href="product.php">Products</a>
      </li>
      
        <li class="nav-item">
        <a  style="color:white!important; font-size:18px" class="nav-link" href="setting.php">Setting</a>
      </li>
      
           <li class="nav-item">
        <a  style="color:white!important; font-size:18px" class="nav-link" href="orders.php">Orders</a>
      </li>
      
      
          
           <li class="nav-item">
        <a  style="color:white!important; font-size:18px" class="nav-link" href="stocks.php">Stocks</a>
      </li>

      <!--<li class="nav-item">-->
      <!--  <a class="nav-link disabled" href="#">Disabled</a>-->
      <!--</li>-->
    </ul>
         <span>        <b style="color:white!important; "> 
      
      
      
      <?php if(empty($_SESSION['user_id'])): ?>
                           
                           
                           
                            
                             <span  style="cursor: pointer;" data-toggle="modal" data-target="#modal_log_reg">
                            Login / Register 
                            </span>
                       

                      <?php else: ?>

                         <?php 
                               $qryCountCart = mysqli_query($db, "SELECT DISTINCT order_id FROM cart WHERE user_id = '$user_id' ");

                             
                                $num_rows = mysqli_num_rows($qryCountCart);
                               
                               ?>
                               
                         <?php echo "Hi, " . $_SESSION['fname']; ?> |
                               <a style="color:white; cursor: pointer;" href="logic/logout.php">Logout</a>

                     <?php endif; ?>

                             

                            </b></span>
  </div>
</nav>


     <?php       if(!empty($_SESSION['alert'])) 
                                {
                                echo $_SESSION['alert'];
                                unset($_SESSION['alert']);
                                }
                            ?>
    <!-- end header section --><br><br>