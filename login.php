<?php
include 'db.php';
session_start();

// Function to send OTP
function send_sms_text($phone_number)
{
   $url = 'https://auth.otpless.app/auth/otp/v1/send';
   $headers = [
      'clientId: K76U7GBQUAFMBC966FBOE1EAFJ0CN3KY',
      'clientSecret: u1yazd1g8fcung3bn5r9xk4klxf4hvht',
      'Content-Type: application/json'
   ];
   $data = json_encode([
      "phoneNumber" => $phone_number,
      "otpLength" => 6,
      "channel" => "SMS",
      "expiry" => 60
   ]);

   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

   $response = curl_exec($ch);
   if ($response === false) {
      return [
         'orderId' => '',
         'message' => 'Curl error: ' . curl_error($ch)
      ];
   }
   curl_close($ch);

   $result = json_decode($response);

   if (isset($result->orderId)) {
      return [
         'orderId' => $result->orderId,
         'message' => 'OTP sent successfully'
      ];
   } else {
      return [
         'orderId' => '',
         'message' => $result->message ?? 'Failed to send OTP'
      ];
   }
}

// Function to verify OTP
function verify_otp($phone_number, $otp_value)
{
   $url = 'https://auth.otpless.app/auth/otp/v1/verify';
   $headers = [
      'clientId: K76U7GBQUAFMBC966FBOE1EAFJ0CN3KY',
      'clientSecret: u1yazd1g8fcung3bn5r9xk4klxf4hvht',
      'Content-Type: application/json'
   ];
   $data = json_encode([
      "phoneNumber" => $phone_number,
      "otp" => $otp_value
   ]);

   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

   $response = curl_exec($ch);
   curl_close($ch);

   $result = json_decode($response);

   if (isset($result->success) && $result->success) {
      return ['status' => 'success', 'message' => 'OTP Verified Successfully'];
   } else {
      return ['status' => 'error', 'message' => 'Invalid OTP'];
   }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (isset($_POST['otp_verify']) && $_POST['otp_verify'] == 0) {
      // Handle OTP sending
      $mobile = '91' . trim($_POST['mobile']);
      $otp_response = send_sms_text($mobile);
      if ($otp_response['orderId']) {
         $_SESSION['otp_order_id'] = $otp_response['orderId'];
         $_SESSION['otp_mobile'] = $mobile;
         echo json_encode(['status' => 'success', 'message' => 'OTP sent successfully']);
      } else {
         echo json_encode(['status' => 'error', 'message' => $otp_response['message']]);
      }
   } else if (isset($_POST['otp_verify']) && $_POST['otp_verify'] == 1) {
      // Handle OTP verification
      $mobile = $_SESSION['otp_mobile'];
      $otp_value = trim($_POST['otp']);
      $otp_response = verify_otp($mobile, $otp_value);
      if ($otp_response['status'] === 'success') {
         echo json_encode(['status' => 'success', 'message' => 'OTP Verified Successfully']);
      } else {
         echo json_encode(['status' => 'error', 'message' => $otp_response['message']]);
      }
   }
} else {
   echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Login and Signup Forms | GWM</title>
   <link rel="stylesheet" href="style.css"> <!-- Link to external CSS file -->

   <!-- OTPLESS SDK -->
   <script id="otpless-sdk" type="text/javascript" data-appid="E30CIZI3ED3C1VKZEP3N"
      src="https://otpless.com/v2/auth.js">
   </script>
</head>

<body>
   <div class="img">
      <img src="logo-gwm.jpg" class="logo">
   </div>
   <div class="wrapper login-wrapper active">
      <div class="title">Login Form</div>

      <form action="login-process.php" method="POST">

         <div class="role-selection">
            <label>
               <input type="radio" name="user_type" value="participant" checked> Participant
            </label>
            <label>
               <input type="radio" name="user_type" value="visitor"> Visitor
            </label>
         </div>

         <div class="field">
            <input type="text" name="mobile" placeholder="Enter Number" minlength="10" required>
         </div>
         <div class="field">
            <input type="password" name="password" placeholder="Enter Password" required>
         </div>

         <div class="content">
            <div class="checkbox">
               <input type="checkbox" id="remember-me">
               <label for="remember-me">Remember me</label>
            </div>
            <div class="pass-link">
               <a href="send_verification_code.php" target="_blank">Forgot password?</a>
            </div>
         </div>

         <div class="field">
            <input type="submit" value="Login" class="login-btn">
         </div>

         <div class="signup-link">
            Not a member? <a href="#" class="signup-link-btn">Signup now</a>
         </div>
      </form>
   </div>

   <div class="wrapper signup-wrapper form">
      <div class="title">Signup Form</div>

      <form id="signup-form" action="signup-process.php" method="POST">
         <div class="role-selection">
            <label>
               <input type="radio" name="user_type" value="participant" checked> Participant
            </label>
            <label>
               <input type="radio" name="user_type" value="visitor"> Visitor
            </label>
         </div>

         <div class="field">
            <input type="text" name="name" placeholder="Enter Name" required>
         </div>
         <div class="field">
            <input type="email" name="email" placeholder="Email" required>
         </div>
         <div class="field">
            <input type="password" name="password" placeholder="Password" required>
         </div>

         <div class="send-otp-container">
            <div class="field mobile-number">
               <input type="text" name="mobile" id="mobile-number" placeholder="Enter your mobile number" required>
            </div>
            <input type="hidden" name="otp_verify" id="otp_verify" value="">
            <button type="submit" class="send-otp-button">Send OTP</button>
         </div>

         <div class="otp-message"></div>

         <div class="otp-container">
            <div class="field otp-inputs">
               <input type="text" id="otp-input" name="otp" placeholder="Enter OTP" minlength="4" maxlength="6"
                  required>
            </div>
            <div class="verify-button-container">
               <button type="button" class="verify-otp-button">Verify OTP</button>
            </div>
         </div>

         <div class="status-message"></div>

         <div class="field">
            <input type="submit" value="Signup" class="signup-btn" disabled>
         </div>
         <div class="signup-link">
            Already a member? <a href="#" class="login-link-btn">Login now</a>
         </div>
      </form>
   </div>

   <script>
      document.addEventListener('DOMContentLoaded', () => {
         const loginWrapper = document.querySelector('.login-wrapper');
         const signupWrapper = document.querySelector('.signup-wrapper');
         const signupLinkBtn = document.querySelector('.signup-link-btn');
         const loginLinkBtn = document.querySelector('.login-link-btn');
         const otpButton = document.querySelector('.send-otp-button');
         const verifyButton = document.querySelector('.verify-otp-button');
         const otpContainer = document.querySelector('.otp-container');
         const statusMessage = document.querySelector('.status-message');
         const signupButton = document.querySelector('.signup-btn');
         const otpMessage = document.querySelector('.otp-message');

         const showSignup = () => {
            loginWrapper.classList.remove('active');
            signupWrapper.classList.add('active');
         };

         const showLogin = () => {
            signupWrapper.classList.remove('active');
            loginWrapper.classList.add('active');
         };

         signupLinkBtn.addEventListener('click', (event) => {
            event.preventDefault();
            showSignup();
         });

         loginLinkBtn.addEventListener('click', (event) => {
            event.preventDefault();
            showLogin();
         });

         otpButton.addEventListener('click', (e) => {
            e.preventDefault();
            const mobileNumber = document.getElementById('mobile-number').value;

            if (mobileNumber.length === 10) {
               fetch('signup-process.php', {
                  method: 'POST',
                  headers: {
                     'Content-Type': 'application/x-www-form-urlencoded',
                  },
                  body: new URLSearchParams({
                     mobile: mobileNumber,
                     otp_verify: 0 // This flag indicates OTP sending
                  })
               })
                  .then(response => response.json())
                  .then(data => {
                     console.log('OTP Response:', data); // Debugging line
                     if (data.orderId) {
                        otpContainer.classList.add('active');
                        otpMessage.textContent = data.message;
                        otpMessage.style.color = 'green';
                     } else {
                        otpMessage.textContent = data.message;
                        otpMessage.style.color = 'red';
                     }
                  })
                  .catch(error => {
                     console.error('Error sending OTP:', error); // Debugging line
                     otpMessage.textContent = 'Error sending OTP. Please try again.';
                     otpMessage.style.color = 'red';
                  });
            } else {
               alert('Please enter a valid 10-digit mobile number.');
            }
         });

         verifyButton.addEventListener('click', (event) => {
            event.preventDefault();
            const otpValue = document.getElementById('otp-input').value;

            if (otpValue.length === 6) {
               fetch('signup-process.php', {
                  method: 'POST',
                  headers: {
                     'Content-Type': 'application/x-www-form-urlencoded',
                  },
                  body: new URLSearchParams({
                     otp: otpValue,
                     otp_verify: 1 // This flag indicates OTP verification
                  })
               })
                  .then(response => response.json())
                  .then(data => {
                     console.log('Verification Response:', data); // Debugging line
                     if (data.status === 'success') {
                        statusMessage.textContent = 'OTP Verified Successfully!';
                        statusMessage.style.color = 'green';
                        signupButton.disabled = false;
                        document.querySelector('.send-otp-container').classList.add('disabled');
                     } else {
                        statusMessage.textContent = 'Invalid OTP. Please try again.';
                        statusMessage.style.color = 'red';
                        signupButton.disabled = true;
                     }
                  })
                  .catch(error => {
                     console.error('Error verifying OTP:', error); // Debugging line
                     statusMessage.textContent = 'Error verifying OTP. Please try again.';
                     statusMessage.style.color = 'red';
                  });
            } else {
               statusMessage.textContent = 'Please enter a 6-digit OTP.';
               statusMessage.style.color = 'red';
               signupButton.disabled = true;
            }
         });

         document.querySelectorAll('.login-btn').forEach(button => {
            button.addEventListener('click', showLogin);
         });

         document.querySelectorAll('.signup-btn').forEach(button => {
            button.addEventListener('click', showSignup);
         });
      });

   </script>
</body>

</html>