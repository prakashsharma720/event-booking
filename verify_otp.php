<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mobile = $_POST['mobile'];
    $otp = $_POST['otp'];


    $clientId = 'A9F3EE7969F011EFAC7102E825E2EA5C';
    $clientSecret = 'ac7102e825e2ea5ca9f3eeaf69f011ef';

    $data = [
        "phoneNumber" => $mobile,
        "otp" => $otp
    ];

    $ch = curl_init('https://auth.otpless.app/auth/otp/v1/verify');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'clientId: ' . $clientId,
        'clientSecret: ' . $clientSecret
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    echo $response;
}
