<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $required_fields = ['mobile', 'password'];
   $missing_fields = [];

   foreach ($required_fields as $field) {
      if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
         $missing_fields[] = $field;
      }
   }

   if (empty($missing_fields)) {
      $mobile = trim($_POST['mobile']);
      $password = trim($_POST['password']);

      $stmt = $conn->prepare("SELECT id, password, user_type FROM users WHERE mobile = ?");
      $stmt->bind_param('s', $mobile);
      $stmt->execute();
      $stmt->store_result();

      if ($stmt->num_rows > 0) {
         $stmt->bind_result($id, $hashed_password, $user_type);
         $stmt->fetch();

         if (password_verify($password, $hashed_password)) {
            
            
            if ($user_type == 'Participant') {
               header("Location: details.php");
            } elseif ($user_type == 'Visitor') {
               header("Location: login.php");
            } else {
               header("Location: unknown_user.php");
            }
            exit();
         } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid password']);
         }
      } else {
         echo json_encode(['status' => 'error', 'message' => 'User not found']);
      }

      $stmt->close();
   } else {
      echo json_encode(['status' => 'error', 'message' => 'Missing required fields', 'fields' => $missing_fields]);
   }
} else {
   echo json_encode(['status' => 'error', 'message' => 'Invalid request method. Expected POST, received ' . $_SERVER["REQUEST_METHOD"]]);
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

      <form action="login.php" method="POST">

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


   <?php include('register.php'); ?>

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