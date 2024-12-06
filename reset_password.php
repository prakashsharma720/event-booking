<?php
session_start();

$code = $_GET['code'];
require 'db.php';

if (!isset($_SESSION['user_type']) || !isset($_SESSION['mobile'])) {
   echo json_encode(['success' => false, 'message' => 'User not authenticated.']);
   exit();
}

$user_type = $_SESSION['user_type'];
$mobile = $_SESSION['mobile'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $new_password = $_POST['new_password'];
   $confirm_password = $_POST['confirm_password'];

   // echo "<pre>";print_r($_POST);exit;

   if ($new_password === $confirm_password) {
      $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

      $sql = "UPDATE users SET password = ? WHERE mobile = ? AND user_type = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("sss", $hashed_password, $mobile, $user_type);

      if ($stmt->execute()) {
         echo json_encode(['success' => true]);
      } else {
         echo json_encode(['success' => false, 'message' => $stmt->error]);
      }

      $stmt->close();
   } else {
      echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
   }

   $conn->close();
   exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta charset="utf-8">
   <title>Reset Password | GWM</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <style>
      @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

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
         background-color: #e5e5e5;
         margin: 0;
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


      .wrapper {
         width: 400px;
         background: #fff;
         box-shadow: 0px 15px 25px rgba(0, 0, 0, 0.2);
         padding: 30px 25px;
         box-sizing: border-box;
         margin: 40px auto;
      }

      .title {
         font-size: 28px;
         font-weight: 700;
         text-align: center;
         color: #333;
         margin-bottom: 25px;
      }

      .field {
         height: 50px;
         width: 100%;
         margin-top: 15px;
         position: relative;
      }

      .field input {
         height: 100%;
         width: 100%;
         outline: none;
         font-size: 16px;
         padding: 0 15px;
         border: 1px solid #ddd;
         border-radius: 5px;
         transition: all 0.3s ease;
         box-sizing: border-box;
      }

      .field input:focus {
         border-color: #ff0080;
      }

      .reset-password-button {
         width: 100%;
         margin-top: 20px;
         height: 50px;
         border: none;
         border-radius: 5px;
         font-size: 18px;
         font-weight: 600;
         color: #fff;
         background: #cfbc6d;
         cursor: pointer;
         transition: background 0.3s ease;
      }

      .reset-password-button:hover {
         background-color: #af921a;
      }

      .popup {
         display: none;
         position: fixed;
         top: 30%;
         left: 50%;
         transform: translate(-50%, -50%);
         width: 300px;
         padding: 20px;
         background-color: #fff;
         box-shadow: 0px 15px 25px rgba(0, 0, 0, 0.2);
         text-align: center;
         border-radius: 10px;
         z-index: 100;
      }

      .popup button {
         margin-top: 20px;
         padding: 10px 20px;
         background-color: #cfbc6d;
         border: none;
         color: white;
         border-radius: 5px;
         cursor: pointer;
      }

      .popup button:hover {
         background-color: #bc9b0f
      }

      .error {
         color: red;
         font-size: 14px;
         margin-top: 10px;
         display: none;
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

      @media (max-width: 480px) {
         .wrapper {
            width: 100%;
            padding: 20px;
            margin: 15px;
         }
      }

      .logo {
         width: 170px;
         margin-top: 20px;
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
         <a href="login.php?code=<?= $code ?>">
            <img src="logo-gwm.jpg" class="logo" alt="Logo">
         </a>
      </div>


      <!-- Center Buttons -->
      <div class="btn-container">
         <a href="https://glowupwithmanisha.com/" class="btn"> Website</a>
         <a href="https://portal.glowupwithmanisha.com/" class="btn"> Profile</a>
      </div>
      <div class="btn-container" style="padding-left: 30px;">

      </div>
   </div>

   <div class="wrapper">
      <div class="title">Reset Password</div>
      <form id="reset-password-form">
         <div class="field">
            <input type="password" id="new-password" name="new_password" placeholder="New Password" required>
         </div>
         <div class="field">
            <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm Password"
               required>
         </div>
         <div class="error" id="error-message">Passwords do not match.</div>
         <button type="submit" class="reset-password-button">Reset Password</button>
         <div class="signup-link">
            Go back ? <a href="login.php?code=<?= $code ?>" class="login-link-btn me-2">Login now</a>
         </div>
      </form>
   </div>
   <div class="popup" id="success-popup">
      <p>Password reset successfully!</p>
      <button onclick="closePopup()">OK</button>
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
      const form = document.getElementById('reset-password-form');
      const popup = document.getElementById('success-popup');
      const errorMessage = document.getElementById('error-message');
      const newPassword = document.getElementById('new-password');
      const confirmPassword = document.getElementById('confirm-password');

      form.addEventListener('submit', function (event) {
         event.preventDefault();
         if (newPassword.value !== confirmPassword.value) {
            errorMessage.style.display = 'block';
         } else {
            errorMessage.style.display = 'none';


            fetch('', {
               method: 'POST',
               headers: {
                  'Content-Type': 'application/x-www-form-urlencoded'
               },
               body: new URLSearchParams(new FormData(form)).toString()
            })
               .then(response => response.json())
               .then(data => {
                  if (data.success) {
                     popup.style.display = 'block';
                  } else {
                     errorMessage.textContent = data.message;
                     errorMessage.style.display = 'block';
                  }
               });
         }
      });

      function closePopup() {
         popup.style.display = 'none';
         window.location.href = 'login.php?code=<?= $code ?>';
      }
   </script>
</body>

</html>