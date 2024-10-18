<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #686868;
            margin: 0;
        }

        .container {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            background: black;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(255, 215, 0, 0.5);
            max-width: 622px;
            width: 100%;
        }

        .image-container {
            animation: slideIn 1s forwards;
            margin-right: 65px;
        }

        .details {
            animation: fadeIn 1s forwards;
        }

        h2,
        h3 {
            margin: 0 0 10px;
        }

        h2 {
            color: #f5cc65;
        }

        p {
            color: #f5cc65;
            margin: 8px 0;
            cursor: pointer;
        }

        @keyframes slideIn {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        img {
            max-width: 200px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="image-container">
            <img src="https://www.funimada.com/assets/images/cards/big/congrats-1.gif" alt="Congratulations">
        </div>
        <div class="details">
            <h2>Booking Confirmation</h2>
            <b> Total amount : <?= $_SESSION['net_payable_total'] ?></b>
            <p><strong>Name:</strong> Jayesh patel</p>
            <p><strong>Date:</strong> 2024-09-24</p>
            <p><strong>Time:</strong> 3:00 PM</p>
            <p><strong>Location:</strong> 1234 Sample St, City, State</p>

            <p><strong>Event Name:</strong> Sample Event</p>
            <p><strong>Start Date:</strong> 24-Sep-24, 03:00 PM</p>
            <p><strong>Contact No:</strong> +91 9820490762 / +91 9820490460</p>
            <p><strong>Email:</strong> <a href="mailto:jayeshpatel.muskowl@gmail.com">jayeshpatel.muskowl@gmail.com</a></p>
        </div>
    </div>
</body>

</html>