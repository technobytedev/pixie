<!DOCTYPE html>
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

<style type="text/css">



:root{
    --white:#fff;
    --smoke-white:#f1f3f5;
    --pink:#4169e1;
}

.selector{
    position:relative;
    width:60%;
    background-color:var(--smoke-white);
    height:80px;
    display:flex;
    justify-content:space-around;
    align-items:center;
    border-radius:9999px;
    box-shadow:0 0 16px rgba(0,0,0,.2);
}
/*.selecotr-item{
    position:relative;
    flex-basis:calc(70% / 3);
    height:100%;
    display:flex;
    justify-content:center;
    align-items:center;
    width: 30px!important;
}*/
.selector-item_radio{

    appearance:none;
    display:none;
        width: 30px!important;


}
.selector-item_label{
    position:relative;
   
    border: 2px solid pink;
    text-align:center;
    border-radius:9999px;
    font-weight:300;
    transition-duration:.5s;
    transition-property:transform, color, box-shadow;
    transform:none;
    width: auto;
    height: auto;
    padding: 5px;


}
.selector-item_radio:checked + .selector-item_label{
    background-color:pink;
    color:var(--white);
    box-shadow:0 0 4px rgba(0,0,0,.5),0 2px 4px rgba(0,0,0,.5);
    transform:translateY(-2px);

}
@media (max-width:480px) {
    .selector{
        width: 90%;
          margin: 10px!important;
    }
}


.checkout-card {
  background:#F9D6F6;
  max-width:450px;
  padding:2rem;
  box-shadow:1px 2px 4px rgba(0,0,0,.2);

}
.checkout-card .title span{
  color:#5578e1;
}
.checkout-card .title p{
  font-size:1.3rem;
  text-align:center;
  padding: 1rem;
}
.price-container{
  display:flex;
  gap:.95rem;
  justify-content:space-evenly;
}
.price-card {
  position:relative;
/*   border:1px solid #bcbcbc; */
  padding:1rem;
  border-radius:3px;
  width:100%;
  display:flex;
  align-items:center;
  gap:.5rem;
  cursor:pointer;
  outline:none;
  transition:.3s ease-in;
}
.price-card label{
  position:absolute;
  top:0;
  left:0;
  right:0;
  bottom:0;
  width:100%;
  border-radius:3px;
  border:1px solid #bcbcbc;
  cursor:pointer;
}
.price-card input[type="radio"]:checked ~ label{
  border:1px solid #F9D6F6;
  background:rgba(85, 120, 225,.2);
  color:#5578e1;
  outline:none;
  border-width:2px;
}
.price-card input[type="radio"]{
  width:30px;
  height:auto;
  border:0;
  transform:scale(1.5);
}
.price-card .content{
  display:flex;
  flex-direction:column;
}
.price-card .content span{
  font-size:.7rem;
}
.detail-info{
  padding-top:2rem;
}
.info{
  margin-bottom:1rem;
}
.info h3{
  letter-spacing:1px;
}
.info small{
  font-size:.74rem;
}
.input-field{
  display:flex;
  flex-direction:column;
}
.input-field label{
  font-size:.7rem;
  padding-bottom:5px;
  font-weight:500;
}
.input-field input{
  padding:.75rem;
  border-radius:3px;
  width:100%;
  border: 1px solid #9EA0A9;
}
.input-field input:focus{
  border: 1px solid #5578e1;
  outline:none;
}

.grid{
  display:flex;
  gap:10px;
  margin-top:.5rem;
  justify-content:space-evenly;
}

.detail-info p{
  font-size:.7rem;
  text-align:center;
  margin-top:1.8rem;
}
.btn{
  margin-top:.7rem;
  width:100%;
  padding:1rem;
  letter-spacing:.8px;
  /*background:#5578e1;*/
  border:none;
  color:#fff;
  border-radius:3px;
  cursor:pointer;
  transition:.2s ease-in-out;
}
.btn:hover{
  background:#506dc7;
  letter-spacing:1px;
  box-shadow:1px 4px 8px rgba(80, 109, 199,.3);
}
</style>



<!-- add product modal -->

<!--  end add product modal -->


<!-- View product modal -->
<br>

<center>


         
        
          
        
<form action="logic/functions.php" method="post">
  add selection name
  <input type="text" name="selection_name">
  <input type="hidden" name="product_id" value="<?php echo $_GET['item-id']; ?>">
  
<button type="submit" name="add_selection_name">Save</button>

</form>
<br>

<form action="logic/functions.php" method="post">

 <select name="selection_id">
  <?php 

   $product_id = $_GET['item-id'];


  $qry = mysqli_query($db, "SELECT * FROM selection WHERE product_id='$product_id' ");

    while($row_selection = mysqli_fetch_assoc($qry)):

      echo "<option value=".$row_selection['selection_id'].">".$row_selection['selection_name']."</option>";

    endwhile;

   ?>
 
</select>
add option name
  <input type="text" name="option_name" value="">

  <input type="hidden" name="product_id" value="<?php echo $_GET['item-id']; ?>">
  
<button type="submit" name="add_option_name">Save</button>

</form>

</center>
<br>


<br>





    <div class="container layout_padding" style="margin-top: -70px">
 
      <div class="product_container">

    <?php 
  $id = $_GET['item-id'];
$qryView = mysqli_query($db, "SELECT item_id,item_name,item_img,item_price,gcash_qrcode FROM items WHERE item_id='$id' ");


  if($row=mysqli_fetch_array($qryView)):

    $_SESSION['prc'] = $row['item_price'];


    $limit_box = 1;
    ?>



  


<center>
<div class="container" style="margin: auto"><a href="product.php">Back to Products</a>
  <div class="checkout-card">

        <label><?php echo $row['item_name'] ?></label>
       <!--   <input id="item_name_" type="text" value="" class="form-control mb-3 " placeholder="Enter username"> -->
    <div class="price-container">
      
    </div>


        <div class="product_img-box text-center" style="background: #F9D6F6;">  


         <!--  <label>Product Image</label> -->
          <div class="d-flex justify-content-center" style=" height: 340px!important;">
              <img style="background:#F9D6F6;" id="item_img_" src="<?php echo $row['item_img'] ?>" alt="" style=" height: 250px!important;"/>
          </div>
            </div>



            <!-- <label class="mt-3">Pay using Gcash QR <a href="" id="qr_download" class="btn btn-primary">Download</a></label> -->
        <div class="product_img-box text-center">
         <!--  <div class="d-flex justify-content-center"> -->
              <!-- <img  id="gcash_qr_" alt="" style="width: 80%!important; height: 80%!important;"/> -->
          <!-- </div> -->
            </div>





  <p id="item_price_"></p>
 <div class="product_img-box "  style="background: #F9D6F6;" >
  
            <div class="row">         

<div style="margin:5px">
 <?php 

  $product_id = $_GET['item-id'];
  $qry_selection = mysqli_query($db, "SELECT * FROM selection WHERE product_id='$product_id' ");
    $selection_array = array();

    while($row_selection = mysqli_fetch_assoc($qry_selection)):

      $selection_array[] = $row_selection;

    endwhile;

      

     

    foreach($selection_array as $row_){ 

      $id = $row_['selection_id'];
      $selection_name = $row_['selection_name'];

       $qry_option = mysqli_query($db, "SELECT * FROM options WHERE selection_id='$id' ");

        echo "<h6 style='text-align:left' >".$selection_name."</h6 >";
        while($row_option = mysqli_fetch_assoc($qry_option)):

           echo '  <input type="radio" id="'.$row_option['option_id'].'" name="selector'.$id.'" class="selector-item_radio">
            <label style="text-align:left" for="'.$row_option['option_id'].'" class="selector-item_label">'.$row_option['option_name'].'</label>';
            
        endwhile;
        echo "<hr>";


    }

 

   ?>
<div>
</div>
</div>

    <div class="detail-info">
      <div class="info">
        <h3>₱ <span id="final_price" style=" background: none; color: #121212"><?php echo number_format((float)$row['item_price'], 2, '.', ',');  ?></span> </h3>
        <input type="hidden" id="final_price_input" value="<?php echo $row['item_price']; ?>" >
    
      </div>

      <div class="input-field">
        <label for="card_number">Quantity
        <input onkeypress="validate(event)" value="" type="number" class="form-control" minlength="1" min="1" maxlength="3" id="quantity" placeholder="number of products"></label>
      </div>


      <?php  $user_id = $_SESSION['user_id']; 

            $query_address = mysqli_query($db,"SELECT delivery_address FROM users WHERE user_id='$user_id' ");

            if($row_add=mysqli_fetch_array($query_address)){
              $address = strtoupper($row_add['delivery_address']);
            }


      ?>



      <div class="input-field">
        <label for="card_number">Delivery Address *editable field*
        <textarea type="number" class="form-control" id="card_number" placeholder="32"><?php echo $address ?></textarea> </label>
      </div>



       <div class="input-field">
        <label for="card_number">Message to the seller
        <textarea type="number" class="form-control" id="card_number" placeholder="nothing"></textarea> </label>
      </div>


      
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit error omnis sunt magnam ipsam. Quod laboriosam ducimus veritatis explicabo, nulla atque. Maiores neque autem velit?</p>
      

    <div id="smart-button-container" class="mt-3">
      <div style="text-align: ;">
        <div id="paypal-button-container"></div>
      </div>
      <button data-toggle="modal" class="btn "  
              style="background: rgb(41, 123, 250)!important; margin-top: -15px;" 
              data-target="#modal_pay_gcash"
              data-gcash_qr="<?php echo $row['gcash_qrcode']; ?>">

      <span style="color;white; background: none; height: 0px">  <img src="images/gcash_logo.png" 
        style="height: 23px; width: 29px;"> Checkout</span></button>
      </div>
    </div>

    <?php endif; ?>
    </div>
  </div>
</div>
</center>
        

           

  
</div>


      </div>
    </div>




  <!-- gcash QR product modal -->
<div class="modal fade" id="modal_pay_gcash" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="logic/functions.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <a id="qr_download">Download QRCODE</a>
        <img src="" id="gcash_qr_" class="img-fluid"><br><br>
        <?php 
        $user = $_SESSION['user_id'];
        $qry = mysqli_query($db, "SELECT gcash_num FROM users WHERE user_id='$user' ");
        $rowgcash=mysqli_fetch_assoc($qry); ?>
        <span>My GCASH number: <input type="text" value="<?php echo $rowgcash['gcash_num'] ?>" name=""></span>
        
      </div>
      <div class="modal-footer">
        Note: Please scan the qr code for payment before clicking Order Now, we will process your order after we received your payment.<br>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
        <button type="submit" name="submit" class="btn btn-primary btn-sm" >Order Now</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!--  end gcash -->


  

  <!-- end products section -->

  <!-- find section -->
  <section class="find_section layout_padding-bottom">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-8 offset-md-2">
          <div class="find_container">
            <div class="row">
              <div class="col-sm-6">
                <div class="find_container-img">
                  <img src="images/find-img.png" alt="" />
                </div>
              </div>
              <div class="col-sm-6">
                <h3>
                  Find Everything <br />
                  From A to Z
                </h3>
                <p>
                  Shop Back to school
                </p>
              </div>
            </div>
          </div>
          <div class="shop_container">
            <div class="row">
              <div class="col-sm-6">
                <p>
                  Shoes
                </p>
                <h3>
                  Shop by catagories
                </h3>
                <div>
                  <a href="">
                    View More
                  </a>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="shoe_img-box">
                  <img src="images/shoes.png" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="find_img-box">
            <img src="images/find-hero.png" alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end find section -->



  <!-- info section -->
<?php include('footer.php'); ?>

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <script>






      //EVENTS
        document.getElementById("quantity").addEventListener("keyup", changePrice);
     


   


    function changePrice() {

      var quantity = document.getElementById("quantity").value;
      var price_input =  document.getElementById("final_price_input").value;


     var quantity = quantity.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
     document.getElementById("quantity").value = quantity;


 


      if(quantity == '' || quantity < 1) {
        quantity = 1;
         document.getElementById("quantity").value = quantity;
      }

      var super_final = quantity * price_input;
      document.getElementById("final_price").innerHTML = super_final.toLocaleString(undefined, { minimumFractionDigits: 2 });
      document.getElementById("final_price_input").innerHTML = super_final.toLocaleString(undefined, { minimumFractionDigits: 2 });

      console.log(super_final);

    }






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





  $('#modal_pay_gcash').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var gcash_qr = button.data('gcash_qr');
   var modal = $(this)
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
    // limit checkbox select
    $('input[name=addon]').on('change', function (e) {
    if ($('input[name=addon]:checked').length > <?php echo $limit_box; ?>) {
        $(this).prop('checked', false);
        //alert("allowed only 3");
       }
    });
    </script>

<?php
// $id = $_SESSION['user_id'];
$qry = mysqli_query($db, "SELECT * FROM users WHERE user_id = '1' ");
$row = mysqli_fetch_assoc($qry);
$client_id = $row['paypal_client_id'];
?>
  <script src="https://www.paypal.com/sdk/js?client-id=<?php echo $client_id; ?>&enable-funding=venmo&currency=PHP" data-sdk-integration-source="button-factory"></script>
  <script>


    // document.getElementById("quantity").addEventListener("change", changePrice);



  
  


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




    initPayPalButton(<?php echo $_SESSION['prc']; ?>);
  </script>



</body>

</html>