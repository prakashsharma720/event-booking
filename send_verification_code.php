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
         display: grid;
         height: 100%;
         width: 100%;
         place-items: center;
         background-color: black;
         font-family: Arial, sans-serif;
         margin-top: 80px;
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
         border-radius: 10px;
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

      .send-otp-button:hover,
      .otp-container .verify-button-container input[type="submit"]:hover {
         background: #e60074;
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
   </style>

</head>

<body>
   <div class="img">
      <img src="logo-gwm.jpg" class="logo">
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

               <input type="text" id="mobile-number" name="mobile" placeholder="Enter Mobile" required>
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
      </form>
   </div>
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