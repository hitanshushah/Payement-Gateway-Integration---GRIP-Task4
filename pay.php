<?php
    ob_start();
	$fname = $_POST['fname'];
	$mob = $_POST['mob'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];


	include 'instamojo/Instamojo.php';
    //$api = new Instamojo\Instamojo(API Key, Auth Token, 'https://test.instamojo.com/api/1.1/');
	$api = new Instamojo\Instamojo(test_717116f52cc79705468dd341fa9, test_5b6ea0c41567f60e3954765e550, 'https://test.instamojo.com/api/1.1/');

	try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => "Donation",
        "amount" => $subject,
        "send_email" => true,
        "email" => $email,
        "name" => $fname,
        "phone" => $mob,
        "send_sms" => true,
        "redirect_url" => "http://localhost/donation/thankyou.html"
        //"webhook" => 
        ));
    //print_r($response);
    $pay_url = $response['longurl'];
    header("location: $pay_url");
	}
	catch (Exception $e) {
    	print('Error: ' . $e->getMessage());
	}

?>