<?php

include 'db.php';
$error_message = '';
// echo $_GET['code'];exit;

if (empty($_GET['code'])) {
   header('Location: https://glowupwithmanisha.com/upcoming-event/');
} else {
   $code = trim($_GET['code']);

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
                  $_SESSION['event_code'] = $code;

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
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login and Signup Forms | GWM</title>
   <link rel="stylesheet" href="login.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <style>
      body {
         background-color: #e1ddc9;
      }

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

      .send-otp-container span {
         margin-left: 10px;
         font-weight: bold;
         color: #cfbc6d;
         margin-top: 23px;
      }

      .status-message,
      .status-message-otp-sent {
         margin: 25px 0;
         padding: 10px;
         border-radius: 5px;
      }

      .send-otp-container {
         position: relative;
      }

      .time-display {
         position: absolute;
         bottom: -24px;
         left: -5px;
         font-weight: bold;
         color: #cfbc6d;
      }

      .status-message-otp-sent,
      .status-message-otp-verified {
         color: green;
         background-color: #d4edda;
         border: 1px solid green;
         padding: 10px;
         border-radius: 5px;
      }

      .status-message-otp-verified {
         margin-top: 20px;
         color: green;
         display: none;
         text-align: left;
         margin-right: 10px;
      }

      .error-message-otp-sent {
         border: 1px solid red;
         background-color: #f8d7da;
         color: red;
         padding: 10px;
         border-radius: 5px;
         margin-top: 10px;
      }

      .otp-inputs input {
         border: 1px solid #ccc;
         transition: border 0.3s;
      }

      .otp-inputs input.error {
         border: 1px solid red;
      }

      .otp-inputs input.success {
         border: 1px solid green;
      }

      .error-message-otp {
         color: red;
         display: block;
         border: 1px solid red;
         border-radius: 5px;
         padding: 2px;
         margin-top: 11px;
         background-color: #f8d7da;
      }

      /* Header Style */
      .header {
            width: 100%;
            background-color: black;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 80px;
        }

        .logo-container img {
            max-width: 100px;
            padding-left: 5px;
        }

        .header .btn-container {
            display: flex;
            gap: 15px;
        }

        .header .btn-container .btn {
            /* background-color: #bb9433; */
            color: white;
            border: none;
            padding: 8px 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .button {
            background-color: #ee2828;
            color: white;
            border: none;
            padding: 8px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #ca2424;
        }

        .header .btn-container .btn:hover {
            background-color: #a0822e;
        }
      * {
         box-sizing: border-box;
         font-weight: 600;
      }


      .wrapper {
         width: 100%;
         max-width: 450px;
         background: #fff;
         box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
         padding: 20px;
         margin: 40px auto;
      }

      .wrapper .login-wrapper,
      .wrapper .signup-wrapper {
         display: none;
      }

      .wrapper.active {
         display: block;
      }

      .wrapper .title {
         font-size: 24px;
         font-weight: 700;
         text-align: center;
         margin-bottom: 30px;
      }

      .wrapper input {
         width: 100%;
         padding: 10px;
         margin-bottom: 15px;
         border: 1px solid #ccc;
         border-radius: 5px;
         font-size: 16px;
      }

      .wrapper .login-btn,
      .wrapper .signup-btn {
         background-color: #f39c12;
         color: white;
         padding: 10px;
         border: none;
         border-radius: 5px;
         width: 100%;
         font-size: 18px;
         cursor: pointer;
      }

      .wrapper .login-btn:hover,
      .wrapper .signup-btn:hover {
         background-color: #e67e22;
      }

   
      @media (min-width: 768px) {
            .container {
                flex-direction: row;
            }

            .image-container {
                margin-right: 40px;
                margin-bottom: 0;
            }

            .details {
                text-align: left;
            }

            img {
                max-width: 200px;
            }

            .logo-container img {
                max-width: 160px;
            }
            .logout_icon{
                width: 20%;
            }
        }
         /* Responsive adjustments */
       @media (max-width: 767px) {
            .container {
                max-width: 100%;
            }
            .image-container img{
               max-width: 100%;  
            }
            .header {
                padding: 5px 5px;
            }
            .logo-container img {
                max-width: 70px;
            }
            .logout_icon{
                width: 50%;
            }
        }

 
        footer {
            background-color: #555;
            color: white;
            padding: 30px;
            width: 100%;
        }

        .footer_v1 .container1 {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer_v1 .row {
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .footer_v1 .col-sm-6 {
            flex: 0 0 48%;

            padding: 0 10px;
        }

        .footer_v1 .widget-title {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .footer_v1 .textwidget custom-html-widget ul {
            list-style-type: none;
            padding-left: 0;

            padding: 5px;
        }

        .footer_v1 .textwidget custom-html-widget li {
            margin-bottom: 8px;

        }

        .footer_v1 .textwidget.custom-html-widget a {
            color: white;
            font-weight: 600;

        }

        .footer_v1 .textwidget.custom-html-widget a:hover {
            text-decoration: underline;
            color: white;
        }

        .footer_v1 .textwidget custom-html-widget a:hover {
            text-decoration: underline;
        }


        .footer_v1 .wrap_bellow {
            background-color: black;

            color: white;
        }

        .footer_v1 .wrap_bellow .container1 .row {
            justify-content: center;
            text-align: center;
        }

        .footer_v1 .wrap_bellow .container1 .row .col-sm-12 {
            margin-top: 10px;
        }
   </style>
</head>

<body>
     <!-- Header Section -->
     <div class="header">
        <div class="logo-container">
            <img src="logo-gwm.jpg" class="logo" alt="Logo">
        </div>

        <!-- Center Buttons -->
        <div class="btn-container">
            <a href="https://glowupwithmanisha.com/" class="btn"> Website</a>
            <a href="https://portal.glowupwithmanisha.com/" class="btn"> Profile</a>
        </div>
        <div class="btn-container" style="padding-left: 30px;">
            
        </div>

        
    </div>
   <div class="wrapper login-wrapper <?php if (!isset($_GET['error'])) echo 'active'; ?>">
      <?php if (!empty($error_message)): ?>
         <div class="error-message">
            <?php echo htmlspecialchars($error_message); ?>
         </div>
      <?php endif; ?>
      <div class="title">Login Form</div>
      <form action="#" method="POST">
         <input type="hidden" name="user_type" value="participant">
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
               <a href="send_verification_code.php?code=<?= $code ?>" target="_blank">Forgot password?</a>
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
         <input type="hidden" name="user_type" value="participant">
         <!-- <div class="role-selection">
                  <label>
                     <input type="radio" id="user_type" name="user_type" value="participant" checked> Participant
                  </label>
                  <label>
                     <input type="radio" id="user_type" name="user_type" value="visitor"> Visitor
                  </label>
               </div> -->

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
         <div class="status-message-otp-sent" style="  display: none;"></div>
         <div class="error-message-otp-sent" style=" display: none;"></div>
         <input type="hidden" id="order_id" name="order_id" value="">

         <div class="otp-container" style="display: none;">
            <div class="field otp-inputs">
               <input type="text" maxlength="6" name="otp" required id="otp_box">
               <div class="error-message-otp" style="color: red; display: none;"></div> <!-- Error Message Container -->
            </div>
            <div class="verify-button-container">
               <input type="button" value="Verify OTP" class="verify_otp">
            </div>


         </div>
         <div class="status-message-otp-verified" style="color: green; display: none;"></div>
         <div class="status-message"></div>

         <div class="field">
            <input type="submit" value="Signup" class="signup-btn">
         </div>
         <div class="signup-link">
            Already a member? <a href="#" class="login-link-btn">Login now</a>
         </div>
      </form>
   </div>

   <footer class="footer_v1 ova-trans" style="background:#000;">
        <div class="wrap_widget">
            <div class="container1">
                <div class="row">
                    <div class="col-sm-4 category pd_0 pd_l_0">
                        <div id="media_image-3" class="widget widget_media_image">
                            <img width="150" height="150"
                                src="https://glowupwithmanisha.com/wp-content/uploads/2024/08/file-150x150.jpg"
                                class="image wp-image-12947  attachment-thumbnail size-thumbnail" alt=""
                                style="max-width: 100%; height: auto;" decoding="async" loading="lazy"
                                srcset="https://glowupwithmanisha.com/wp-content/uploads/2024/08/file-150x150.jpg 150w, https://glowupwithmanisha.com/wp-content/uploads/2024/08/file-300x300.jpg 300w, https://glowupwithmanisha.com/wp-content/uploads/2024/08/file-600x600.jpg 600w, https://glowupwithmanisha.com/wp-content/uploads/2024/08/file-100x100.jpg 100w, https://glowupwithmanisha.com/wp-content/uploads/2024/08/file.jpg 640w"
                                sizes="(max-width: 150px) 100vw, 150px">
                        </div>
                    </div>
                    <div class="col-sm-4 gallery pd_0">
                        <div id="custom_html-9" class="widget_text widget widget_custom_html">
                            <h4 class="widget-title">Quick Links</h4>
                            <div class="textwidget custom-html-widget">
                                <ul style="color:white">
                                    <li>
                                        <a href="https://glowupwithmanisha.com/terms-conditions/" target="_blank"
                                            rel="noopener">Terms &amp; conditions</a>
                                    </li>
                                    <li>
                                        <a href="https://glowupwithmanisha.com/privacy-policies/" target="_blank"
                                            rel="noopener">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="https://glowupwithmanisha.com/disclaimer/" target="_blank"
                                            rel="noopener">Legal Disclaimer</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 tags  pd_0 pd_r_0">
                        <div id="custom_html-4" class="widget_text widget widget_custom_html">
                            <h4 class="widget-title">Contact Details</h4>
                            <div class="textwidget custom-html-widget">
                                <p style="color:white">
                                    <strong>Phone -</strong> +91 98204 90762 / +91 98204 90460
                                </p>
                                <p style="color:white"><strong>Email -</strong> glowupwithmanisha@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrap_bellow">
            <div class="container1">
                <div class="row">
                    <div class="col-sm-12 pd_0 logo_white text-center">
                        <div id="custom_html-7" class="widget_text widget widget_custom_html">
                            <div class="textwidget custom-html-widget">
                                <p style="color:white">Copyright ©2024 Glow Up with Manisha, All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
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
            const userType = 'participant';

            if (document.getElementById('mobile-number').hasAttribute('readonly')) {

               return;
            }
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
                  const otpSentMessage = document.querySelector('.status-message-otp-sent');
                  otpSentMessage.style.display = 'block';
                  otpSentMessage.classList.remove('error-message-otp-sent');
                  console.log('result' + data.OrderID);
                  if (data.status === 'success') {
                     otpSentMessage.innerText = 'OTP sent successfully!';
                     document.querySelector('.otp-container').style.display = 'flex';
                     document.getElementById('order_id').value = data.OrderID;


                     document.getElementById('mobile-number').setAttribute('readonly', 'readonly');

                     setTimeout(() => {
                        otpSentMessage.style.display = 'none';
                     }, 3000);


                     startOtpTimer();
                  } else {
                     otpSentMessage.classList.add('error-message-otp-sent');

                     otpSentMessage.innerText = data.message || 'Error sending OTP. Please try again.';


                     setTimeout(() => {
                        otpSentMessage.style.display = 'none';
                     }, 3000);

                  }

               })
               .catch(error => {
                  console.error('Error:', error);
                  alert('Failed to send OTP. Please try again later.');
               });
         });

         function startOtpTimer() {
            const button = document.querySelector('.send-otp-button');
            let timer = 60;

            button.disabled = true;
            button.style.display = 'none';

            const timerDisplay = document.createElement('span');
            timerDisplay.className = 'time-display';
            timerDisplay.style.marginLeft = '10px';
            timerDisplay.style.fontWeight = 'bold';
            timerDisplay.style.color = '#cfbc6d';
            timerDisplay.innerText = `Please wait ${timer} seconds...`;
            document.querySelector('.send-otp-container').appendChild(timerDisplay);

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
         document.querySelector('.verify_otp').addEventListener('click', function(event) {
            event.preventDefault();

            const otpValue = document.getElementById('otp_box').value;
            const mobileNumber = '91' + document.getElementById('mobile-number').value;
            const orderId = document.getElementById('order_id').value;
            const otpErrorMessage = document.querySelector('.error-message-otp');
            const otpInput = document.getElementById('otp_box');

            otpErrorMessage.style.display = 'none';
            otpErrorMessage.innerText = '';
            otpInput.classList.remove('error');


            if (!/^\d{6}$/.test(otpValue)) {
               otpErrorMessage.style.display = 'block';
               otpErrorMessage.innerText = 'Please enter a valid 6-digit OTP.';
               otpInput.classList.add('error');
               return;
            }

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
                  const otpverifyMessage = document.querySelector('.status-message-otp-verified');
                  const otpInputContainer = document.querySelector('.otp-inputs'); // Reference to the OTP input container
                  const verifyButton = document.querySelector('.verify_otp'); // Reference to the verify button

                  if (data.status === 'success') {
                     otpverifyMessage.style.display = 'block';
                     otpverifyMessage.innerText = 'OTP Verified successfully!';


                     otpInputContainer.style.display = 'none';
                     verifyButton.style.display = 'none';

                     setTimeout(() => {
                        otpverifyMessage.style.display = 'none';
                     }, 3000);
                  } else {
                     otpErrorMessage.style.display = 'block';
                     otpErrorMessage.innerText = 'Incorrect OTP. Please try again..';
                     otpInput.classList.add('error');
                  }
               })
               .catch(error => {
                  console.error('Error:', error);
                  alert('Failed to verify OTP. Please try again later.');
               });

         });

      });
   </script>
</body>

</html>