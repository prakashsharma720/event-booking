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
            background-color: #fff;
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
        
            <p>Event Name: <?= $_SESSION['event_name'] ?></p>
            <p>Start Date: <?= $_SESSION['start_date'] ?></p>
            <p>Address: <?=  $_SESSION['address'] ?></p>
            <p> Total amount : <?= $_SESSION['net_payable_total'] ?></p>
            <p> No Of Tickets : <?= $_SESSION['no_of_tickets'] ?></p>
            <p> Advance pay : <?= $_SESSION['advanced_pay'] ?></p>
            <p> Remaining Amount : <?= $_SESSION['remaining_amount'] ?></p>
     

        </div>
    </div>
</body>

</html>