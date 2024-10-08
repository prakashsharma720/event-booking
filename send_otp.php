<?php
require 'db.php';  // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $mobile = $_POST['mobile'];

   // Your API client credentials
   $clientId = 'A9F3EE7969F011EFAC7102E825E2EA5C';
   $clientSecret = 'ac7102e825e2ea5ca9f3eeaf69f011ef';

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