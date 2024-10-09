<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mobile = $_POST['mobile'];
    $user_type = 'user_type';

    $mobile_stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE mobile = ? AND user_type = ?");
    $mobile_stmt->bind_param('ss', $mobile, $user_type);
    $mobile_stmt->execute();
    $mobile_stmt->bind_result($mobile_count);
    $mobile_stmt->fetch();
    $mobile_stmt->close();

    // Step 2: If registered, send OTP
    if ($mobile_count > 0) {
        $clientId = 'A9F3EE7969F011EFAC7102E825E2EA5C';
        $clientSecret = 'ac7102e825e2ea5ca9f3eeaf69f011ef';

        $data = [
            "phoneNumber" => $mobile,
            "otpLength" => 6,
            "channel" => "SMS",
            "expiry" => 60
        ];

        $ch = curl_init('https://auth.otpless.app/auth/otp/v1/send');
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
    } else {
        echo json_encode(['error' => 'Mobile number not registered.']);
    }
}
