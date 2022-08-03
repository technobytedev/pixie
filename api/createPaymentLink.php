<?php session_start();


if(isset($_POST['paynow']) == '1') {

	function createPayment ($description,$amount,$customermobile,$customername,$customeremail,$user_id) {

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
			'amount' => $amount,
			'description' => $description,
		  	'customermobile' => $customermobile,
		  	'customername' => $customername,
		  	'customeremail' => $customeremail,
		  	'merchantlogourl' => 'https://www.tailorbrands.com/wp-content/uploads/2020/07/mcdonalds-logo.jpg',
		  	'webhookfailurl' => 'https://boostyxdota.com/pixie/api/paymentFailed.php',
		  	'webhooksuccessurl' => 'https://boostyxdota.com/pixie/api/paymentSuccess.php?customermobile='.$customermobile.'&amount='.$amount.'&customeremail='.$customeremail.'&user_id='.$user_id,
		  	'redirectsuccessurl' => 'https://boostyxdota.com/pixie/product.php'
		  
		  ),
		));

		//already encoded json response
		$response = curl_exec($curl);

		//decode json response
		$decoded = json_decode($response,true);

		// echo "customermobile : ".$decoded['data']['customermobile']."<br>";
		// echo "checkouturl : ".$decoded['data']['checkouturl']."<br>";
		$_SESSION['customername'] = $decoded['data']['customername'];
		// echo "customeremail : ".$decoded['data']['customeremail']."<br>";

		$checkout_link = $decoded['data']['checkouturl'];

		echo $checkout_link;
		curl_close($curl);

	
	}


	$description = $_POST['desc'];
	$amount = $_POST['amount'];
	$customermobile = $_POST['mobile'];
	$customername = $_POST['name'];
	$customeremail = $_POST['email'];
	$user_id = $_POST['user_id'];

	createPayment($description,$amount,$customermobile,$customername,$customeremail,$user_id);

}










?>