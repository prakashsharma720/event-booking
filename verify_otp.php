<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mobile = $_POST['mobile'];
    $otp = $_POST['otp'];
    $order_id = $_POST['order_id'];

    $clientId = 'A9F3EE7969F011EFAC7102E825E2EA5C';
    $clientSecret = 'ac7102e825e2ea5ca9f3eeaf69f011ef';

    $data = [
        "phoneNumber" => $mobile,
        "otp" => $otp,
        "orderId" => $order_id
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

    $response_data = json_decode($response, true);
    // echo $response_data;
    if (isset($response_data['isOTPVerified'])  === true) {
 
        echo json_encode(['status' => 'success', 'message' => 'OTP verified successfully!']);
    } else {
    
        echo json_encode(['status' => 'error', 'message' => $response_data['message'] ?? 'OTP verification failed.']);
    }
}
