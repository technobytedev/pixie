<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php include('head.php'); ?>
<?php include('db.php'); ?>
<?php if(empty($_SESSION['user_id'])) {
  echo "<script>document.location='index.php'</script>";
} 

if(isset($_GET['del'])) {
  $id = $_GET['del'];
  $qryDel = mysqli_query($db, "DELETE FROM cart WHERE order_id = '$id' ");

  echo '<script> document.location = "cart.php"; </script>';


}













?>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
   <?php include('header.php'); ?>
    <!-- end header section -->
  </div>
  
  




<style type="text/css">
td, th {
  font-size: 14px;

}
 table {
  width: 550px!important;
  margin: auto;
  border: 1px solid lightgrey;
}



@media only screen and (max-width: 600px) {
  table {
   width: 99%!important;
   margin: 3px;
   
  }
  
  td, th {
      font-size: 11px;
  }

}


 
</style>





  <!-- products section -->

  <!-- end products section -->

  <!-- find section -->

    <br>    <br>
    <p class="text-center"><a href="product.php" >Back to Products</a></p>
    <h3 class="text-center">My Cart</h3>
<div class="table-responsive"> 
      <table class="table " style="padding: 0px;" class="table-responsive">
        <thead>
      <tr>
        <th scope="col">Product</th>
          <th scope="col">Quantity</th>
        <th scope="col">Price</th>
         <th scope="col">Total</th>
          <th scope="col"></th>
     
      
        
      </tr>
      </thead>
<tbody>

<?php 
    

    $total = 0;
    $grand_total=0;
    $order_desc = '';
    $qry = mysqli_query($db, "SELECT DISTINCT cart.quantity, cart.order_id,items.item_name,items.item_id,items.item_img,items.item_price
                              FROM cart 
                              INNER JOIN items on items.item_id = cart.item_id
                              WHERE cart.user_id = '$user_id'
                              ");



    while($row = mysqli_fetch_array($qry)):

 $option_names[] = NULL;
?>

        <tr>

           <td><?php echo $row['item_name']; ?><br>

            <img loading=lazy class="img-fluid img-responsive" src="<?php echo $row['item_img']; ?>" alt="art image" style="width: 86px"> <br>
            
                    
                   
                      <?php  
                      
            if($row['quantity'] > 1) {
                 $order_desc .=   $row['quantity']."pcs - ".$row['item_name']." ";   
            }else {
                $order_desc .=   $row['quantity']."pc - ".$row['item_name']." ";  
            }       
                 

             $id =  $row['item_id'];
             $order_id =  $row['order_id'];
             $qry2 = mysqli_query($db, "SELECT option_name 
                                        FROM options 
                                        RIGHT JOIN cart ON  cart.option_id = options.option_id
                                        WHERE cart.item_id = '$id' AND order_id = '$order_id' 
                              ");

            

           
              while($row2 = mysqli_fetch_array($qry2)) {
                 // $option_names[] = $row2['option_name'];
              

             // foreach($option_names as $option_name){
           
           $new_arrs = array("option_".$row2['option_name']);
          
          
            $order_desc .= "[".$row2['option_name']."] ";
    

               ?>

           <?php if($row2['option_name'] != '')  { echo "→<i>".$row2['option_name']."</i><br>"; } ?>


              <?php } //} 
              
               $order_desc .= "<br>";
              
              ?>
              
              
            
            </td>
         


  
         <td>
           <?php echo $row['quantity'] ?>
         </td>


          <td>

          <input type="hidden" id="unit_price_<?php echo $order_id; ?>" value="<?php echo $row['item_price']; ?>" name=""> 
          
       
          
          <!--<input value=""  id="option_<?php// echo $order_id; ?>" onkeypress="validate(event)" type="number" min="1" name="quantity_name[]" class="form-control quantity_class" style="width: 90px;font-size: 13px;">-->
          
          
     
           <?php $total += $row['item_price']; 
          
            number_format((float)$row['item_price'], 2, '.', ',');  ?>
          
 
          
              <span id="total_per_unit_<?php echo $order_id; ?>"> ₱<?php echo number_format((float)$row['item_price'], 2, '.', ','); ?></span>

      


         <p style="text-align: right; margin-top: -20px; margin-right: 5px"> 
     
        
        
        </p>
         </td>
         
         <td>
             
              <?php $total =  $row['quantity'] * $row['item_price'];
              
              $total;
              
              $grand_total += $total;
              
              ?>
             ₱<?php echo number_format((float)$total, 2, '.', ','); ?>
             
         </td>
         
         <td>  <a href="cart.php?del=<?php echo $order_id; ?>"> <i class="bi bi-trash " style="font-size: 15px;" data-toggle="tooltip" title="Remove Item">  </i> </a>   </td>
       
        
        <script>
          
document.getElementById("option_<?php echo $order_id; ?>").addEventListener("keyup",compute_prc);
document.getElementById("option_<?php echo $order_id; ?>").addEventListener("change",compute_prc);          

function compute_prc() {
    
     
     var f_price = 0;
    
    


  var quantity = document.getElementById("option_<?php echo $order_id; ?>").value;
  var unit_price = document.getElementById("unit_price_<?php echo $order_id; ?>").value;
  var unit_total = quantity * unit_price;

  document.getElementById("total_per_unit_<?php echo $order_id; ?>").innerHTML = "₱ "+unit_total.toLocaleString("en", {useGrouping: true, minimumFractionDigits: 2});
  
   

    
    // const final_prices = [];
    // final_prices.push(unit_total);

   console.log(unit_total);
   
   
   f_price += unit_total;
   
   
   document.getElementById("final_total").innerHTML = f_price;


}









//console.log(total_final);


        </script>
          
        

        

        </tr>

<?php endwhile; ?>





          <?php 


         $total_cart_item = mysqli_num_rows($qry);
         if($total_cart_item == 0) {
                echo '<tr><td colspan="3"><p class="text-center">NO ITEM IN YOUR CART</p></td>
</tr>
';

              }
   

          ?>

 <?php if($total_cart_item != 0) {
              

  ?>
<tr>
  <td colspan=""><p >Sub Total</p></td>
  <td colspan=""><p></p></td>
  <td colspan=""><p></p></td>

  <td colspan="" style="text-align:left;">₱<?php echo number_format((float)0, 2, '.', ',');  ?></td>
    <td colspan=""><p></p></td>
</tr>
<tr>
  <td colspan=""><b >Grand Total</b></td>
  <td colspan=""><p></p></td>
  <td colspan=""><p></p></td>
  
  <td id="final_total" colspan="" style="text-align:left;">₱<?php echo number_format((float)$grand_total, 2, '.', ',');  ?></td>
  <td colspan=""><p></p></td>

</tr>



 <tr> 

  <td colspan="5">
      
              <div id="paypal-button-container"></div>
   


     <p style="text-align:center;"> 

        <button style="background:#0454e3; width: 100%; border: none; border-radius: 5px;"   id="gcash_button" style="background: none; "><img  style="border: none; height: 36px;" src="https://getpaid.gcash.com/assets/img/paynow.png"></button>

    </p>
    
    
     <p style="text-align:center;"> 
    <br>
        <button style="background:#0454e3; width: 100%; border: none; border-radius: 5px; color: white!important"   
        ><img  style="border: none; height: 36px; " >Proceed to Checkout</button>

    </p>


   
    </div>
       <!-- CHECKOUT end BUTTONS -->
      
      
  </td>


</tr>
<?php  } ?>
</tbody>
        
    </table>  
    
    </div>

    
<br>
<br><br>


<!-- VALUES TO SEND TO THE API MAKE PAYMENT USING AJAX -->
<input type="hidden" id="description_x" value="<?php echo  $order_desc; ?>" name="">
<input type="hidden" id="final_amount_x" value="<?php echo 1;  //$grand_total; ?>" name="">
<input type="hidden" id="mobile_x" value="09563674950" name="">
<input type="hidden" id="fullname_x" value="Cedric Isubol" name="">
<input type="hidden" id="email_x" value="cedricisubol@gmail.com" name="">
<input type="hidden" id="user_id_x" value="<?php echo $_SESSION['user_id']; ?>" name="">


<?php include('footer.php'); ?>


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="datatables/datatables.min.js"></script>

  <script>



    document.getElementById('gcash_button').addEventListener('click',makePostPayment);

function makePostPayment() {

    event.preventDefault();
    let xhr = new XMLHttpRequest();

    let desc = document.getElementById("description_x").value;
    let amount = document.getElementById("final_amount_x").value;
    let mobile = document.getElementById("mobile_x").value;
    let name = document.getElementById("fullname_x").value;
    let email = document.getElementById("email_x").value;
    let user_id = document.getElementById("user_id_x").value;
    
    
    let paynow = 1;

    // parameter to send using xhr
    let parameters = `paynow=${paynow}&desc=${desc}&amount=${amount}&mobile=${mobile}&name=${name}&email=${email}&user_id=${user_id}`;

    xhr.open("POST",`api/createPaymentLink.php`, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //sends the parameters to the page
    xhr.send(parameters);

    xhr.onload = function() {
       
        console.log(xhr.responseText);
        //window.location.href = xhr.responseText;
        
        window.open(
        xhr.responseText,
        '_blank'
        );
       
      }
} //end makepostpayment function








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



    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }





    $(document).ready(function () {
    $('#table').DataTable();
});


//   $('#modal_view_product').on('show.bs.modal', function (event) {
//   var button = $(event.relatedTarget) // Button that triggered the modal
//   var gcash_qr = button.data('gcash_qr');
//    var modal = $(this)
//   // modal.find('.modal-title').text('New message to ' + recipient)

//    modal.find('.modal-body #gcash_qr_').attr('src',gcash_qr);



//    var file = "download.php?file="+gcash_qr;
//    modal.find('.modal-body #qr_download').attr('href',file);


// });




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



  </script>

<script>
    
    const cls = ['quantity_class']

let sum = { any:0 }

document.querySelectorAll('input[name="quantity_name[]"]').forEach(el=>
  {
  sum.any += parseFloat(el.value)

  cls.forEach(cl=>
    {
    if (el.classList.contains(cl))
      {
      sum[cl] = (sum[cl] ?? 0) + parseFloat(el.value)
      }  
    })
  })

console.log( sum )
    
    
</script>

<!--<script>window.location.replace("https://boostyxdota.com/pixie/");</script>-->
</body>

</html>