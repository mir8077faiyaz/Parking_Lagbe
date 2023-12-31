<?php
session_start();
date_default_timezone_set('Asia/Dhaka'); //get current time
require_once "connect.php";
require __DIR__ . "../vendor/autoload.php";// checks for composer
$stripe_secret_key='sk_test_51NzEY4BWLHJ5D08gs3G5PMW582O43H6fkj0VpNVCWI2YNAo5nIM8ZgV58b7WlJJJ9oUxkaooOErZemXkckcQJZAH00xp0FfDG3';


\Stripe\Stripe::setApiKey($stripe_secret_key);// set api function

$base_url = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$base_url .= "://" . $_SERVER['HTTP_HOST'];
$success_url = $base_url . "/ParkingLagbe/PHP/success.php?pid={$_POST['pid']}&strim={$_POST['strim']}&etrim={$_POST['etrim']}&totalcost={$_POST['totalcost']}&totalhrs={$_POST['totalhrs']}";

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",/* mode payment means one time payment */
    "success_url" =>$success_url,
    "locale" => "auto", /*lang and formatting set to browser preference*/
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "usd",/* currency*/
                "unit_amount" => $_POST['totalcost'], /*total cost*/
                "product_data" => [
                    "name" => $_POST['location'] /*location*/
                ]
            ]
        ]  
    ]
]);
http_response_code(303); /*See other , redirect*/
header("Location: " . $checkout_session->url);
?>