<?php
require_once 'vendor/autoload.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  $paynow = new Paynow\Payments\Paynow(
    '16816',
    '792e5f7e-f088-4909-90c8-04380a8c0864',
    'http://example.com/gateways/paynow/update',
    'http://example.com/return?gateway=paynow'
);
$invoice_name = "ZESA SMART APP ".time();
$paying_phone = $_POST["pnumber"];
$ammount = $_POST["ammount"];
// $user_email = filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL);
$payment = $paynow->createPayment($invoice_name, 'libertymashonganyika@gmail.com');
$payment->add('MAGETSI', $ammount);
$response = $paynow->sendMobile("10", "0779475766", 'ecocash');
$status="";
if($response->success()) {
    // Get the poll url (used to check the status of a transaction). You might want to save this in your DB
    $pollUrl = $response->pollUrl();
    $status = $paynow->pollTransaction($pollUrl);
    if($status->paid()) {

        $return = new stdClass();

        $return->state = "done";
        $return->pollurl=$pollUrl;
        // Yay! Transaction was paid for
        print(json_encode($return) ) ;
    } else {
        $return = new stdClass();
        $return->state = "failed";
        print(json_encode($return) ) ;
    }
    // Get the instructions
    $instrutions = $response->instructions();
    echo $instrutions;
}else{
    echo json_encode($response ) ;
}
// Check the status of the transaction with the specified pollUrl
// Now you see why you need to save that url ;-)
$status = $paynow->pollTransaction($pollUrl);

if($status->paid()) {
    // Yay! Transaction was paid for
} else {
    print("Why you no pay?");
}
?>