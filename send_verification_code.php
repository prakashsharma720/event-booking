<?php
$code = $_GET['code'];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Send Verification Code | CodeLab</title>
   <style>
      body {

         height: 100%;
         width: 100%;
         place-items: center;
         background-color: #e1ddc9;
         font-family: Arial, sans-serif;
         padding: 0;
         margin: 0;
      }

      .logo {
         width: 170px;
         margin-top: 20px;
      }

      .wrapper {
         width: 420px;
         background: #fff;
         box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
         padding: 30px 25px;
         margin-bottom: 55px;
         margin-top: 50px;
      }

      .title {
         font-size: 30px;
         font-weight: 700;
         text-align: center;
         color: #333;
         margin-bottom: 25px;
      }

      .field {
         height: 50px;
         width: 100%;
         margin-top: 20px;
         position: relative;
      }

      .field input {
         height: 100%;
         width: 100%;
         outline: none;
         font-size: 16px;
         padding-left: 20px;
         border: 1px solid #ddd;
         border-radius: 5px;
         transition: all 0.3s ease;
         box-sizing: border-box;
      }

      /* Common styles for both Send OTP and Verify OTP containers */
      .send-otp-container,
      .otp-container {
         display: flex;
         width: 100%;
         gap: 10px;

      }

      .otp-container {
         display: none;

         margin-top: 20px;
      }

      .otp-container.active {
         display: flex;

      }

      .send-otp-container .mobile-number,
      .otp-container .otp-inputs {
         flex: 70%;

      }

      .send-otp-container .send-otp-button,
      .otp-container .verify-button-container {
         flex: 30%;

      }

      .send-otp-button,
      .otp-container .verify-button-container input[type="submit"] {
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
         padding: 15px 9px;
         flex: 30%;
      }



      .otp-container .field input {
         flex: 70%;
         height: 50px;
         text-align: center;
         margin-right: 10px;
         border: 1px solid lightgrey;
         border-radius: 5px;
         font-size: 17px;
         transition: all 0.3s ease;
      }

      .otp-container .field input:focus,
      .otp-container .field input:valid {
         border-color: #4158d0;
      }

      .verify-button-container {
         flex: 30%;
      }

      .role-selection {
         display: flex;
         justify-content: space-around;
         margin-top: 20px;
      }

      .role-selection label {
         font-size: 16px;
         font-weight: 500;
         cursor: pointer;
         display: flex;
         align-items: center;
         padding: 10px;
         border: 1px solid #ddd;
         border-radius: 5px;
         transition: background-color 0.3s ease, border-color 0.3s ease;
      }

      .role-selection input[type="radio"] {
         margin-right: 10px;
      }

      .role-selection label:hover {
         background-color: #f0f0f0;
         border-color: #4158d0;
      }

      .role-selection input[type="radio"]:checked+label {
         background-color: #cfbc6d;
         color: #fff;
         border-color: #cfbc6d;
      }

      .signup-link {

         margin-top: 20px;
         text-align: center;
         font-size: 18px;
      }

      .signup-link a {
         color: #cfbc6d;
         text-decoration: none;
         font-weight: bold;

      }

      .signup-link a:hover {
         text-decoration: underline;
      }

      .header {
         display: flex;
         justify-content: space-between;
         align-items: center;
         padding: 5px;
         background-color: black;
         color: white;
         width: 100%;
      }

      .header .logo {
         width: 120px;
         height: auto;
         padding: 1px 40px;
      }

      .header .logout-btn {
         padding: 10px 20px;
         background-color: #b62b2b;
         color: white;
         font-weight: bold;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         text-decoration: none;
         font-size: 16px;
      }

      .header .button {
         padding: 10px 20px;
         background-color: #bb9433;
         color: white;
         font-weight: bold;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         text-decoration: none;
         font-size: 16px;
      }

      .header .logout-btn:hover {
         background-color: #a12727;
      }

      .logout-hidden {
         display: none;
      }


      .profile-container {
         display: flex;
         align-items: center;
      }

      .profile-icon img {
         width: 45px;
         height: 45px;
         border-radius: 50%;
      }

      footer {
         background-color: #555;
         color: white;
         padding: 30px;
      }

      .footer_v1 .container {
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

      .footer_v1 .wrap_bellow .container .row {
         justify-content: center;
         text-align: center;
      }

      .footer_v1 .wrap_bellow .container .row .col-sm-12 {
         margin-top: 10px;
      }
   </style>

</head>

<body>
   <header class="header">
      <div class="logo-container">
         <img src="logo-gwm.jpg" alt="GWM Logo" class="logo">
      </div>
      <div class="logout-container">
         <a href="https://glowupwithmanisha.com/" class="button me-2">Go Website</a>
         <a href="https://portal.glowupwithmanisha.com/" class="button">Go Admin portal </a>
      </div>


      <div class="profile-container profile-hidden">

         <a href="profile.php" class="profile-icon">
            <!-- <img src="https://images.rawpixel.com/image_png_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIzLTAxL3JtNjA5LXNvbGlkaWNvbi13LTAwMi1wLnBuZw.png" alt="Profile Icon" class="profile-img"> -->
         </a>
      </div>


      <div class="logout-container logout-hidden">
         <a href="login.php?code=<?= $code ?>" class="logout-btn">Logout</a>
      </div>
   </header>
   <br>
   <div class="wrapper">
      <div class="title">Send Verification </div>
      <div id="error-message" style="color: red; text-align: center;"></div>
      <form id="otp-form" action="#" method="POST">
         <input type="hidden" name="user_type" value="participant">
         <!-- <div class="role-selection">
            <label>
               <input type="radio" name="user_type" id="user_type" value="Participant" checked> Participant
            </label>
            <label>
               <input type="radio" name="user_type" value="Visitor" id="user_type"> Visitor
            </label>
         </div> -->

         <div class="send-otp-container">

            <div class="field mobile-number">

               <input type="text" id="mobile-number" name="mobile" placeholder="Enter Mobile" required maxlength="10">
            </div>
            <button type="button" class="send-otp-button">Send OTP</button>
         </div>
         <div id="success-message" style="color: green; text-align: left; display: none;   padding: 10px; margin-top: 10px; border-radius: 5px;"></div>
         <div id="mobile-error-message" style="color: red; display: none; margin-top: 5px; padding: 10px;  text-align:left;   "></div>
         <input type="hidden" id="order_id" name="order_id" value="">

         <div class="otp-container" style="display: none;">
            <div class="field otp-inputs">
               <input type="text" maxlength="6" name="otp" required>
            </div>

            <div class="verify-button-container">
               <input type="submit" value="Verify OTP">
            </div>

         </div>
         <div id="otp-success-message" style="color: green; text-align: center; display: none; border: 1px solid green; padding: 10px; margin-top: 10px; border-radius: 5px;"></div>
         <div id="otp-error-message" style="color: red; display: none; margin-top: 5px; padding: 10px; text-align: left;"></div>

         <div class="signup-link">
            Go back ? <a href="login.php?code=<?= $code ?>" class="login-link-btn me-2">Login now</a>
         </div>

      </form>
   </div>

   <footer class="footer_v1 ova-trans" style="background:#000; width: 100%;">
      <div class="wrap_widget">
         <div class="container">
            <div class="row">
               <div class="col-sm-4 category pd_0 pd_l_0">
                  <div id="media_image-3" class="widget widget_media_image" style="padding: 0px 40px;">
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
                     <div class="textwidget custom-html-widget ">
                        <ul style="color:white  ">
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

               <div class="col-sm-4 tags  pd_0 pd_r_0 ">
                  <div id="custom_html-4" class="widget_text widget widget_custom_html" style="padding: 0px 8px;">
                     <h4 class="widget-title">Contact Details</h4>
                     <div class="textwidget custom-html-widget" style="font-weight: 700;">
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
         <div class="container">
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
      document.querySelector('.send-otp-button').addEventListener('click', function() {
         const mobileNumber = document.getElementById('mobile-number').value;
         const userType = 'participant';

         fetch('send_otp.php', {
               method: 'POST',
               headers: {
                  'Content-Type': 'application/x-www-form-urlencoded'
               },
               body: new URLSearchParams({
                  'mobile': mobileNumber,
                  'user_type': userType
               })
            })
            .then(response => response.json())
            .then(data => {
               if (data.status === 'success') {
                  document.querySelector('.otp-container').style.display = 'flex';
                  document.getElementById('order_id').value = data.OrderID;
                  showSuccessMessage('OTP sent successfully!');
                  document.getElementById('mobile-error-message').style.display = 'none';
               } else {
                  document.getElementById('mobile-error-message').innerText = data.message;
                  document.getElementById('mobile-error-message').style.display = 'block';
                  document.getElementById('mobile-number').style.border = '1px solid red';
               }
            })
            .catch(error => {
               console.error('Error:', error);
            });

         document.getElementById('mobile-number').addEventListener('input', function() {
            this.style.border = '';
            document.getElementById('mobile-error-message').style.display = 'none';
         });
      });

      // Function to show success messages
      function showSuccessMessage(message) {
         const successMessage = document.getElementById('success-message');
         successMessage.innerText = message;
         successMessage.style.display = 'block';

         setTimeout(() => {
            successMessage.style.display = 'none';
         }, 3000); // Hide after 3 seconds
      }
      document.getElementById('otp-form').addEventListener('submit', function(event) {
         event.preventDefault();

         const otpValue = this.elements.otp.value;
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

               document.getElementById('otp-success-message').style.display = 'none';
               document.getElementById('otp-error-message').style.display = 'none';

               if (data.status === 'success') {
                  document.getElementById('otp-success-message').innerText = 'OTP verified successfully!';
                  document.getElementById('otp-success-message').style.display = 'block';
                  window.location.href = 'reset_password.php?code=<?= $code ?>';
               } else {

                  document.getElementById('otp-error-message').innerText = 'Incorrect OTP, please try again.';
                  document.getElementById('otp-error-message').style.display = 'block';
               }
            })
            .catch(error => {
               console.error('Error:', error);
            });
      });
   </script>

</body>

</html>