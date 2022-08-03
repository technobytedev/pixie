<?php session_start(); ?><!DOCTYPE html>
<html>
<?php include('head.php'); ?>
<?php include('db.php'); ?>
<?php if(empty($_SESSION['user_id'])) {
  echo "<script>document.location='index.php'</script>";
} ?>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
   <?php include('header.php'); ?>
    <!-- end header section -->
  </div>




<!-- add product modal -->
<div class="modal fade" id="modal_add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="upload.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <label>Product Name</label>
        <input type="text" name="item_name" class="form-control mb-3 " placeholder="Enter product name">

          <label for>Product Price</label>
         <input onkeypress='validate(event)' maxlength=11  type="text" id="item_price" name="item_price" class="form-control mb-3 " placeholder="Enter price">


         <label>Product Image</label>
        <input type="file" name="fileToUpload" class="form-control mb-3" id="fileToUpload" required="">

          <label>Gcash QR CODE</label>
        <input type="file" name="gcash_qrcode" class="form-control " id="gcash_qrcode" required="">
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="submit" class="btn btn-primary" >Upload</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!--  end add product modal -->


<!-- View product modal -->

<div class="modal fade"  id="modal_view_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <button style="color:red" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      
      <div class="modal-body">
        <label>Product Name</label>
         <input id="item_name_" type="text" name="item_name" class="form-control mb-3 " placeholder="Enter username">


       

       
         <label>Product Image</label>
        <div class="product_img-box text-center">
          <div class="d-flex justify-content-center">
              <img  id="item_img_" alt="" style="width: 266px!important; height: 290px!important;"/>
          </div>
            </div>



            <!-- <label class="mt-3">Pay using Gcash QR <a href="" id="qr_download" class="btn btn-primary">Download</a></label> -->
        <div class="product_img-box text-center">
         <!--  <div class="d-flex justify-content-center"> -->
              <!-- <img  id="gcash_qr_" alt="" style="width: 80%!important; height: 80%!important;"/> -->
          <!-- </div> -->
            </div>

  <p id="item_price_"></p>


              <label>Choose Design</label> 
            <div class="row">         

    <div class="col-md-6">
        <div class="custom-control custom-radio image-checkbox">
            <input type="radio" class="custom-control-input" id="ck2a" name="ck2">
            <label class="custom-control-label" for="ck2a">
                <img src="product_image/hero.png" alt="#" class="img-fluid">
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="custom-control custom-radio image-checkbox">
            <input type="radio" class="custom-control-input" id="ck2b" name="ck2">
            <label class="custom-control-label" for="ck2b">
                <img src="product_image/hero.png" alt="#" class="img-fluid">
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="custom-control custom-radio image-checkbox">
            <input type="radio" class="custom-control-input" id="ck2c" name="ck2">
            <label class="custom-control-label" for="ck2c">
                <img src="product_image/hero.png" alt="#" class="img-fluid">
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="custom-control custom-radio image-checkbox">
            <input type="radio" class="custom-control-input" id="ck2d" name="ck2">
            <label class="custom-control-label" for="ck2d">
                <img src="product_image/hero.png" alt="#" class="img-fluid">
            </label>
        </div>
    </div>
</div>


        
               <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
<div id="smart-button-container">
      <div style="text-align: ;">
        <div id="paypal-button-container"></div>
      </div>
      <button data-toggle="modal" style="width:100%" class="btn btn-primary" data-target="#modal_pay_gcash">
        <img src="images/gcash_logo.png" style="height: 33px;"> Checkout</button>
      </div>
    </div>
      </div>
      <div class="modal-footer">

        
    
    </div>
  </div>
</div>


<!--  end add product modal -->

  <!-- gcash QR product modal -->
<div class="modal fade" id="modal_pay_gcash" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="upload.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="submit" class="btn btn-primary" >Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!--  end gcash -->





  <!-- products section -->
  <section class="products_section">
    <div class="heading_container">
      <?php if($user_id == 1) { ?>
        <button data-toggle="modal" class="btn btn-primary" data-target="#modal_add_product"> Add Product</button>
      <?php } ?>
      <h2>
        New Products In Store
      </h2>
      <p>
        Featured Product Just Arrived
      </p>
    </div>
    <div class="container layout_padding">

<form action="product.php" method="post">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"> <span><input type="text" class="form-control" name="item_name_search"></span></div>
        <div class="col-md-4"> <button type="submit" class="btn btn-primary" name="search_item">Search</button></div>
      </div>
      <br>
</form>     



  
      <div class="product_container">

    <?php 

    if(isset($_POST['search_item'])) {

      $item_name = $_POST['item_name_search'];

      $qryView = mysqli_query($db, "SELECT item_id,item_name,item_img,item_price,gcash_qrcode FROM items WHERE item_name LIKE '%$item_name%' ");


    }else {
      $qryView = mysqli_query($db, "SELECT item_id,item_name,item_img,item_price,gcash_qrcode FROM items WHERE is_available=1 ");
    }



      while($row=mysqli_fetch_array($qryView)):

     
    ?>

        <a href="view-product.php?item-id=<?php echo $row['item_id']; ?>" >

          <div class="product_box">
            <div class="product_img-box" style="width: 266px!important; height: 290px!important;">
              <img src="<?php echo $row['item_img'] ?>" alt="" style="width: 266px!important; height: 290px!important;"/>
             <!--  <span>
                Sale
              </span> -->
            </div>
            <div class="product_detail-box">
              <span>
               ₱ <?php echo number_format((float)$row['item_price'], 2, '.', ',');  ?>
              </span>
              <p>
               <?php echo $row['item_name'] ?>
              </p>


            </div>
          </div>
        </a>

    <?php endwhile; ?>



      </div>
    </div>
  </section>

  <!-- end products section -->

  <!-- find section -->


  <!-- end sign section -->

  <!-- info section -->
  <section class="info_section layout_padding">
    <div class="container links_container">
      <div class="row ">
        <div class="col-md-3">
          <h3>
            CUSTOMER SERVICE
          </h3>
          <ul>
            <li>
              <a href="">
                International Help
              </a>
            </li>
            <li>
              <a href="">
                Contact Customer Care
              </a>
            </li>
            <li>
              <a href="">
                Return Policy
              </a>
            </li>
            <li>
              <a href="">
                Privacy Policy
              </a>
            </li>
            <li>
              <a href="">
                Shipping Information
              </a>
            </li>
            <li>
              <a href="">
                Promotion Terms
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h3>
            LET US HELP YOU
          </h3>
          <ul>
            <li>
              <a href="">
                Your Account
              </a>
            </li>
            <li>
              <a href="">
                Your Orders
              </a>
            </li>
            <li>
              <a href="">
                Shipping Rates & Policies
              </a>
            </li>
            <li>
              <a href="">
                Amazon Prime
              </a>
            </li>
            <li>
              <a href="">
                Returns & Replacements
              </a>
            </li>
            <li>
              <a href="">
                Help
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h3>
            INFORMATION
          </h3>
          <ul>
            <li>
              <a href="">
                About Us
              </a>
            </li>
            <li>
              <a href="">
                Careers
              </a>
            </li>
            <li>
              <a href="">
                Sell on shop
              </a>
            </li>
            <li>
              <a href="">
                Press & News
              </a>
            </li>
            <li>
              <a href="">
                Competitions
              </a>
            </li>
            <li>
              <a href="">
                Terms & Conditions
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h3>
            OUR SHOP
          </h3>
          <ul>
            <li>
              <a href="">
                Daily Deals
              </a>
            </li>
            <li>
              <a href="">
                App Only Deals
              </a>
            </li>
            <li>
              <a href="">
                Our Hottest Products
              </a>
            </li>
            <li>
              <a href="">
                Gift Vouchers
              </a>
            </li>
            <li>
              <a href="">
                Trending Product
              </a>
            </li>
            <li>
              <a href="">
                Hot Flash Sale
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="follow_container">
        <div class="row">
          <div class="col-md-9">
            <div class="app_container">
              <h3>
                DOWNLOAD OUR APPS

              </h3>
              <div>
                <img src="images/google-play.png" alt="">
                <img src="images/apple-store.png" alt="">
              </div>
            </div>
          </div>
          <div class="col-md-3 ">
            <div class="info_social">
              <div>
                <a href="">
                  <img src="images/fb.png" alt="">
                </a>
              </div>
              <div>
                <a href="">
                  <img src="images/twitter.png" alt="">
                </a>
              </div>
              <div>
                <a href="">
                  <img src="images/linkedin.png" alt="">
                </a>
              </div>
              <div>
                <a href="">
                  <img src="images/instagram.png" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      Copyright &copy; 2019 All Rights Reserved By
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <script>
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }



        function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }

  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}





  $('#modal_view_product').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var gcash_qr = button.data('gcash_qr');
   var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)

   modal.find('.modal-body #gcash_qr_').attr('src',gcash_qr);



   var file = "download.php?file="+gcash_qr;
   modal.find('.modal-body #qr_download').attr('href',file);


});




  $('#modal_view_product').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal

  var item_img = button.data('item_img');
  var item_name = button.data('item_name');
  var item_price = button.data('price');



  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
   var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)

   modal.find('.modal-body #item_img_').attr('src',item_img);

   modal.find('.modal-body #item_name_').val(item_name)

   modal.find('.modal-body #item_price_').html(item_price)

var p1 = document.getElementById('item_price_').innerHTML;

console.log(p1);


});




  </script>



<script>


</script>





  <script src="https://www.paypal.com/sdk/js?client-id=AQXlWAWKPcp2V2KkubN7m5jkrU26kNzz-xnvWWNNUPueoNjYhxgwZDeSz5DduAuistosvGC3HIZywgjB&enable-funding=venmo&currency=PHP" data-sdk-integration-source="button-factory"></script>
  <script>


  
  


    function initPayPalButton(x) {



      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {

          return actions.order.create({


            purchase_units: [{"amount":{"currency_code":"PHP","value":x}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }




    initPayPalButton(2);
  </script>



</body>

</html>