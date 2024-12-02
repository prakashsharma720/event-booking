<?php
$code = $_GET['code'];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Send Verification | GWM </title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link
      href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Nerko+One&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet">


   <style>

      body {

         font-optical-sizing: auto;
         font-weight: 600;
         font-style: normal;
         font-variation-settings:
            "wdth" 100;
         display: flex;
         flex-direction: column;
         justify-content: flex-start;

         align-items: center;
         background-color: #e1ddc9;
         margin: 0;
         overflow-y: auto;

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
         padding: 10px 9px;
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

         .logout_icon {
            width: 20%;
         }
      }

      /* Responsive adjustments */
      @media (max-width: 767px) {
         .container {
            max-width: 100%;
         }

         .image-container img {
            max-width: 100%;
         }

         .header {
            padding: 5px 5px;
         }

         .logo-container img {
            max-width: 70px;
         }

         .logout_icon {
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
         text-decoration: none;
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
         <a href="https://glowupwithmanisha.com/" style="color:#fff;text-decoration:none;" class="btn"> Website</a>
         <a href="https://portal.glowupwithmanisha.com/" style="color:#fff;text-decoration:none;" class="btn">
            Profile</a>
      </div>
      <div class="btn-container" style="padding-left: 30px;">
         <!-- <a href="login.php" style="color:#fff;text-decoration:none; "> <img src="image/logout.png" class="logout_icon"> Logout</a> -->
      </div>
   </div>

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
         <div id="success-message"
            style="color: green; text-align: left; display: none;   padding: 10px; margin-top: 10px; border-radius: 5px;">
         </div>
         <div id="mobile-error-message"
            style="color: red; display: none; margin-top: 5px; padding: 10px;  text-align:left;   "></div>
         <input type="hidden" id="order_id" name="order_id" value="">

         <div class="otp-container" style="display: none;">
            <div class="field otp-inputs">
               <input type="text" maxlength="6" name="otp" required>
            </div>

            <div class="verify-button-container">
               <input type="submit" value="Verify OTP">
            </div>

         </div>
         <div id="otp-success-message"
            style="color: green; text-align: center; display: none; border: 1px solid green; padding: 10px; margin-top: 10px; border-radius: 5px;">
         </div>
         <div id="otp-error-message"
            style="color: red; display: none; margin-top: 5px; padding: 10px; text-align: left;"></div>

         <div class="signup-link">
            Go back ? <a href="login.php?code=<?= $code ?>" class="login-link-btn me-2">Login now</a>
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
                              <a href="https://glowupwithmanisha.com/disclaimer/" target="_blank" rel="noopener">Legal
                                 Disclaimer</a>
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
      document.querySelector('.send-otp-button').addEventListener('click', function () {
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

         document.getElementById('mobile-number').addEventListener('input', function () {
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
      document.getElementById('otp-form').addEventListener('submit', function (event) {
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