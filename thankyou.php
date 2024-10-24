<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: black;
            margin: 0;
            color: white;
            overflow: hidden;
        }

        .logo-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            max-width: 60%;
            backdrop-filter: blur(10px);
            animation: slideIn 0.5s forwards;
        }

        .image-container {
            animation: bounceIn 1s forwards;
            margin-bottom: 20px;
        }

        .details {
            animation: fadeIn 1s forwards;
            text-align: center;
        }

        h2 {
            color: #bb9433;
            margin-top: -10px;
            margin-bottom: 10px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
            animation: popIn 0.5s forwards;
        }

        p {
            color: black;
            margin: 5px 0;
            font-size: 16px;
            opacity: 0;
            animation: fadeInText 1s forwards;
        }

        p:nth-child(n) {
            animation-delay: calc(0.1s * var(--i));
            --i: 1; 
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes bounceIn {
            0% {
                transform: translateY(-100%);
                opacity: 0;
            }
            60% {
                transform: translateY(30%);
            }
            100% {
                transform: translateY(0);
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

        @keyframes fadeInText {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes popIn {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        img {
            max-width: 150px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .logo {
            max-width: 120px;
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

            .logo {
                max-width: 160px;
            }
        }
    </style>
</head>

<body>
    <div class="logo-container">
        <img src="logo-gwm.jpg" class="logo" alt="Logo">
    </div>
    <div class="container">
        <div class="image-container">
            <img src="https://www.funimada.com/assets/images/cards/big/congrats-1.gif" alt="Congratulations">
        </div>
        <div class="details">
            <h2>Booking Confirmation</h2>
            <p style="--i:1"><strong>Booking Date:</strong> <?= ($_SESSION['booking_date']) ?></p>
            <p style="--i:2"><strong>Event Name:</strong> <?= ($_SESSION['event_name']) ?></p>
            <p style="--i:3"><strong>Address:</strong> <?= ($_SESSION['address']) ?></p>
            <p style="--i:4"><strong>Total Amount:</strong> <?= ($_SESSION['net_payable_total']) ?></p>
            <p style="--i:5"><strong>Number of Tickets:</strong> <?= ($_SESSION['no_of_tickets']) ?></p>
            <p style="--i:6"><strong>Advance Payment:</strong> <?= ($_SESSION['advanced_pay']) ?></p>
            <p style="--i:7"><strong>Remaining Amount:</strong> <?= ($_SESSION['remaining_amount']) ?></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
