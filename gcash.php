<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://g.payx.ph/payment_request',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
	'x-public-key' => 'pk_b748e4e2c6faceb72ee1134d0a36d360',
	'amount' => '123',
	'description' => 'Payment for services rendered',
  'customermobile' => '09563674951',
  'customername' => 'Cedric Isubol',
  'customeremail' => 'cedricisubol@gmail.com',
  'merchantlogourl' => 'https://www.tailorbrands.com/wp-content/uploads/2020/07/mcdonalds-logo.jpg'
  ),
));


//already encoded json response
$response = curl_exec($curl);


//decode json response
$decoded = json_decode($response,true);


echo "customermobile : ".$decoded['data']['customermobile']."<br>";
echo "checkouturl : ".$decoded['data']['checkouturl']."<br>";
echo "customername : ".$decoded['data']['customername']."<br>";
echo "customeremail : ".$decoded['data']['customeremail']."<br>";
curl_close($curl);



?>
<!-- 
  <a 
  data-amount="900" 
  data-fee="2" 
  data-expiry="11" 
  data-description="Payment for services rendered" 
  data-href="https://getpaid.gcash.com/paynow" 
  data-public-key="pk_b748e4e2c6faceb72ee1134d0a36d360"
  data-mobile="09563674950" 
  onclick="this.href = this.getAttribute('data-href')+'?public_key='+this.getAttribute('data-public-key')+'&amp;amount='+this.getAttribute('data-amount')+'&amp;fee='+this.getAttribute('data-fee')+'&amp;expiry='+this.getAttribute('data-expiry')+'&amp;description='+this.getAttribute('data-description')+'&amp;mobile='+this.getAttribute('data-mobile')";

  href="https://getpaid.gcash.com/paynow?public_key=pk_b748e4e2c6faceb72ee1134d0a36d360&amp;amount=210&amp;fee=2&amp;expiry=6&amp;description=Payment for services rendered&amp;mobile=09563674950"
  target="_blank" 
  class="x-getpaid-button">
  <img src="https://getpaid.gcash.com/assets/img/paynow.png">
</a>  -->



</body>
</html>