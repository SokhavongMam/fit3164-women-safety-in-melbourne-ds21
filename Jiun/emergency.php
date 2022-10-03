<?php
session_start();
require 'includes/dbh.inc.php';
$usersuid = $_SESSION['usersuid'];


$select = mysqli_query($conn, "SELECT * FROM users WHERE usersUid = '$usersuid'") or die('query failed');
if (mysqli_num_rows($select) > 0){
    $fetch = mysqli_fetch_assoc($select);
}

$name = $fetch['usersFullname'];
$phone = $fetch['usersNumber'];
$ename = $fetch['emergencyName'];
$ephone = $fetch['emergencyNumber'];

require_once 'includes/dbh.inc.php';

// Include the bundled autoload from the Twilio PHP Helper Library
require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
use Twilio\Rest\Client;
// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACf8f5b6f6980223e706eeadff04db43e7';
$auth_token = '207d5e783c3dcfbcce21c3186660bd53';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]
// A Twilio number you own with SMS capabilities
$twilio_number = "+13866149400";
$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+61460026125',
    array(
        'from' => $twilio_number,
        'body' => "Emergency! from $name,$phone to $ename"
    )
);

header("location: index.php");
?>