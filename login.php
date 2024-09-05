<?php
include 'db.php';  // Include your database connection file

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
      $verify_status = isset($_POST['otp_verify']) && $_POST['otp_verify'] == 1 ? 1 : 0;  // Ensure verification is actually done
      $event_code = 'abc'; // Example event code, change as needed

      // Determine the role_id based on user_type
      $role_id = ($user_type == 'participant') ? 2 : 3;

      // Hash the password
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      // Prepare the SQL statement to insert the user data
      $stmt = $conn->prepare("INSERT INTO users (name, email, password, mobile, user_type, mobile_verify, role_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param('sssssis', $name, $email, $hashed_password, $mobile, $user_type, $verify_status, $role_id);

      // Execute the statement and check if successful
      if ($stmt->execute()) {
         // You can return a success message or redirect if needed
           header('location details.php');
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
   // No action taken for invalid request method; can be left empty if not needed
   // echo json_encode(['status' => 'error', 'message' => 'Invalid request method. Expected POST, received ' . $_SERVER["REQUEST_METHOD"]]);
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
    
</head>

<body>
   <div class="img">
      <img src="logo-gwm.jpg" class="logo">
   </div>
   <div class="wrapper login-wrapper active">
      <div class="title">Login Form</div>

      <form action="details.php" method="POST">

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

      <form action="#" method="POST">
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
               <input type="text" name="mobile" id="mobile-number" placeholder="Enter Mobile" required>
            </div>
            <input type="hidden" name="otp_verify" id="otp_verify" value="">
            <button class="send-otp-button">Send OTP</button>
         </div>

         <div class="otp-message"></div>
         <div class="otp-container">
            <div class="field otp-inputs">
               <input type="text" id="otp-input" name="otp" placeholder="Enter OTP" minlength="4" maxlength="6"
                  required>
            </div>
            <div class="verify-button-container">
               <input type="submit" value="Verify OTP" class="verify-otp-button">
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

         document.querySelectorAll('.login-btn').forEach(button => {
            button.addEventListener('click', () => {
               document.querySelector('.signup-wrapper').classList.remove('active');
               document.querySelector('.login-wrapper').classList.add('active');
            });
         });

         document.querySelectorAll('.signup-btn').forEach(button => {
            button.addEventListener('click', () => {
               document.querySelector('.login-wrapper').classList.remove('active');
               document.querySelector('.signup-wrapper').classList.add('active');
            });
         });

         document.querySelector('.signup-link-btn').addEventListener('click', (event) => {
            event.preventDefault();
            document.querySelector('.login-wrapper').classList.remove('active');
            document.querySelector('.signup-wrapper').classList.add('active');
         });

         document.querySelector('.login-link-btn').addEventListener('click', (event) => {
            event.preventDefault();
            document.querySelector('.signup-wrapper').classList.remove('active');
            document.querySelector('.login-wrapper').classList.add('active');
         });

         document.querySelector('.send-otp-button').addEventListener('click', (e) => {
            e.preventDefault();
            let mobileNumber = document.getElementById('mobile-number').value;

            if (mobileNumber.length === 10) {
               document.querySelector('.otp-container').classList.add('active');
               document.querySelector('.otp-message').textContent = ''; // Clear any previous messages
            } else {
               alert('Please enter a valid 10-digit mobile number.');
            }
         });

         const otpSubmitButton = document.querySelector('.verify-button-container input[type="submit"]');
         const otpContainer = document.querySelector('.otp-container');
         const statusMessage = document.querySelector('.status-message');
         const signupButton = document.querySelector('.signup-btn');
         const otpMessage = document.querySelector('.otp-message');

         signupButton.disabled = true;

         otpSubmitButton.addEventListener('click', (event) => {
            event.preventDefault();

            const otpInputs = document.querySelectorAll('.otp-container .field input');
            const otpValues = Array.from(otpInputs).map(input => input.value).join('');

            if (otpValues.length === 6) {
               // Simulate OTP verification success (you should replace this with real verification logic)
               // For example, you can use AJAX to verify the OTP on the server side
               const otpIsValid = true; // Change this based on actual OTP verification

               if (otpIsValid) {
                  statusMessage.textContent = 'OTP Verified Successfully!';
                  statusMessage.style.color = 'green';
                  signupButton.disabled = false;
                  otpMessage.textContent = ''; // Clear any previous messages
               } else {
                  statusMessage.textContent = 'Invalid OTP. Please try again.';
                  statusMessage.style.color = 'red';
                  signupButton.disabled = true;
               }
            } else {
               statusMessage.textContent = 'Please enter a 6-digit OTP.';
               statusMessage.style.color = 'red';
               signupButton.disabled = true;
            }
         });
      });

   </script>
</body>

</html>