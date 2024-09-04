<?php
// Function to verify OTP using OtpLess
function otp_verify_otpless($orderId, $otp) {
    $url = 'https://auth.otpless.app/auth/otp/v1/verify';
    $headers = [
        'clientId: K76U7GBQUAFMBC966FBOE1EAFJ0CN3KY', // Replace with actual clientId
        'clientSecret: u1yazd1g8fcung3bn5r9xk4klxf4hvht', // Replace with actual clientSecret
        'Content-Type: application/json'
    ];

    $data = json_encode([
        "orderId" => $orderId,
        "otp" => $otp
    ]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    if ($response === false) {
        return [
            'status' => 'error',
            'message' => 'Curl error: ' . curl_error($ch)
        ];
    }
    curl_close($ch);

    return json_decode($response, true); 
}

// Function to send OTP (You need to implement this or use an existing one)
function send_sms_text($mobile) {
    // Your SMS sending logic here
    // This is a placeholder function, implement the actual SMS sending
    return [
        'orderId' => '', // Replace with actual orderId
        'message' => 'OTP sent successfully' // Replace with actual message
    ];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Required fields for the registration form
    $required_fields = ['name', 'email', 'password', 'mobile', 'user_type'];
    $missing_fields = [];

    // Check for missing fields
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
            $missing_fields[] = $field;
        }
    }

    if (empty($missing_fields)) {
        // Sanitize and assign variables
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $mobile = trim($_POST['mobile']);
        $user_type = trim($_POST['user_type']);
        $verify_status = isset($_POST['otp_verify']) && $_POST['otp_verify'] == 1 ? 1 : 0;

        // Determine the role_id based on user_type
        $role_id = ($user_type == 'participant') ? 2 : 3;

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement to insert the user data
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, mobile, user_type, mobile_verify, role_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssis', $name, $email, $hashed_password, $mobile, $user_type, $verify_status, $role_id);

        // Execute the statement and check if successful
        if ($stmt->execute()) {
            // If OTP is required, send OTP
            if ($verify_status == 0) {
                $otp_response = send_sms_text($mobile);
                
                if ($otp_response['orderId']) {
                    // Store the orderId in session for later verification
                    session_start();
                    $_SESSION['orderId'] = $otp_response['orderId'];
                    echo json_encode(['status' => 'success', 'message' => $otp_response['message']]);
                } else {
                    echo json_encode(['status' => 'error', 'message' => $otp_response['message']]);
                }
            } else {
                echo json_encode(['status' => 'success', 'message' => 'User registered successfully']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => $stmt->error]);
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // Return an error if there are missing fields
        echo json_encode(['status' => 'error', 'message' => 'Missing required fields', 'fields' => $missing_fields]);
    }
} else {
    // Return an error if the request method is not POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method. Expected POST, received ' . $_SERVER["REQUEST_METHOD"]]);
}

// Close the database connection
$conn->close();
?>
