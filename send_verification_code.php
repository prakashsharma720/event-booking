<?php
$code = $_GET['code'];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Send Verification | GWM </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Nerko+One&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/send.css">
    <style>
    .wrapper {
        width: 100%;
        max-width: 420px;
        background: #fff;
        box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
        padding: 30px 25px;
        margin-bottom: 55px;
        margin-top: 50px;
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

    .send-otp-button:hover {
        background-color: #af921a;
    }


    .send-otp-container .send-otp-button,


    .send-otp-button,
    .verify-button-container input[type="submit"] {
        margin-top: 20px;
        height: 50px;
        border: none;
        border-radius: 5px;
        font-size: 15px;
        font-weight: 500;
        color: #fff;
        background: #cfbc6d;
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 8px 9px;
        width: 30%;
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

                    <input type="text" id="mobile-number" name="mobile" placeholder="Enter Mobile" required
                        maxlength="10">
                </div>
                <button type="button" class="send-otp-button">Verify</button>
            </div>
            <div class="otp-timer" style="display: none; color: red;"></div>
            <div id="success-message"
                style="color: green; text-align: left; display: none;   padding: 10px; margin-top: 10px; border-radius: 5px;">
            </div>
            <div id="mobile-error-message"
                style="color: red; display: none; margin-top: 5px; padding: 10px;  text-align:left;   "></div>
            <input type="hidden" id="order_id" name="order_id" value="">

            <!-- <div class="otp-container" style="display: none;">
                <div class="field otp-inputs">
                    <input type="text" maxlength="6" name="otp" required>
                </div>

                <div class="verify-button-container">
                    <input type="submit" value="Verify OTP">
                </div>

            </div> -->

            <div class="otp-container" style="display: none;">
                <div class="field otp-inputs">
                    <input type="text" maxlength="1" class="otp-box" id="otp-1" required>
                    <input type="text" maxlength="1" class="otp-box" id="otp-2" required>
                    <input type="text" maxlength="1" class="otp-box" id="otp-3" required>
                    <input type="text" maxlength="1" class="otp-box" id="otp-4" required>
                    <input type="text" maxlength="1" class="otp-box" id="otp-5" required>
                    <input type="text" maxlength="1" class="otp-box" id="otp-6" required>
                </div>
                <div class="verify-button-container">
                    <input type="button" value="Verify OTP" class="verify_otp">
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
                                        <a href="https://glowupwithmanisha.com/disclaimer/" target="_blank"
                                            rel="noopener">Legal
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

                    document.getElementById('otp-error-message').innerText =
                        'Incorrect OTP, please try again.';
                    document.getElementById('otp-error-message').style.display = 'block';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const otpInputs = document.querySelectorAll('.otp-box');
        const verifyButton = document.querySelector('.verify_otp');

        // Navigate through inputs automatically
        otpInputs.forEach((input, index) => {
            input.addEventListener('input', function(e) {
                if (this.value.length === 1) {
                    // Move to the next input
                    if (index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                }
            });

            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace') {
                    if (!this.value && index > 0) {
                        // Move to the previous input
                        otpInputs[index - 1].focus();
                    }
                }
            });

            input.addEventListener('keypress', function(e) {
                if (!/[0-9]/.test(e.key)) {
                    e.preventDefault(); // Only allow numbers
                }
            });
        });

        // Verify OTP on button click
        verifyButton.addEventListener('click', function() {
            const otp = Array.from(otpInputs)
                .map(input => input.value)
                .join('');

            if (otp.length === 6) {
                const mobileNumber = '91' + document.getElementById('mobile-number').value;
                const orderId = document.getElementById('order_id').value;

                // Send OTP for verification
                fetch('verify_otp.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            'mobile': mobileNumber,
                            'otp': otp,
                            'order_id': orderId,
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            document.getElementById('otp-success-message').innerText =
                                'OTP verified successfully!';
                            document.getElementById('otp-success-message').style.display = 'block';
                            window.location.href = 'reset_password.php?code=<?= $code ?>';
                        } else {
                            document.getElementById('otp-error-message').innerText =
                                'Incorrect OTP, please try again.';
                            document.getElementById('otp-error-message').style.display = 'block';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                document.getElementById('otp-error-message').innerText =
                    'Please enter all 6 digits of the OTP.';
                document.getElementById('otp-error-message').style.display = 'block';
            }
        });
    });
    </script>

</body>

</html>