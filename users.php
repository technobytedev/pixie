<?php session_start(); ?> 
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











  <!-- products section -->

  <!-- end products section -->

  <!-- find section -->
  <center>
  <section class="find_section layout_padding-bottom" style="margin: auto;">
    <div class="container-fluid" >
     <div class="m-3"> <h3> USERS</h3>
     <table id="table" class="display">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Gcash</th>
    <!--   <th scope="col">Contact</th> -->
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>

    <?php 
$num = 0;
$qryView = mysqli_query($db, "SELECT * FROM users");

      while($row=mysqli_fetch_array($qryView)):

     
    ?>

    <tr>
      <th><?php echo $row['user_id'] ?></th>
      <td><?php echo $row['fname']." ".$row['mname']." ".$row['lname'] ?></td>
      <td><?php echo $row['gcash_num'] ?></td>
     <!--  <td><?php //echo $row['contact_num'] ?></td> -->
        <td><button class="btn btn-sm btn-primary">View</button> </td>
    </tr>
  

    <?php endwhile; ?>

 
  </tbody>
</table>
</div>
    </div>
  </section>
</center>
  <!-- end find section -->


  <!-- sign section -->
  <!-- <section class="sign_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <h3>
            Sign up for Newsletter
          </h3>
          <p>
            There are many variations of passages of Lorem Ipsum available,
            but the majority have suffered
          </p>
        </div>
        <div class="col-md-7">
          <form action="">
            <input type="email" placeholder="Enter your email" />
            <button>
              Sign Up
            </button>
          </form>
        </div>
      </div>
    </div>
  </section> -->

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