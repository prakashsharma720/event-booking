<?php
include 'db.php';
$code = $_GET['code'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $required_fields = ['name', 'email', 'password', 'mobile', 'user_type'];
   $missing_fields = [];

   foreach ($required_fields as $field) {
      if (empty(trim($_POST[$field]))) {
         $missing_fields[] = $field;
      }
   }

   if (empty($missing_fields)) {
      $name = trim($_POST['name']);
      $email = trim($_POST['email']);
      $password = trim($_POST['password']);
      $mobile = trim($_POST['mobile']);
      $user_type = trim($_POST['user_type']);
      $event_code = trim($_POST['event_code']);
      $verify_status = isset($_POST['otp_verify']) && $_POST['otp_verify'] == 1 ? 1 : 0;
      $role_id = ($user_type == 'participant') ? 2 : 3;

      $email_check_stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ? AND user_type = ?");
      $email_check_stmt->bind_param('ss', $email, $user_type);
      $email_check_stmt->execute();
      $email_check_stmt->bind_result($email_count);
      $email_check_stmt->fetch();
      $email_check_stmt->close();

      if ($email_count > 0) {
         session_start();
         $_SESSION['error'] = 'This email is already registered as a ' . $user_type . '.';
         header('Location: login.php?code=' . urlencode($event_code));
         exit();
      } else {
         $hashed_password = password_hash($password, PASSWORD_DEFAULT);

         $stmt = $conn->prepare("INSERT INTO users (name, email, password, mobile, user_type, mobile_verify, role_id, event_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
         $stmt->bind_param('sssssiss', $name, $email, $hashed_password, $mobile, $user_type, $verify_status, $role_id, $event_code);

         if ($stmt->execute()) {
            if ($user_type == 'participant') {
               header('Location: booking.php?code=' . $event_code);
               exit();
            } else {
               header('Location: thankyou.php?code=' . $event_code);
               exit();
            }
         } else {
            $error_message(['status' => 'error', 'message' => 'Registration failed: ' . $stmt->error]);
         }

         $stmt->close();
      }
   } else {
      $error_message(['status' => 'error', 'message' => 'Missing required fields', 'fields' => $missing_fields]);
   }
}
$conn->close();
?>

<div class="wrapper signup-wrapper form">
   <?php if (!empty($error_message)): ?>
      <div class="error-message">
         <?php echo htmlspecialchars($error_message); ?>
      </div>
   <?php endif; ?>
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