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

    require_once(__DIR__ . '/vendor/autoload.php');

    // Configure HTTP basic authorization: BasicAuth
    $config = ClickSend\Configuration::getDefaultConfiguration()
                ->setUsername('yqyqyq01@gmail.com')
                ->setPassword('B485A4B9-B836-6A22-2187-3B93D26A318F');

    $apiInstance = new ClickSend\Api\SMSApi(new GuzzleHttp\Client(),$config);
    $msg = new \ClickSend\Model\SmsMessage();
    $msg->setBody("Emergency! from $name,$phone to $ename"); 
    $msg->setTo("$ephone");
    $msg->setSource("sdk");

    // \ClickSend\Model\SmsMessageCollection | SmsMessageCollection model
    $sms_messages = new \ClickSend\Model\SmsMessageCollection(); 
    $sms_messages->setMessages([$msg]);

    try {
        $result = $apiInstance->smsSendPost($sms_messages);
        print_r($result);
        echo "$result";
    } catch (Exception $e) {
        echo 'Exception when calling SMSApi->smsSendPost: ', $e->getMessage(), PHP_EOL;
    }

    header("location: index.php");

?>