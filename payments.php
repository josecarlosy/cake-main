<?php

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;

// Database settings. Change these for your database configuration.
$dbConfig = [
	'host' => 'localhost',
	'username' => 'padminuser',
	'password' => 'phpadminpass',
	'name' => 'main-cake'
];

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
	'email' => '6karanjajoseph@gmail.com',
	'return_url' => 'payment-successful.php',
	'cancel_url' => 'payment-cancelled.php',
	'notify_url' => 'index2.php'
];

$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

// Product being purchased.




$username =$_POST["username"];
// $itemAmount = 10;
$itemAmount = $_POST["payment_amount"];
// Include Functions
require 'functions.php';

// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["email"])) {

	$txn_id = uniqid();

	// Grab the post data so that we can set up the query string for PayPal.
	// Ideally we'd use a whitelist here to check nothing is being injected into
	// our post data.
	$data = [];
	foreach ($_POST as $key => $value) {
		$data[$key] = stripslashes($value);
	}

	// Set the PayPal account.
	$data['business'] = $paypalConfig['email'];

	// Set the PayPal return addresses.
	$data['return'] = stripslashes($paypalConfig['return_url']);
	$data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
	$data['notify_url'] = stripslashes($paypalConfig['notify_url']);

	// Set the details about the product being purchased, including the amount
	// and currency so that these aren't overridden by the form data.
	$data['username'] = $username;
	$data['amount'] = $itemAmount;
	$data['currency_code'] = 'USD';

	// Add any custom fields for the query string.
	//$data['custom'] = USERID;

	// Build the query string from the data.
	$queryString = http_build_query($data);

	// Redirect to paypal IPN
	header('location:' . $paypalUrl . '?' . $queryString);
	 
	$db = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['name']);
	 $stmt = "INSERT INTO payments (txnid,payment_amount, payment_status, createdtime, username) VALUES('$txn_id','$itemAmount','paid','2021-10-11 11:25:51','$username')";
	 $db->query($stmt);

	exit();
} else {

	
// 	// Handle the PayPal response.
// 	$mytestdata = $_POST['PNREF'];
// 	$mytestUrl = "http://localhost:9090/index2.php";
// 	header('location:' .$mytestUrl.$mytestdata);
// 	exit();
// 	// Create a connection to the database.
// 	$db = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['name']);


// 	// Assign posted variables to local data array.
// 	$data = [
// 		'username'=> $_POST['username'],
// 		'createdtime' => $_POST['createdtime'],
// 		'payment_status' => $_POST['RESULT'],
// 		'payment_amount' => $_POST['payment_amount'],
// 		'txn_id' => $_POST['PNREF'],
		
// 	];
	

	
// 	// We need to verify the transaction comes from PayPal and check we've not
// 	// already processed the transaction before adding the payment to our
// 	// database.

			
// 	$stmt->bind_param(
// 		'sdsss',
// 		 $data['txn_id'],
// 		$data['payment_amount'],
// 		$data['payment_status'],
// 		$data['createdtime'],
// 		$data['username'],
// 	);
// 	$db->query($stmt);

// 	if (verifyTransaction($_POST) && checkTxnid($data['txn_id'])) {

// 	//	write a insert sql script to a test database here
	

// 		if (addPayment($data) !== false) {
// 			echo "Payment successfully added";
// 	}
	
// }

}
?>
