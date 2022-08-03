<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php include('head.php'); ?>
<?php include('db.php'); ?>
<?php if(empty($_SESSION['user_id'])) {
  echo "<script>document.location='index.php'</script>";
} 


if(isset($_POST['update'])) {

 $username = $_POST['username'];
 $password = $_POST['password'];
 $paypal = $_POST['paypal_client_id'];

 $query = mysqli_query($db, "UPDATE users 
  SET username='$username',password='$password',paypal_client_id='$paypal'  ");

 $_SESSION['alert'] = '<script>swal({
                title: "",
                text: "Updated Successfully",
                icon: "success",
              });</script>';


}




?>



<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro);
body {
    background:#2d3b36 url(http://andstud.io/wp-content/uploads/2014/03/blurrrr2.jpg)no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding-top: 0px;
}

h1 {
   color: #fff; 
   text-shadow: 1px 1px 0 rgba(0,0,0,0.4);
   padding-top: 30px;
   font-size: 100px; 
   font-weight: 700;
   text-align: center;
   font-family: 'Source Sans Pro', sans-serif;
   margin: 0px;
}

form {
    margin-left:auto;
    margin-right:auto;
    width: 965px;
    height: 450px;
    padding:30px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box; 
    overflow: hidden; 
}

textarea{
    background: rgba(0, 0, 0, 0.4); 
    width: 894px;
    height: 110px;
    border: none;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box; 
    display: block;
    font-family: 'Source Sans Pro', sans-serif;
    font-size: 18px;
    color: #fff;
    padding-left: 45px;
    padding-right: 20px;
    padding-top: 12px;
    margin-bottom: 20px;
    overflow: hidden;
}

select {
    width: 960px;
    height: 48px;
    line-height: 1.5;
    font-size: 1.4em;
    border: none;
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -mox-border-radius: 10px;
    color: #fff;
    display: block;
    background: transparent;
    background-color: rgba(0,0,0,.4);
    margin-bottom: 20px;
    display: block;
    font-family: 'Source Sans Pro', sans-serif;
    font-size: 18px;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
}

.nameinput, .emailinput {
    width: 894px;
    height: 48px;
    border: none;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box; 
    display: block;
    font-family: 'Source Sans Pro', sans-serif;
    font-size: 18px;
    color: #fff;
    padding-left: 20px;
    padding-right: 20px;
    margin-bottom: 20px;
}

input[type=submit] {
    cursor: pointer;
}

input.nameinput {
    background: rgba(0, 0, 0, 0.4); 
    padding-left: 45px;
}

input.emailinput {
    background: rgba(0, 0, 0, 0.4);
    padding-left: 45px;
}

input.message {
    background: rgba(0, 0, 0, 0.4);
    padding-left: 45px;
}

select.indent {
    padding-left: 45px;
    cursor: pointer;
}

::-webkit-input-placeholder {
    color: #fff;
}

:-moz-placeholder{ 
    color: #fff; 
}

::-moz-placeholder {
    color: #fff;
}

:-ms-input-placeholder {  
    color: #fff; 
}

input:focus, textarea:focus { 
    background-color: rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0 0 5px 1px rgba(255,255,255,.5);
    -webkit-box-shadow: 0 0 5px 1px rgba(255,255,255,.5);
    box-shadow: 0 0 5px 1px rgba(255,255,255,.5);
    overflow: hidden; 
}

.btn {
  border: none;
  font-family: 'Source Sans Pro', sans-serif;
  font-size: 18px;
  width: 200px;
  height: 48px;
  color: #000;
  background: #fff;
  cursor: pointer;
  display: inline-block;
  font-weight: 700;
  position: relative;
  outline: none;
  box-shadow: 0 6px #cecece;
  border-radius: 5px;
  float: right;
  margin-right: 6px;
}

.btn:hover {
  color: white;
  outline: none;
  box-shadow: 0 4px #cecece;
  top: 2px;
  background: #e83e8c;
}

.btn:active {
  background: #fff;
  outline: none;
  box-shadow: 0 0 #cecece;
  top: 6px;
}

.flat {
  border: none;
  cursor: pointer;
  display: inline-block;
  outline: none;
  position: relative;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
}


.flat:before {
  position: absolute;
  height: 100%;
  left: 0;
  top: 0;
  line-height: 3;
  font-size: 140%;
  width: 60px;
}


.flat {
   width: 960px !important;
   height: 48px;
   overflow: hidden;
   margin-bottom: 20px;
   background: url(http://www.jordancundiff.com/wp-content/uploads/2014/03/icon-dropdown.png) no-repeat right;
   }

@media only screen and ( min-width: 768px ) and ( max-width: 1035px ) {
  h1 { font-size: 60px; }
  form { width: 736px !important; }
    #wpcf7-f156-p143-o1\20 formwrap > form > p > span.wpcf7-form-control-wrap.Subject.flat > select, #wpcf7-f156-p143-o1\20 formwrap > form > p > span.wpcf7-form-control-wrap.Subject.flat { width: 731px !important; }
    .nameinput, .emailinput, #wpcf7-f156-p143-o1\20 formwrap > form > p > span.wpcf7-form-control-wrap.Message > textarea { width: 666px !important; }
}

@media only screen and ( max-width: 804px ) {
    h1 { font-size: 50px; }
  form { width: 450px !important; }
   #wpcf7-f156-p143-o1\20 formwrap > form > p > span.wpcf7-form-control-wrap.Subject.flat > select, #wpcf7-f156-p143-o1\20 formwrap > form > p > span.wpcf7-form-control-wrap.Subject.flat { width: 445px !important; }
    .nameinput, .emailinput, #wpcf7-f156-p143-o1\20 formwrap > form > p > span.wpcf7-form-control-wrap.Message > textarea { width: 380px !important; }
}

@media only screen and ( max-width: 517px ) {
     h1 { font-size: 30px; }
  form { width: 295px !important; }
  #wpcf7-f156-p143-o1\20 formwrap > form > p > span.wpcf7-form-control-wrap.Subject.flat > select, #wpcf7-f156-p143-o1\20 formwrap > form > p > span.wpcf7-form-control-wrap.Subject.flat { width: 290px !important; }
    .nameinput, .emailinput, #wpcf7-f156-p143-o1\20 formwrap > form > p > span.wpcf7-form-control-wrap.Message > textarea { width: 225px !important; }
  .btn { width: 110px; }
}
</style>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
   <?php include('header.php'); ?>
    <!-- end header section -->
  </div>








<?php 


if(!empty($_SESSION['alert'])) 
  {
      echo $_SESSION['alert'];
      unset($_SESSION['alert']);
  }

// $id = $_SESSION['user_id'];
$qry = mysqli_query($db, "SELECT * FROM users WHERE user_id = '1' ");
$row = mysqli_fetch_assoc($qry);
$id =  $row['paypal_client_id'];


?>


  <!-- products section -->

  <!-- end products section -->

  <!-- find section -->
  <section class="find_section layout_padding-bottom">
    <div class="container-fluid">
   
<h1>Admin Setting</h1>
<div class="wpcf7" id="wpcf7-f156-p143-o1 formwrap">
    <form action="setting.php" method="post" class="wpcf7-form" novalidate="novalidate">
        <div style="display: none;">
            <input type="hidden" name="_wpcf7" value="156">
            <input type="hidden" name="_wpcf7_version" value="3.7.2">
            <input type="hidden" name="_wpcf7_locale" value="en_US">
            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f156-p143-o1">
            <input type="hidden" name="_wpnonce" value="d1da331d93">
        </div>
        <p>
           <span class="wpcf7-form-control-wrap Name"><label class="text-white">Username</label>
             <input  value="<?php echo $row['username']; ?>" type="text" name="username" value="" size="40" class="nameinput wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="">
          </span>
          <span class="wpcf7-form-control-wrap Email"><label class="text-white">Pasword</label>
            <input  value="<?php echo $row['password']; ?>" type="password" name="password"  size="40" class="emailinput wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="">
          </span>

          <span class="wpcf7-form-control-wrap Email"><label class="text-white">Paypal Client ID</label>
            <input value="<?php echo $id; ?>" type="password" name="paypal_client_id"  size="40" class="emailinput wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="">
          </span>
           
        
        

      </p>

 <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
  </form>
</div>
</div>
    </div>
  </section>

  <!-- end find section -->


  <!-- sign section -->


  <!-- end sign section -->

<?php include('footer.php'); ?>


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="datatables/datatables.min.js"></script>

  <script>
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





  <script src="https://www.paypal.com/sdk/js?client-id=AQXlWAWKPcp2V2KkubN7m5jkrU26kNzz-xnvWWNNUPueoNjYhxgwZDeSz5DduAuistosvGC3HIZywgjB&enable-funding=venmo&currency=PHP" data-sdk-integration-source="button-factory"></script>
  <script>



  </script>



</body>

</html>