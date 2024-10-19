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
            background: linear-gradient(to bottom right, #000, #444);
            margin: 0;
            color: white;
        }

        .logo-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }

        .container {
            display: flex;
            flex-direction: row;
            align-items: center;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 90%;
            backdrop-filter: blur(10px);
        }

        .image-container {
            animation: bounceIn 1s forwards;
            margin-right: 40px;
        }

        .details {
            animation: fadeIn 1s forwards;
            flex: 1;
            text-align: left;
        }

        h2 {
            color: #bb9433;
            margin-top: -27px;
            margin-bottom: 13px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
        }

        p {
            color: black;
            margin: 5px 0;
            font-size: 16px;
        }
b{
    color: black;
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

        img {
            max-width: 200px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .logo {
            max-width: 160px;
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
            <p><strong>Booking Date:</strong> <?= ($_SESSION['booking_date']) ?><p>
            <p><strong>Event Name:</strong> <?= ($_SESSION['event_name']) ?></p>
            <p><strong>Address:</strong> <?= ($_SESSION['address']) ?></p>
            <p><strong>Total Amount:</strong> <?= ($_SESSION['net_payable_total']) ?></p>
            <p><strong>Number of Tickets:</strong> <?= ($_SESSION['no_of_tickets']) ?></p>
            <p><strong>Advance Payment:</strong> <?= ($_SESSION['advanced_pay']) ?></p>
            <p><strong>Remaining Amount:</strong> <?= ($_SESSION['remaining_amount']) ?></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
