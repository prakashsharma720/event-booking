<?php
// Check if mobile number is set and not empty
if (isset($_POST['mobile']) && !empty(trim($_POST['mobile']))) {
    // Retrieve the mobile number from the POST request
    $mobile = '91' . trim($_POST['mobile']);

    // URL and headers for the OTP API
    $url = 'https://auth.otpless.app/auth/otp/v1/send';
    $headers = [
        'clientId: K76U7GBQUAFMBC966FBOE1EAFJ0CN3KY',
        'clientSecret: u1yazd1g8fcung3bn5r9xk4klxf4hvht',
        'Content-Type: application/json'
    ];
    $data = json_encode([
        "phoneNumber" => $mobile,
        "otpLength" => 6,
        "channel" => "SMS",
        "expiry" => 60
    ]);

    // Initialize cURL and make the request
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    // Check for cURL errors
    if ($response === false) {
        $result = [
            'orderId' => '',
            'message' => 'Curl error: ' . curl_error($ch)
        ];
    } else {
        curl_close($ch);
        $result = json_decode($response, true);

        if (isset($result['orderId'])) {
            $result = [
                'orderId' => $result['orderId'],
                'message' => 'OTP sent successfully'
            ];
        } else {
            $result = [
                'orderId' => '',
                'message' => $result['message'] ?? 'Failed to send OTP'
            ];
        }
    }
} else {
    // Handle the case where mobile number is not provided
    $result = [
        'orderId' => '',
        'message' => 'Invalid Phone number. Please provide a valid mobile number.'
    ];
}

// Display the result as JSON
header('Content-Type: application/json');
echo json_encode($result);
?>
