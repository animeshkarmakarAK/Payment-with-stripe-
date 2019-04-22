<?php 
require_once('stripe-php-master/init.php');
require_once('products.php');

$stripeDetails = array(
	'secretKey' => "sk_test_3pxTa5I7z3Ofloet6ftINxY1",
	'publishableKey' => "pk_test_c6x83UExmDlmmrQr4qfukxNi" );

// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey($stripeDetails['secretKey']);


 ?>