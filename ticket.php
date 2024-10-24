<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Ticket</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.2/html2pdf.bundle.js"
        referrerpolicy="no-referrer"></script>
</head>

<body>
    <!-- Button to trigger the modal -->
    <div class="view-ticket-btn">
        <button id="viewTicketButton" class="btn">View Ticket</button>
    </div>

    <!-- Modal Structure -->
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
                        </div>
                        <div class="ticket-info">
                            <p class="ticket-date">
                                <span>MONDAY</span>
                                <span class="ticket-date-month">September 21ST</span>
                                <span>2024</span>
                            </p>
                            <div class="show-name">
                                <h1>Mehendi Marathon</h1>
                                <h2>Event Title</h2>
                            </div>
                            <div class="time">
                                <p>09:00 AM <span>TO</span> 06:00 PM</p>
                                <!-- <p>DOORS <span>@</span> 7:00 PM</p> -->
                                <p>Row No. _______ Seat No: _______</p>
                            </div>
                            <p class="location">
                                <span class="venue-title">Venue: </span>
                                <span>Banquet hall in Mumbai, </span>
                                <span class="separator"><i class="far fa-smile"></i></span>
                                <span> Maharashtra</span>
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


    <!-- Download Ticket Scrpit  -->

    <!-- jsPDF library -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <script>
    // Get modal element
    var modal = document.getElementById("ticketModal");

    // Get button that opens the modal
    var btn = document.getElementById("viewTicketButton");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
        setTimeout(function() {
            modal.classList.add("show"); // Add the show class to trigger animation
        }, 10);
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.classList.remove("show"); // Start closing animation
        setTimeout(function() {
            modal.style.display = "none"; // Hide modal after animation ends
        }, 300); // Matches the 0.3s animation duration in CSS
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.classList.remove("show");
            setTimeout(function() {
                modal.style.display = "none";
            }, 300);
        }
    }
    </script>

    <!-- Download Ticket Scrpit  -->

    <!-- <script>
    window.onload = function() {
        document.getElementById("downloadTicketBtn")
            .addEventListener("click", () => {
                const ticket = this.document.getElementById("ticket_download");
                // console.log(ticket);
                // console.log(window);

                var opt = {
                    margin: 1,
                    filename: 'ticket.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'landscape'
                    }
                };

                html2pdf().from(ticket).set(opt).save();
            })
    }
    </script> -->

    <script>
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
    </script>
</body>

</html>