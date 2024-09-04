<?php
require 'db.php';  // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mobile = $_POST['mobile'];

    // Your API client credentials
    $clientId = 'your_client_id';
    $clientSecret = 'your_client_secret';

    // Prepare the data to send
    $data = [
        "phoneNumber" => $mobile,
        "otpLength" => 6,
        "channel" => "SMS",
        "expiry" => 60
    ];

    // Send OTP request
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

    echo $response;  // Return the API response to the frontend
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="utf-8">
   <title>Send Verification Code | CodeLab</title>
   <link rel="stylesheet" href="style1.css"> <!-- Link to external CSS file -->
</head>
<body>
   <div class="img">
      <img src="muskowl-logo.png" class="logo">
   </div>
   <div class="wrapper">
      <div class="title">Send Verification Code</div>
      <form id="otp-form" action="reset_password.php" method="POST">
         <div class="send-otp-container">
            <div class="field mobile-number">
               <input type="text" id="mobile-number" name="mobile" placeholder="Enter Mobile" required>
            </div>
            <button type="button" class="send-otp-button">Send OTP</button>
         </div>
         <div class="otp-container" style="display: none;">
            <div class="field otp-inputs">
               <input type="text" maxlength="6" name="otp" required>
            </div>
            <div class="verify-button-container">
               <input type="submit" value="Verify OTP">
            </div>
         </div>
      </form>
   </div>
   <script>
      document.querySelector('.send-otp-button').addEventListener('click', function() {
         const mobileNumber = document.getElementById('mobile-number').value;

         fetch('send_otp.php', {
            method: 'POST',
            headers: {
               'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
               'mobile': mobileNumber
            })
         })
         .then(response => response.json())
         .then(data => {
            if (data.status === 'success') {
               document.querySelector('.otp-container').style.display = 'flex';
            } else {
               alert('Error sending OTP: ' + data.message);
            }
         })
         .catch(error => {
            console.error('Error:', error);
         });
      });

      const otpInputs = document.querySelectorAll('.otp-container .field input');
      otpInputs.forEach((input, index) => {
         input.addEventListener('input', (e) => {
            if (e.target.value.length === 1 && index < otpInputs.length - 1) {
               otpInputs[index + 1].focus();
            }
         });

         input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && index > 0 && e.target.value.length === 0) {
               otpInputs[index - 1].focus();
            }
         });
      });
   </script>
</body>
</html>
