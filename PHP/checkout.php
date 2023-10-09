<?php
session_start();
date_default_timezone_set('Asia/Dhaka'); //get current time
require_once "connect.php";
require __DIR__ . "../vendor/autoload.php";
$stripe_secret_key='sk_test_51NzEY4BWLHJ5D08gs3G5PMW582O43H6fkj0VpNVCWI2YNAo5nIM8ZgV58b7WlJJJ9oUxkaooOErZemXkckcQJZAH00xp0FfDG3';


\Stripe\Stripe::setApiKey($stripe_secret_key);

$base_url = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$base_url .= "://" . $_SERVER['HTTP_HOST'];
$success_url = $base_url . "/ParkingLagbe/PHP/success.php?pid={$_POST['pid']}&strim={$_POST['strim']}&etrim={$_POST['etrim']}&totalcost={$_POST['totalcost']}&totalhrs={$_POST['totalhrs']}";

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" =>$success_url,
    "locale" => "auto",
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "usd",
                "unit_amount" => $_POST['totalcost'],
                "product_data" => [
                    "name" => $_POST['location']
                ]
            ]
        ]  
    ]
]);
http_response_code(303);
header("Location: " . $checkout_session->url);
?>