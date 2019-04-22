<?php 

require_once('config.php');
// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
\Stripe\Stripe::setVerifySslCerts(false);
$token = $_POST['stripeToken'];
$email = $_POST['stripeEmail'];
$productId = $_GET['id'];

if (!isset($token) || !isset($products[$productId])) {
	header("location:pricing.php");
}

$charge = \Stripe\Charge::create([
    'amount' => $products[$productId]['price'],
    'currency' => 'usd',
    'description' => ' charge for '.$productId.'',
    'source' => $token,
    'statement_descriptor' => 'Custom descriptor',
]);

echo 'payment successfull of balance '.$products[$productId]['price'].'usd ';

 ?>