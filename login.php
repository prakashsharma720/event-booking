<?php
include 'db.php';
$error_message = '';
$code = $_GET['code'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $required_fields = ['mobile', 'password', 'user_type'];
   $missing_fields = [];

   foreach ($required_fields as $field) {
      if (empty(trim($_POST[$field]))) {
         $missing_fields[] = $field;
      }
   }

   if (empty($missing_fields)) {
      $mobile = trim($_POST['mobile']);
      $password = trim($_POST['password']);
      $user_type = trim($_POST['user_type']);

      $allowed_user_types = ['participant', 'visitor'];


      if (!in_array($user_type, $allowed_user_types)) {
         $error_message = 'Invalid user type. Please select a valid type.';
      } else {

         $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE mobile = ? AND user_type = ?");
         $stmt->bind_param('ss', $mobile, $user_type);
         $stmt->execute();
         $stmt->store_result();

         if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $name, $email, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
               session_start();
               $_SESSION['user_id'] = $id;
               $_SESSION['mobile'] = $mobile;
               $_SESSION['user_type'] = $user_type;
               $_SESSION['name'] = $name;
               $_SESSION['email'] = $email;


               if ($user_type === 'participant') {
                  header('Location: booking.php?code=' . $code);
               } elseif ($user_type === 'visitor') {
                  header('Location: thankyou.php?code=' . $code);
               }
               exit();
            } else {
               $error_message = 'Invalid mobile or password';
            }
         } else {
            $error_message = 'User not found. Please check your mobile and user type.';
         }

         $stmt->close();
      }
   } else {
      $error_message = 'Missing required fields: ' . implode(', ', $missing_fields);
   }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Login and Signup Forms | GWM</title>
   <link rel="stylesheet" href="login.css"> <!-- Link to external CSS file -->
   <style>
      .error-message {
         border: 1px solid red;
         background-color: #f8d7da;
         color: #721c24;
         padding: 10px;
         margin: 10px 0;
         border-radius: 5px;
      }
   </style>
   <!-- OTPLESS SDK -->

</head>

<body>


   <div class="img">
      <img src="logo-gwm.jpg" class="logo">
   </div>
   <div class="wrapper login-wrapper <?php if (!isset($_GET['error']))
                                          echo "active"; ?>">
      
      <?php if (!empty($error_message)): ?>
         <div class="error-message">
            <?php echo htmlspecialchars($error_message); ?>
         </div>
      <?php endif; ?>
      <div class="title">Login Form</div>

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
   <div class="wrapper signup-wrapper form <?php if (isset($_GET['error'])) echo "active"; ?>">
      <?php
      if (isset($_GET['error'])) {
         echo '<p style="color: #721c24; border:1px solid red; background-color: #f8d7da; padding: 10px; marging: 10px 0px; border-radius: 5px;">' . htmlspecialchars($_GET['error']) . '</p>';
      }
      ?>
      <div class="title">Signup Form</div>

      <form action="register.php" method="POST">

         <div class="role-selection">
            <label>
               <input type="radio" id="user_type" name="user_type" value="participant" checked> Participant
            </label>
            <label>
               <input type="radio" id="user_type" name="user_type" value="visitor"> Visitor
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
            <input type="hidden" name="event_code" value="<?= $code ?>">
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