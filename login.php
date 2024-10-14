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

      .verify-button-container .verify_otp {
         margin-top: 20px;
         height: 50px;
         border: none;
         border-radius: 5px;
         font-size: 18px;
         font-weight: 500;
         color: #fff;
         background: #cfbc6d;
         cursor: pointer;
         transition: all 0.3s ease;
         padding: 8px 9px;
      }

      .verify-button-container .verify_otp:hover {
         background-color: #e60074;
      }
   </style>
   <!-- OTPLESS SDK -->

</head>

<body>


   <div class="img">
      <img src="logo-gwm.jpg" class="logo">
   </div>
   <div class="wrapper login-wrapper <?php if (!isset($_GET['error'])) echo "active"; ?>">
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
               <a href="send_verification_code.php " target="_blank">Forgot password?</a>
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
               <input type="text" id="mobile-number" name="mobile" placeholder="Enter Mobile" required>
            </div>
            <button type="button" class="send-otp-button">Send OTP</button>
         </div>

         <input type="hidden" id="order_id" name="order_id" value="">

         <div class="otp-container" style="display: none;">
            <div class="field otp-inputs">
               <input type="text" maxlength="6" name="otp" required id="otp_box">
            </div>
            <div class="verify-button-container">
               <input type="button" value="Verify OTP" class="verify_otp">
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

         document.querySelector('.send-otp-button').addEventListener('click', function() {
            const mobileNumber = document.getElementById('mobile-number').value;
            const userType = document.querySelector('input[name="user_type"]:checked').value;


            fetch('send_otp2.php', {
                  method: 'POST',
                  headers: {
                     'Content-Type': 'application/x-www-form-urlencoded'
                  },
                  body: new URLSearchParams({
                     'mobile': mobileNumber,
                  })
               })
               .then(response => response.json())
               .then(data => {
                  console.log('result' + data.OrderID);
                  if (data.status === 'success') {
                     document.querySelector('.otp-container').style.display = 'flex';
                     document.getElementById('order_id').value = data.OrderID;


                     startOtpTimer();
                  } else {
                     alert('Error sending OTP: ' + data.message);
                  }
               })
               .catch(error => {
                  console.error('Error:', error);
               });
         });
         // Timer function
         function startOtpTimer() {
            const button = document.querySelector('.send-otp-button');
            let timer = 60;

            button.disabled = true; // Disable the button
            button.style.display = 'none'; // Hide the button

            const timerDisplay = document.createElement('span'); // Create a timer display element
            timerDisplay.innerText = `Please wait ${timer} seconds...`;
            document.querySelector('.send-otp-container').appendChild(timerDisplay); // Add timer display to the container

            const countdown = setInterval(() => {
               timer--;
               timerDisplay.innerText = `Please wait ${timer} seconds...`;

               if (timer <= 0) {
                  clearInterval(countdown);
                  button.disabled = false;  
                  button.style.display = 'block';  
                  timerDisplay.remove();  
               }
            }, 1000);
         }

         document.querySelector('.verify_otp').addEventListener('click', function() {
            event.preventDefault();

            const otpValue = document.getElementById('otp_box').value;
            const mobileNumber = '91' + document.getElementById('mobile-number').value;
            const orderId = document.getElementById('order_id').value;

            fetch('verify_otp.php', {
                  method: 'POST',
                  headers: {
                     'Content-Type': 'application/x-www-form-urlencoded'
                  },
                  body: new URLSearchParams({
                     'mobile': mobileNumber,
                     'otp': otpValue,
                     'order_id': orderId
                  })
               })
               .then(response => response.json())
               .then(data => {
                  // console.log('response data'+response_data);
                  if (data.status === 'success') {
                     alert('OTP verified successfully!');

                  } else {
                     alert('Error verifying OTP: ' + data.message);
                  }
               })
               .catch(error => {
                  console.error('Error:', error);
               });
         });
      });
   </script>
</body>

</html>