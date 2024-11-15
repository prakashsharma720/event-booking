<?php session_start();

$code = $_GET['code'];

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php?code=' . $code);
    exit;
}


?>
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
            justify-content: flex-start;
            /* Allow content to flow normally */
            align-items: center;
            background-color: #e1ddc9;
            margin: 0;
            /* color: white; */
            overflow-y: auto;
            /* Enable vertical scrolling */
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

        /* Content container */
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
            margin-top: 50px;
            /* Adjusted for header, creating space for scrolling */
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

        .details p {
            color: black;
            margin: 5px 0;
            font-size: 18px;
            opacity: 0;
            animation: fadeInText 1s forwards;
        }

        .circle-badge {
            position: relative;
            top: 50%;
            right: 5%;
            /* background-color: #bb9433; */
            color: #128742;
            font-size: 22px;
            font-weight: bold;
            /* width: 160px; */
            /* height: 160px; */
            /* border-radius: 50%; */
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            animation: bounceIn 1s forwards;
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

        .dis {
            font-size: 32px;
            font-weight: bold;
            justify-content: flex-end;
            color: #FF6347;
            text-align: right;
            width: 100%;
            margin-top: 15px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
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
            .logout_icon{
                width: 20%;
            }
        }
         /* Responsive adjustments */
       @media (max-width: 767px) {
            .container {
                max-width: 100%;
            }
            .image-container img{
               max-width: 100%;  
            }
            .header {
                padding: 5px 5px;
            }
            .logo-container img {
                max-width: 70px;
            }
            .logout_icon{
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
            <a href="https://glowupwithmanisha.com/" class="btn"> Website</a>
            <a href="https://portal.glowupwithmanisha.com/" class="btn"> Profile</a>
        </div>
        <div class="btn-container" style="padding-left: 30px;">
            <a href="logout.php" style="color:#fff;text-decoration:none;"> <img src="image/logout.png" class="logout_icon"> Logout</a>
        </div>

    </div>

    <!-- Main Content -->
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


            <?php if (!empty($_SESSION['coupon_value'])): ?>
                <div class="circle-badge">
                    You Saved  ₹ <?= number_format($_SESSION['coupon_value'], 2) ?>
                </div>
            <?php endif; ?>

            <!-- <a href="ticket.php" class="btn btn-dark mt-3">View Ticket</a> -->
              <a class="btn btn-sm btn-success " data-toggle="modal" data-target="#ticketModal<?php echo $obj['id']; ?>"><i style="color:#fff;" class="fa fa-download"> </i> <span style="color:#fff;">Ticket</span></a>
        </div>
    </div>
    <br>
     <div id="ticketModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="ticket-popup" id="ticket_download">
                <!-- Display the ticket design inside modal -->
                <div class="ticket" id="ticket">
                    <div class="left">
                        <div class="image">
                            <!-- <p class="admit-one">
                                <span>ADMIT ONE</span>
                                <span>ADMIT ONE</span>
                                <span>ADMIT ONE</span>
                            </p> -->
                            <div class="ticket-number">
                                <p>#20030220</p>
                            </div>
                            <div class="jay">
                                <span> <i class="bi bi-telephone-fill"></i>  +91 9166973012</span>
                            </div>
                            <div class="jay">
                                <span> <i class="bi bi-envelope-fill"></i>  jayeshpatel.muskowl@gmail.com</span>
                            </div>
                        </div>
                        <div class="ticket-info">
                            <p class="ticket-date">
                                <span><?= strtoupper(date('l', strtotime($_SESSION['booking_date']))) ?></span>
                                <!-- Day of the week in uppercase -->
                                <span
                                    class="ticket-date-month"><?= date('d-M-y', strtotime($_SESSION['booking_date'])) ?></span>
                                <!-- Date in d-M-y format -->
                                <span>2024</span>
                            </p>
    
                            <div class="show-name">
                                <h1><?= ($_SESSION['event_name']) ?></h1>
                                <br>
                                <h2><?= implode(', ', $_SESSION['selected_event_types']) ?></h2>
                            </div>
    
                            <!-- Modify the time section to improve formatting -->
                            <div class="time">
                                <h2>From:</h2>
                                <p class="event-time">
                                    <span
                                        class="event-time-start"><?= date('l, d-M-Y', strtotime($_SESSION['start_date'])) ?>
                                        at <?= date('h:i A', strtotime($_SESSION['start_time'])) ?></span>
                                </p>
                                <h2>To:</h2>
                                <p class="event-time">
                                    <span class="event-time-end"><?= date('l, d-M-Y', strtotime($_SESSION['end_date'])) ?>
                                        at <?= date('h:i A', strtotime($_SESSION['end_time'])) ?></span>
                                </p>
                                <br>
                                <p>Row No. _______ Seat No: _______</p>
                            </div>
    
    
                            <p class="location">
                                <span class="venue-title">Venue: </span>
    
                                <span> <?= ($_SESSION['city']) ?> </span>
                                ,
                                <span> <?= ($_SESSION['state_name']) ?> </span>
                            </p>
                        </div>
                    </div>
                    <div class="rip">
                        <div class="dashes"></div>
                    </div>
                    <div class="right">
                        <!-- <p class="admit-one">
                                <span>ADMIT ONE</span>
                                <span>ADMIT ONE</span>
                                <span>ADMIT ONE</span>
                            </p> -->
                        <div class="right-info-container">
                            <div class="show-name">
                                <h1>Address:</h1>
                            </div>
                            <div class="time">
                                <p>1406/15, Mind Space, Chincholi Bunder Rd, Malad West, Mumbai, Maharashtra 400064</p>
                                <!-- <p>DOORS <span>@</span> 7:00 PM</p> -->
                            </div>
    
                            <div class="show-name">
                                <h1>Get Direction:</h1>
                            </div>
                            <div class="barcode">
                                <img src="https://external-preview.redd.it/cg8k976AV52mDvDb5jDVJABPrSZ3tpi1aXhPjgcDTbw.png?auto=webp&s=1c205ba303c1fa0370b813ea83b9e1bddb7215eb"
                                    alt="QR code">
                            </div>
                            <p class="ticket-number">
                                #20030220
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="view-ticket-btn">
                <button id="downloadTicketBtn" class="btn download_Btn">Download Ticket</button>
            </div>
        </div>
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
                                            rel="noopener">Legal Disclaimer</a>
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
  

</body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <!-- Download Ticket Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.2/html2pdf.bundle.js" referrerpolicy="no-referrer"></script>
<script>
        // Show the modal as soon as the page loads
        window.onload = function() {
            var modal = document.getElementById("ticketModal");
            modal.style.display = "block"; // Show the modal directly
            setTimeout(function() {
                modal.classList.add("show"); // Add the show class to trigger animation
            }, 10);

            // Close the modal when the user clicks the close button
            var span = document.getElementsByClassName("close")[0];
            span.onclick = function() {
                modal.classList.remove("show");
                setTimeout(function() {
                    modal.style.display = "none";
                }, 300);
            }

            // Close the modal if the user clicks anywhere outside the modal
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.classList.remove("show");
                    setTimeout(function() {
                        modal.style.display = "none";
                    }, 300);
                }
            }

            // Add the download ticket functionality
            document.getElementById("downloadTicketBtn").onclick = function() {
                // Select the ticket element
                const ticketElement = document.querySelector('.ticket');

                // Use html2canvas to capture the ticket element
                html2canvas(ticketElement, {
                    scale: 2, // Increase scale for better image resolution
                    useCORS: true, // Enable CORS for images from external domains
                }).then(canvas => {
                    // Convert the canvas to an image (PNG)
                    const imgData = canvas.toDataURL('image/png');

                    // Create a download link
                    const downloadLink = document.createElement('a');
                    downloadLink.href = imgData;
                    downloadLink.download = 'ticket.png'; // Set download file name

                    // Trigger the download
                    downloadLink.click();
                });
            };
        }
    </script>
</html>