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


      $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE (email = ? OR mobile = ?) AND user_type = ?");
      $stmt->bind_param('sss', $email, $mobile, $user_type);
      $stmt->execute();
      $stmt->bind_result($count);
      $stmt->fetch();
      $stmt->close();


      if ($count > 0) {

         $email_stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ? AND user_type = ?");
         $email_stmt->bind_param('ss', $email, $user_type);
         $email_stmt->execute();
         $email_stmt->bind_result($email_count);
         $email_stmt->fetch();
         $email_stmt->close();

         $mobile_stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE mobile = ? AND user_type = ?");
         $mobile_stmt->bind_param('ss', $mobile, $user_type);
         $mobile_stmt->execute();
         $mobile_stmt->bind_result($mobile_count);
         $mobile_stmt->fetch();
         $mobile_stmt->close();


         if ($email_count > 0 && $mobile_count > 0) {
            session_start();
            $error_message = 'Both the email and mobile number are already registered as a ' . $user_type . '. Please use different credentials to sign up.';
         } elseif ($email_count > 0) {
            session_start();
            $error_message = 'This email is already registered as a ' . $user_type . '. Please use a different email to sign up.';
         } elseif ($mobile_count > 0) {
            session_start();
            $error_message = 'This mobile number is already registered as a ' . $user_type . '. Please use a different mobile number to sign up.';
         }

         header('Location: login.php?code=' . urlencode($event_code) . '&error=' . urlencode($error_message));
         exit();
      } else {

         $hashed_password = password_hash($password, PASSWORD_DEFAULT);
         $stmt = $conn->prepare("INSERT INTO users (name, email, password, mobile, user_type, mobile_verify, role_id, event_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
         $stmt->bind_param('sssssiss', $name, $email, $hashed_password, $mobile, $user_type, $verify_status, $role_id, $event_code);

         if ($stmt->execute()) {
            if ($user_type == 'participant') {
               header('Location: login.php?code=' . $event_code);
            } else {
               header('Location: thankyou.php?code=' . $event_code);
            }
            exit();
         } else {
            $error_message = 'Registration failed: ' . $stmt->error;
         }

         $stmt->close();
      }
   } else {
      $error_message = 'Missing required fields: ' . implode(', ', $missing_fields);
   }
}
$conn->close();
?>


<div class="wrapper signup-wrapper form">
   <?php if (!empty($error_message)): ?>
      <div class="error-message" style="border: 1px solid red; padding: 10px; color: red;">
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
            <input type="text" id="mobile-number" name="mobile" placeholder="Enter Mobile" required>
         </div>
         <button type="button" class="send-otp-button">Send OTP</button>
      </div>

      <input type="hidden" id="order_id" name="order_id" value="">

      <div class="otp-container" style="display: none;">
         <div class="field otp-inputs">
            <input type="text" maxlength="6" name="otp" required>
         </div>
         <div class="verify-button-container">
            <input type="submit" value="Verify OTP">
         </div>
      </div>

      <div class="status-message"></div>

      <div class="field">
         <input type="submit" value="Signup" class="signup-btn" disabled>
      </div>
      <div class="signup-link">
         Already a member? <a href="" class="login-link-btn">Login now</a>
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

      // document.addEventListener('DOMContentLoaded', () => {
      //    document.querySelector('.send-otp-button').addEventListener('click', function() {
      //       const mobileNumber = document.getElementById('mobile-number').value;

      //       fetch('send_otp.php', {
      //             method: 'POST',
      //             headers: {
      //                'Content-Type': 'application/x-www-form-urlencoded'
      //             },
      //             body: new URLSearchParams({
      //                'mobile': mobileNumber
      //             })
      //          })
      //          .then(response => response.json())
      //          .then(data => {
      //             if (data.status === 'success') {
      //                document.querySelector('.otp-container').style.display = 'flex';
      //                document.getElementById('order_id').value = data.OrderID;
      //             } else {
      //                alert('Error sending OTP: ' + data.message);
      //             }
      //          })
      //          .catch(error => {
      //             console.error('Error:', error);
      //          });
      //    });
      //    document.addEventListener('DOMContentLoaded', () => {
      //       // Existing OTP sending logic...

      //       document.querySelector('.otp-container form').addEventListener('submit', function(event) {
      //          event.preventDefault();

      //          const otpValue = this.elements.otp.value;
      //          const mobileNumber = '91' + document.getElementById('mobile-number').value; // Assuming a country code
      //          const orderId = document.getElementById('order_id').value;

      //          fetch('verify_otp.php', {
      //                method: 'POST',
      //                headers: {
      //                   'Content-Type': 'application/x-www-form-urlencoded'
      //                },
      //                body: new URLSearchParams({
      //                   'mobile': mobileNumber,
      //                   'otp': otpValue,
      //                   'order_id': orderId
      //                })
      //             })
      //             .then(response => response.json())
      //             .then(data => {
      //                if (data.status === 'success') {
      //                   alert('OTP verified successfully!');
      //                   // Redirect or perform any action you need after successful verification
      //                   window.location.href = 'your_redirect_page.php'; // Change as necessary
      //                } else {
      //                   alert('Error verifying OTP: ' + data.message);
      //                }
      //             })
      //             .catch(error => {
      //                console.error('Error:', error);
      //             });
      //       });
      //    });

      //    // Add your OTP verification logic here
      // });
   });
</script>