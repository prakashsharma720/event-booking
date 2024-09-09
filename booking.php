<?php 
$code = $_GET['code'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://gwmadmin.muskowl.com/index.php/api/Events_api/EvtD',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('code' => $code,'_method' => 'post'),
  CURLOPT_HTTPHEADER => array(
    'Cookie: ci_session=40slq6epgmr07cbl6tjfvh3quvp5rsnp'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$data = json_decode($response, true);
if ($data['status'] == "true") {
    $result = $data['result'];
}
else {
    echo "Error: Unable to retrieve event details.";
}

 // Event Types
    // if (!empty($result['event_types_details'])) {
    //     echo "<h2>Event Types:</h2>";
    //     foreach ($result['event_types_details'] as $event_type) {
    //         echo "<p>Type: " . $event_type['event_type'] . "</p>";
    //         echo "<p>Package Available: " . $event_type['package_available'] . "</p>";
    //         echo "<p>VIP Price: " . $event_type['vip_row_price'] . "</p>";
    //         echo "<p>Gold Price: " . $event_type['gold_row_price'] . "</p>";
    //         echo "<p>Silver Price: " . $event_type['silver_row_price'] . "</p>";
    //     }
    // }

     // Discounts
    // if (!empty($result['discounts_details'])) {
    //     echo "<h2>Discounts:</h2>";
    //     foreach ($result['discounts_details'] as $discount) {
    //         echo "<p>Discount Type: " . $discount['discount_type'] . "</p>";
    //         echo "<p>Coupon Code: " . $discount['coupon_code'] . "</p>";
    //         echo "<p>Discount Value: " . $discount['discount_value'] . "</p>";
    //         echo "<p>Number of Users: " . $discount['no_of_users'] . "</p>";
    //     }
    // }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $result['event_name']?> || Event Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Open Sans", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
            font-variation-settings:
                "wdth" 100;
            background-color: #f7f7f7;
            transition: background-color 0.5s ease;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }


        h1 {
            text-align: center;
            color: #007bff;
            margin-top: 20px;
        }

        .event-details {
            color: #333;
            background-color: #fff;
            padding: 45px;
            margin: 20px auto;
        }

        .event-details:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .event-details p {
            margin: 12px 0;
        }

        .event-details strong {
            color: #555;
        }

        .event-details a {
            color: #007bff;
            text-decoration: none;
        }

        .event-details a:hover {
            text-decoration: underline;
        }

    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <h4>Event Registration Form</h4>
                <div class="event-details">
                    <p><strong>Event Name:</strong> <?= $result['event_name']?></p>
                    <p><strong>Start Date:</strong> <?= date('d-M-y',strtotime($result['start_date'])).','.date('h:i a',strtotime($result['start_time']))?></p>
                    <p><strong>End Date:</strong> <?= date('d-M-y',strtotime($result['end_date'])).','.date('h:i a',strtotime($result['end_time']))?></p>
                    <p><strong>Venue:</strong> <a href="https://g.co/kgs/uLLDqfF" target="_blank">Udaipur</a></p>
                    <p><strong>Address :</strong> <a href="https://g.co/kgs/uLLDqfF" target="_blank">Udaipur</a></p>
                    <p><strong>Contact No:</strong> +91 9820490762 / +91 9820490460</p>
                    <p><strong>Email:</strong> <a href="mailto:jayeshpatel.muskowl@gmail.com">jayeshpatel.muskowl@gmail.com</a></p>
                </div>
            </div>
            <div class="col-sm-6">
                <h4><small>RECENT POSTS</small></h4>
                <hr>
                <h2>User Details</h2>
                    <form action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <hr>
                </div>
            </div>
            <div class="col-sm-3">
                <h4><small>RECENT POSTS</small></h4>
                <hr>
                <h2>User Details</h2>
                    <form action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <footer class="container-fluid">
    <p>Footer Text</p>
    </footer>
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9bU0DGRpS2L90m0cH0n2AnXL7jF1C2DBcBxrmQ1o5OS7Y3ELDDa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-Tc5G3sS0u5S7nH6j27blOg9Q71GmA0m1m4U2F2mvDlV8z7F3Km/rI4b3r8ewpPpY" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let totalPrice = 0.00;
            let currentCoupon = "";
            let couponDiscount = 0; // To keep track of the applied coupon discount

            // Apply coupon code
            $('#apply-coupon').click(function() {
                var couponCode = $('#coupon-code').val().trim();
                if (couponCode !== currentCoupon) {
                    currentCoupon = couponCode;
                    $.ajax({
                        url: 'verify_coupon.php',
                        type: 'GET',
                        data: {
                            code: couponCode
                        },
                        success: function(response) {
                            var discount = parseInt(response, 10);
                            var message = '';
                            if (discount > 0 && totalPrice > 0) {
                                message = 'Coupon applied successfully! Discount: ₹' + discount;
                                couponDiscount = discount; // Update coupon discount
                                updateTotal(); // Update total price with new discount
                            } else if (discount === -1) {
                                message = 'Invalid coupon code. Please try again.';
                            } else if (discount === -2) {
                                message = 'No coupon code provided.';
                            } else {
                                message = 'Unexpected response from the server.';
                            }
                            $('#coupon-message').text(message);
                        },
                        error: function() {
                            $('#coupon-message').text('An error occurred. Please try again.');
                        }
                    });
                } else {
                    $('#coupon-message').text('Coupon code already applied');
                }
            });

            // Cancel coupon code
            $('#cancel-coupon').click(function() {
                if (currentCoupon) {
                    $('#coupon-code').val('');
                    $('#coupon-message').text('Coupon code canceled');
                    // Reset totalPrice and recalculate
                    couponDiscount = 0; // Clear coupon discount
                    currentCoupon = ''; // Clear coupon code
                    updateTotal(); // Recalculate total price without coupon
                } else {
                    $('#coupon-message').text('No coupon code applied to cancel.');
                }
            });

            // Update total price
            function updateTotal() {
                totalPrice = 0.00;
                const checkboxes = document.querySelectorAll('input[name="event-type"]:checked');
                const couponCode = document.getElementById('coupon-code').value.trim();
                const couponDiscounts = {
                    'early-birds': 0.10,
                    'group': 0.15,
                    'general': 0.05
                };

                const prices = {
                    'seminar': 20000,
                    'Competition': 10000,
                    'Master Class': 30000,
                    'Expo': 15000,
                };

                let seminarSelected = false;

                checkboxes.forEach(checkbox => {
                    const value = checkbox.value;
                    if (value === 'seminar') {
                        seminarSelected = true;
                    } else {
                        totalPrice += prices[value] || 0.00;
                    }
                });

                const packageSelection = document.getElementById('package-selection');
                packageSelection.style.display = seminarSelected ? 'block' : 'none';

                if (seminarSelected) {
                    const selectedPackage = document.querySelector('input[name="package-type"]:checked');
                    const packageFee = parseFloat(selectedPackage ? selectedPackage.dataset.fee : 0.00);
                    totalPrice += packageFee;
                }

                // Apply event discount if selected
                const selectedDiscount = document.querySelector('input[name="discount"]:checked');
                if (selectedDiscount) {
                    const discountType = selectedDiscount.value;
                    const discount = couponDiscounts[discountType] || 0;
                    totalPrice -= totalPrice * discount;
                }

                // Apply the coupon discount if any
                if (couponDiscount > 0) {
                    totalPrice -= couponDiscount;
                }

                calculate();
            }

            // Attach event listeners
            document.querySelectorAll('input[name="event-type"]').forEach(checkbox => {
                checkbox.addEventListener('change', updateTotal);
            });

            document.querySelectorAll('input[name="package-type"]').forEach(radio => {
                radio.addEventListener('change', updateTotal);
            });

            document.querySelectorAll('input[name="discount"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    document.getElementById('coupon-container').style.display = 'block';
                    updateTotal();
                });
            });

            // Calculate and update totals
            function calculate() {
                const paymentTotalSpan = document.getElementById('payment_total');
                const advanceAmountSpan = document.getElementById('Advance');
                const remainingAmountSpan = document.getElementById('remaining_amount');
                const advancePayment = (totalPrice * 50) / 100;
                const remainingAmount = Math.max(0, totalPrice - advancePayment);

                paymentTotalSpan.textContent = totalPrice.toFixed(2);
                remainingAmountSpan.textContent = remainingAmount.toFixed(2);
                advanceAmountSpan.textContent = advancePayment.toFixed(2);

                document.querySelector('input[name="total_amount"]').value = totalPrice;
                document.querySelector('input[name="advance_amount"]').value = advancePayment;
                document.querySelector('input[name="remaining_amount"]').value = remainingAmount;
            }
        });
    </script>



</body>

</html>