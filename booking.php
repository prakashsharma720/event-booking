<?php 
$code = $_GET['code'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/CI/event-portal/index.php/api/Events_api/EvtD',
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
<link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Nerko+One&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Open Sans", system-ui;
            font-optical-sizing: auto;
            font-weight: 600;
            font-style: normal;
            font-variation-settings:
                "wdth" 100;background-color 0.5s ease;
            
        }

        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {
        height: 1000px;   
    }
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
      padding:10px;
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
        .greebie_image{
            display:inline-flex;
            padding:10px;
            background: #000;
            color: #fff;
            align-items: center;
        }
        .required-icon{
            color:red;
        }
          input:read-only {
            background-color: #f0f0f0; /* Change this color as needed */
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-md-5 sidenav">
                <div class="greebie_image" >
                    <img src="logo-gwm.jpg" style="width:10%;">
                    &nbsp; &nbsp;<h2> Event Registration Form</h2>
                </div>
                <div class="event-details">
                    <p><strong>Event Name:</strong> <?= $result['event_name']?></p>
                    <p><strong>Start Date:</strong> <?= date('d-M-y',strtotime($result['start_date'])).','.date('h:i a',strtotime($result['start_time']))?></p>
                    <p><strong>End Date:</strong> <?= date('d-M-y',strtotime($result['end_date'])).','.date('h:i a',strtotime($result['end_time']))?></p>
                    <p><strong>Venue:</strong> <a href="https://g.co/kgs/uLLDqfF" target="_blank">Udaipur</a></p>
                    <p><strong>Address :</strong> <a href="https://g.co/kgs/uLLDqfF" target="_blank">Udaipur</a></p>
                    <p><strong>Contact No:</strong> +91 9820490762 / +91 9820490460</p>
                    <p><strong>Email:</strong> <a href="mailto:jayeshpatel.muskowl@gmail.com">jayeshpatel.muskowl@gmail.com</a></p>
                </div>
                    <div class="img greebie_image" >
                        <img src="freebie2.png" style="width:100%;">
                    </div>
                   <div class="event-details">
                        <h4> Bank Details</h4>
                        <p><strong>Bank Name:</strong>  ICICI Bank</p>
                        <p><strong>Account Number:</strong> 004501560103</p>
                        <p><strong>IFSC:</strong> ICIC0000045</p>
                        <p><strong>Branch:</strong> Madhuban, Udaipur</p>
                    </div>
                    
               
            </div>
            <div class="col-md-7 p-3">
                 <!-- <div class="img greebie_image" >
                    <img src="freebie2.png" style="width:100%;">
                </div> -->
                <h2 >Event Registration Form</h2>
                <hr>
                <form action="#" method="POST">
                       <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="gender">Participant Name</label>
                                <input type="text" id="name" name="name" placeholder="Enter Company Name" class="form-control" value="Prakash Sharma" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Email </label>    
                                <input type="text"  name="email" placeholder="Enter Email " class="form-control" value="prakash@muskowl.com" readonly>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="gender">Mobile Number </label>
                                <input type="text"  name="mobile" placeholder="Enter Mobile" class="form-control" value="9664100138" readonly>
                            </div>
                            <div class="col-md-6">
                               <label for="gender">Gender <span class="required-icon">*</span></label>
                               <div>
                                    <input type="radio"  name="gender" value="Male"> Male 
                                    &nbsp; &nbsp; &nbsp;
                                    <input type="radio"  name="gender" value="Female"> Female
                                </div>
                            </div>
                        </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="category-type">Category <span class="required-icon">*</span></label>
                            <select id="category-type" name="category_type" class="form-control" required>
                            <option value="" disabled selected>Choose Category</option>
                            <option value="Salon">Salon</option>
                            <option value="Spa">Spa</option>
                            <option value="Nail Studio">Nail Studio</option>
                            <option value="Parlour">Parlour</option>
                            <option value="Association">Association</option>
                            <option value="Manufacturer">Manufacturer</option>
                            <option value="Distributor">Distributor</option>
                            <option value="Wholesaler">Wholesaler</option>
                            <option value="Retailer">Retailer</option>
                            <option value="Freelancer">Freelancer</option>
                            <option value="Academy">Academy</option>
                            <option value="Others">Others</option>
                            </select>
                            <input type="text" id="other" name="category-others" style="display: none;" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="category-type">Sub Category <span class="required-icon">*</span></label>
                            <select id="category-type" name="subcategory_type" class="form-control" required>
                            <option value="" disabled selected>Choose Sub Category</option>
                            <option value="Salon">Salon</option>
                            <option value="Spa">Spa</option>
                            <option value="Nail Studio">Nail Studio</option>
                            <option value="Parlour">Parlour</option>
                            <option value="Association">Association</option>
                            <option value="Manufacturer">Manufacturer</option>
                            <option value="Distributor">Distributor</option>
                            <option value="Wholesaler">Wholesaler</option>
                            <option value="Retailer">Retailer</option>
                            <option value="Freelancer">Freelancer</option>
                            <option value="Academy">Academy</option>
                            <option value="Others">Others</option>
                            </select>
                            <input type="text" id="other" name="category-others" style="display: none;" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="name">Company Name </label>
                            <input type="text" name="company_name" placeholder="Enter Company Name" class="form-control" >
                        </div>
                        <div class="col-md-6">
                            <label for="state">City <span class="required-icon">*</span></label>
                            <input type="text"  name="city" placeholder="Enter City"  class="form-control" required>
                        </div>
                    </div>
                     <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="name">State </label>
                            <select name="indian-states" id="indian-states" class="form-control">
                                <option value="">Choose State</option>
                                <option value="andhra-pradesh">Andhra Pradesh</option>
                                <option value="arunachal-pradesh">Arunachal Pradesh</option>
                                <option value="assam">Assam</option>
                                <option value="bihar">Bihar</option>
                                <option value="chhattisgarh">Chhattisgarh</option>
                                <option value="goa">Goa</option>
                                <option value="gujarat">Gujarat</option>
                                <option value="haryana">Haryana</option>
                                <option value="himachal-pradesh">Himachal Pradesh</option>
                                <option value="jharkhand">Jharkhand</option>
                                <option value="karnataka">Karnataka</option>
                                <option value="kerala">Kerala</option>
                                <option value="madhya-pradesh">Madhya Pradesh</option>
                                <option value="maharashtra">Maharashtra</option>
                                <option value="manipur">Manipur</option>
                                <option value="meghalaya">Meghalaya</option>
                                <option value="mizoram">Mizoram</option>
                                <option value="nagaland">Nagaland</option>
                                <option value="odisha">Odisha</option>
                                <option value="punjab">Punjab</option>
                                <option value="rajasthan">Rajasthan</option>
                                <option value="sikkim">Sikkim</option>
                                <option value="tamil-nadu">Tamil Nadu</option>
                                <option value="telangana">Telangana</option>
                                <option value="tripura">Tripura</option>
                                <option value="uttar-pradesh">Uttar Pradesh</option>
                                <option value="uttarakhand">Uttarakhand</option>
                                <option value="west-bengal">West Bengal</option>

                                <!-- Union Territories -->
                                <option value="andaman-nicobar">Andaman and Nicobar Islands</option>
                                <option value="chandigarh">Chandigarh</option>
                                <option value="dadra-nagar-haveli-daman-diu">Dadra and Nagar Haveli and Daman and Diu</option>
                                <option value="delhi">Delhi</option>
                                <option value="lakshadweep">Lakshadweep</option>
                                <option value="puducherry">Puducherry</option>
                                <option value="ladakh">Ladakh</option>
                                <option value="jammu-kashmir">Jammu and Kashmir</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                     <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="category-type">Choose Event Type <span class="required-icon">*</span></label>
                            <select id="category-type" name="category_type" class="form-control" required>
                            <option value="" disabled selected>Choose Category</option>
                            <option value="Salon">Salon</option>
                        </div>
                    </div>
                </div>
            </form> 
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