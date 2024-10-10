
<?php
require 'db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['reset_password'])) {
        // Reset Password Logic
        $new_password = $_POST['new_password'];
        $mobile = $_SESSION['mobile'];
        $user_type = $_SESSION['user_type'];

     
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the password in the database
        $update_stmt = $conn->prepare("UPDATE users SET password = ? WHERE mobile = ? AND user_type = ?");
        $update_stmt->bind_param('sss', $hashed_password, $mobile, $user_type);
        if ($update_stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Password reset successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to reset password.']);
        }
        $update_stmt->close();
        exit();
    } else {
        // Existing OTP send logic
        $mobile = $_POST['mobile'];
        $user_type = $_POST['user_type'];

        
        $mobile_stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE mobile = ? AND user_type = ?");
        $mobile_stmt->bind_param('ss', $mobile, $user_type);
        $mobile_stmt->execute();
        $mobile_stmt->bind_result($mobile_count);
        $mobile_stmt->fetch();
        $mobile_stmt->close();

        if ($mobile_count > 0) {
            $_SESSION['user_type'] = $user_type;
            $_SESSION['mobile'] = $mobile;
            // OTP sending logic...
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Mobile number not registered.']);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Reset Password | CodeLab</title>
      <style>
         body {
            display: grid;
            height: 100%;
            width: 100%;
            place-items: center;
            background: black;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            margin-top: 80px;
         }
         .wrapper {
            width: 400px;
            background: #fff;
            box-shadow: 0px 15px 25px rgba(0, 0, 0, 0.2);
            padding: 30px 25px;
            border-radius: 10px;
            box-sizing: border-box;
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
         
        
         .popup {
            display: none;
            position: fixed;
            top: 50%;
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
            background-color: #ff0080;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
         }
         .popup button:hover {
            background-color: #e60074;
         }
         .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
            display: none;
         }
         @media (max-width: 480px) {
            .wrapper {
               width: 100%;
               padding: 20px;
               margin: 15px;
            }
         }
         .logo{
            width: 170px;
            margin-top: 20px;
         }
      </style>
   </head>
   <body>
      <div class="img">
         <img src="logo-gwm.jpg" class="logo">
      </div>
      <div class="wrapper">
        <div class="title">Reset Password</div>
        <form id="reset-password-form">
            <div class="field">
                <input type="password" id="new-password" name="new_password" placeholder="New Password" required>
            </div>
            <div class="field">
                <input type="password" id="confirm-password" placeholder="Confirm Password" required>
            </div>
            <div class="error" id="error-message">Passwords do not match.</div>
            <button type="submit" class="reset-password-button">Reset Password</button>
        </form>
    </div>
    <div class="popup" id="success-popup">
        <p>Password reset successfully!</p>
        <button onclick="closePopup()">OK</button>
    </div>
    <script>
        const form = document.getElementById('reset-password-form');
        const popup = document.getElementById('success-popup');
        const errorMessage = document.getElementById('error-message');
        const newPassword = document.getElementById('new-password');
        const confirmPassword = document.getElementById('confirm-password');

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            if (newPassword.value !== confirmPassword.value) {
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
                
                // Use Fetch API to send the new password to the server
                const formData = new FormData(form);
                formData.append('reset_password', true); // Indicate it's a reset password request

                fetch('your_php_script.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        popup.style.display = 'block';
                    } else {
                        alert(data.message);
                    }
                });
            }
        });

        function closePopup() {
            popup.style.display = 'none';
            window.location.href = 'login.php';  
        }
    </script>
</body>
</html>