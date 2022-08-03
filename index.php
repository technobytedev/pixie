<?php session_start(); ?>
<!DOCTYPE html>
<html>

<?php include('head.php'); ?>





<body>
  <div class="hero_area">
    <!-- header section strats -->
<?php include('header.php'); ?>
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="background:#ff47d9">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container-fluid">
                  <div class="row">
                    <div class="offset-md-2 col-md-4">
                      <div class="slider_item-detail">
                        <div>
                          <h2 class="slider_heading">

                           

                            <br />
                            FREE Delivery Bacolod area
                          </h2>
                          <p>
                            Aesthetic souverniers for any occassions, make your loveones happy by giving them lovely gifts from our shop.
                          </p>
                          <div class="d-flex">
                            <a href="product.php" class="slider_btn">
                             Products
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="hero_img-box">
                        <img src="images/keychain.png" alt="" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container-fluid">
                  <div class="row">
                    <div class="offset-md-2 col-md-4">
                      <div class="slider_item-detail">
                        <div>
                          <h2 class="slider_heading">
                            50% OFF <br />
                            First order
                          </h2>
                          <p>
                             Aesthetic souverniers for any occassions, make your loveones happy by giving gifts from our shop.
                          </p>
                          <div class="d-flex">
                            <a href="" class="slider_btn">
                              Order Now
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="hero_img-box">
                        <img src="images/clip.png" alt="" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container-fluid">
                  <div class="row">
                    <div class="offset-md-2 col-md-4">
                      <div class="slider_item-detail">
                        <div>
                          <h2 class="slider_heading">
                            50% OFF <br />
                            First order
                          </h2>
                          <p>
                             Aesthetic souverniers for any occassions, make your loveones happy by giving gifts from our shop.
                          <div class="d-flex">
                            <a href="" class="slider_btn">
                              Order Now
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="hero_img-box">
                        <img src="images/keychain.png" alt="" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>

    <!-- end slider section -->
  </div>



  

  <!-- end sign section -->


<?php include('footer.php'); ?>



 <!-- login -->
<!-- Modal -->
<div class="modal fade" id="modal_log_reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title">Pixie Products</h4>
      </div>
      
      <div class="modal-body">
          <center>
        
        <button data-toggle="modal" class="btn btn-white" data-target="#modal_login">Login</button> or
        <button data-toggle="modal" class="btn btn-white" data-target="#modal_register">Register</button>

        </center>
      </div>
      <div class="modal-footer">
      
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

  <!-- end login -->

 <!-- login -->
<!-- Modal -->
<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title">Pixie Products</h4>
      </div>
      
      <div class="modal-body">

        <form method="post" action="logic/functions.php">
        <input type="text" name="username" class="form-control mb-3 mt-3" placeholder="Enter username" required="">
        <input type="password" name="password" class="form-control mb-3" placeholder="Enter password" required="">
         <!--  <a data-toggle="modal" data-target="#modal_register"  style="cursor: pointer;"  >Register here</a> -->
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>

      </div>
    </div>
  </div>
</div>

  <!-- end login -->







 <!-- login -->
<!-- Modal -->
<div class="modal fade" id="modal_register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title">Pixie Products</h4>
      </div>
      
      <div class="modal-body">

        <form method="post" action="logic/functions.php">
        <input type="text" name="username" class="form-control mb-3 mt-3" placeholder="Create username" required="">
        <input type="password" name="password" class="form-control mb-3" placeholder="Create password" required="">




        <input type="text" name="fname" class="form-control mb-3 mt-3" placeholder="Enter firstname" required="">
        <input type="text" name="mname" class="form-control mb-3" placeholder="Enter mname" required="">
        <input type="text" name="lname" class="form-control mb-3" placeholder="Enter lastname" required="">


        <input type="text" name="gcash" onkeypress='validate(event)'  minlength=11 maxlength=11 class="form-control mb-3" placeholder="Enter gcash number eg: 09563674951" >
        <input type="text" name="contact" onkeypress='validate(event)' minlength=11  maxlength=11  class="form-control mb-3" placeholder="Enter contact number eg: 09563674951" required="">
         <input type="email" name="email" class="form-control mb-3" placeholder="Enter email" required="" >
        <textarea name="delivery" class="form-control mb-3" placeholder="Enter Delivery Address" required=""></textarea>
       

         <!--  <a  data-toggle="modal" data-target="#modal_login" style="cursor: pointer;">Login here</a> -->
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="register" class="btn btn-primary">Register Now</button>
        </form>


      </div>
    </div>
  </div>
</div>

  <!-- end login -->

  <!-- footer section -->


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript" src="datatables/datatables.min.js"></script>

  <script>


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




    $(document).ready(function () {
    $('#example').DataTable();
});





    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
  </script>
</body>

</html>