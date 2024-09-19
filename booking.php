<?php
$code = $_GET['code'];
$curl = curl_init();

// base url 
// https://gwmadmin.muskowl.com/index.php/api/Events_api/index.php
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://gwmadmin.muskowl.com/index.php/api/Events_api/EvtD',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('code' => $code, '_method' => 'post'),
    CURLOPT_HTTPHEADER => array(
        'Cookie: ci_session=40slq6epgmr07cbl6tjfvh3quvp5rsnp'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
$data = json_decode($response, true);
if ($data['status'] == "true") {
    $result = $data['result'];
} else {
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
    <title><?= $result['event_name'] ?> || Event Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Nerko+One&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: "Open Sans", system-ui;
            font-optical-sizing: auto;
            font-weight: 600;
            font-style: normal;
            font-variation-settings:
                "wdth" 100;
            background-color 0.5s ease;

        }

        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {
            height: 1000px;
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
            padding: 10px;
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

            .row.content {
                height: auto;
            }
        }


        h1 {
            text-align: center;
            color: #007bff;
            margin-top: 20px;
        }

        .event-details {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;

            margin: 20px 0;
        }

        .event-details h4 {
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .event-details p {
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .event-details .qr-code-container {
            text-align: center;
            margin-top: 20px;
        }

        .event-details .qr-code-container img {
            max-width: 90%;
            height: auto;
            max-height: 200px;
            margin-top: -171px;
            margin-left: 7px;
        }

        /* Adjust if necessary */


        @media (max-width: 768px) {
            .event-details {
                padding: 15px;
            }

            .event-details h4 {
                font-size: 1.25rem;
            }

            .event-details p {
                font-size: 0.9rem;
            }
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

        .greebie_image {
            display: inline-flex;
            padding: 10px;
            background: #000;
            color: #fff;
            align-items: center;
        }

        .required-icon {
            color: red;
        }

        input:read-only {
            background-color: #f0f0f0;
            /* Change this color as needed */
        }

        .total-area {
            background-color: #ffffff;
            transition: box-shadow 0.3s ease;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            text-align: left;
        }

        .total-area:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .total-area p {
            font-weight: bold;
            margin: 0 0 10px 0;
        }

        .amounts {
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .amount-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .field-container {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            position: relative;
            transition: box-shadow 0.3s ease;
        }

        .field-container:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            padding: 10px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        .package-selection {
            display: none;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .checkbox-item input[type="checkbox"] {
            margin-right: 10px;
            transform: scale(1.2);
            cursor: pointer;
        }

        .package-selection .checkbox-item {
            display: flex;
            margin-bottom: 3px;
            padding: 9px;
            background-color: #f9f9f9;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .package-selection input[type="radio"] {
            margin-right: 10px;
            transform: scale(1.2);
        }



        #coupon-container .field {
            margin-top: 10px;
        }

        #coupon-container .row {
            display: flex;
            align-items: center;
        }

        #coupon-container .form-control {
            width: 100%;

        }

        #coupon-container .btn {
            margin-left: -13px;
        }

        .qr-code-container img {

            max-width: 150px;
            height: auto;
        }

        .qr-code-container {
            text-align: center;
            margin-top: -159px;
            margin-left: 270px;
        }

        .file-upload-container {
            background-color: #ffffff;
            transition: box-shadow 0.3s ease;
            padding: 20px;

            max-width: 400px;
            margin: 0 auto;
            text-align: center;
        }

        .file-upload-container:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .upload-heading {
            font-size: 20px;
            color: #0056b3;
            margin-bottom: 10px;
        }

        .required-marker {
            color: #ff0000;
            font-size: 18px;
        }

        .upload-instructions {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .file-upload-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: -5px;
        }

        input[type="file"] {
            display: none;
        }

        .upload-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 89px;
            height: 43px;
            border: 2px solid #007bff;
            border-radius: 4px;
            background-color: #e9f1ff;
            color: #007bff;
            font-weight: 500;
            cursor: pointer;
            margin-bottom: 15px;
        }

        .upload-button svg {
            margin-right: 10px;
        }

        .upload-button span {
            font-size: 16px;
        }

        .selected-files {
            margin-top: 10px;
            font-size: 14px;
            color: #333;
        }


        .upload-submit-button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 12px 24px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .upload-submit-button:hover {
            background-color: #0056b3;
        }

        .button {
            flex: 0 0 auto;
            width: 30%;
        }

        .file-upload-container {
            margin-bottom: 20px;
        }

        .file-upload-area {
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .upload-button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
        }

        .selected-files {
            margin-top: 10px;
        }

        .selected-files img {
            max-width: 100px;
            max-height: 100px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .sms {
            margin: 8px;

        }

        .sms p {
            padding: 10px;
            border-radius: 4px;

            margin-top: 10px;

            display: none;

        }

        .sms #coupon-message.show {
            display: block;
            border: 1px solid #28a745;
            color: #28a745;
        }

        .sms #coupon-alert.show {
            display: block;
            border: 1px solid #dc3545;
            color: #dc3545;
        }

        footer {
            margin-top: 1019px;
        }

        .jay {
            flex: 0 0 auto;
            width: 58%;
        }

        #coupon-container {
            margin-top: 20px;
        }

        .field {
            margin-bottom: 20px;
        }

        .required-icon {
            color: red;
        }

        .btn {
            margin-right: 24px;
        }

        .col-9 input {
            border-radius: 8px;
        }

        .col-3 .btn {
            width: 115%;
        }

        .col-3 {
            display: flex;
            justify-content: flex-start;
        }

        @media (max-width: 576px) {

            .col-9,
            .col-3 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .col-3 .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-md-5 sidenav">
                <div class="greebie_image">
                    <img src="logo-gwm.jpg" style="width:10%;">
                    &nbsp; &nbsp;<h2> Event Registration Form</h2>
                </div>
                <div class="event-details">
                    <p><strong>Event Name:</strong> <?= $result['event_name'] ?></p>
                    <p><strong>Start Date:</strong> <?= date('d-M-y', strtotime($result['start_date'])) . ',' . date('h:i a', strtotime($result['start_time'])) ?></p>
                    <p><strong>End Date:</strong> <?= date('d-M-y', strtotime($result['end_date'])) . ',' . date('h:i a', strtotime($result['end_time'])) ?></p>
                    <p><strong>Venue:</strong> <a href="https://g.co/kgs/uLLDqfF" target="_blank">Udaipur</a></p>
                    <p><strong>Address :</strong> <a href="https://g.co/kgs/uLLDqfF" target="_blank">Udaipur</a></p>
                    <p><strong>Contact No:</strong> +91 9820490762 / +91 9820490460</p>
                    <p><strong>Email:</strong> <a href="mailto:jayeshpatel.muskowl@gmail.com">jayeshpatel.muskowl@gmail.com</a></p>
                </div>
                <div class="img greebie_image">
                    <img src="freebie2.png" style="width:100%;">
                </div>
                <div class="event-details">
                    <h4> Bank Details</h4>
                    <p><strong>Bank Name:</strong> ICICI Bank</p>
                    <p><strong>Account Number:</strong> 004501560103</p>
                    <p><strong>IFSC:</strong> ICIC0000045</p>
                    <p><strong>Branch:</strong> Madhuban, Udaipur</p>
                    <div class="qr-code-container " id="qr-code" name="qr-code">
                        <img src="QR-Code.png" id="download-qr">
                    </div>
                </div>


            </div>
            <div class="col-md-7 p-3">
                <!-- <div class="img greebie_image" >
                    <img src="freebie2.png" style="width:100%;">
                </div> -->
                <h2>Event Registration Form</h2>
                <hr>
                <form action="#" method="POST">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="gender">Participant Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter Company Name" class="form-control" value="Prakash Sharma" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Email </label>
                            <input type="text" name="email" placeholder="Enter Email " class="form-control" value="prakash@muskowl.com" readonly>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="gender">Mobile Number </label>
                            <input type="text" name="mobile" placeholder="Enter Mobile" class="form-control" value="9664100138" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="gender">Gender <span class="required-icon">*</span></label>
                            <div>
                                <input type="radio" name="gender" value="Male"> Male
                                &nbsp; &nbsp; &nbsp;
                                <input type="radio" name="gender" value="Female"> Female
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
                            <input type="text" name="company_name" placeholder="Enter Company Name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="state">City <span class="required-icon">*</span></label>
                            <input type="text" name="city" placeholder="Enter City" class="form-control" required>
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
                        <div class="col-md-6">
                            <label for="pincode">Pincode <span class="required-icon">*</span></label>
                            <input type="text" name="pincode" id="pincode" placeholder="Enter Pincode" class="form-control" required>
                        </div>

                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">

                            <label for="lead-source">Lead Source Master <span class="required-icon">*</span></label>
                            <select id="lead-source" name="lead-source" class="form-control" required>
                                <option value="" disabled selected>Select an option</option>
                                <option value="Friends Reference">Friends Reference</option>
                                <option value="GWM Instagram Page">GWM Instagram Page</option>
                                <option value="GWM Facebook Page">GWM Facebook Page</option>
                                <option value="Mehndi Marathon 24 Instagram Page">Mehndi Marathon 24 Instagram Page</option>
                                <option value="Mehndi Marathon 24 Facebook Page">Mehndi Marathon 24 Facebook Page</option>
                                <option value="GWM Website">GWM Website</option>
                                <option value="GWM WhatsApp">GWM WhatsApp</option>
                                <option value="Ads Campaign">Ads Campaign</option>
                                <option value="Google Ads">Google Ads</option>
                                <option value="YouTube">YouTube</option>
                                <option value="SMS">SMS</option>
                                <option value="Email Marketing">Email Marketing</option>
                                <option value="Tele Calling">Tele Calling</option>
                                <option value="LinkedIn">LinkedIn</option>
                                <option value="Artists Page">Artists Page</option>
                                <option value="Others" id="lead-source-other">Others</option>
                            </select>
                            <input type="text" id="lead-source-others" name="lead-source-others" style="display: none;" class="form-control" placeholder="Please specify">
                        </div>
                        <div class="col-md-6">
                            <label for="area-interest">Area of Interest <span class="required-icon">*</span></label>
                            <select id="area-interest" name="area-interest" class="form-control" required>
                                <option value="" disabled selected>Select area of interest</option>
                                <option value="Competitions">Competitions</option>
                                <option value="Discounts">Discounts</option>
                                <option value="B2B Meetings / Networking">B2B Meetings / Networking</option>
                                <option value="Salon & Spa">Salon & Spa</option>
                                <option value="Equipment Supply Chain">Equipment Supply Chain</option>
                                <option value="Products Supply Chain">Products Supply Chain</option>
                                <option value="Make-up">Make-up</option>
                                <option value="Skin Care">Skin Care</option>
                                <option value="Products Branding & Marketing">Products Branding & Marketing</option>
                                <option value="Product Knowledge">Product Knowledge</option>
                                <option value="Product Awareness">Product Awareness</option>
                                <option value="Education">Education</option>
                                <option value="Hair Care">Hair Care</option>
                                <option value="Nail Art">Nail Art</option>
                                <option value="Others">Others</option>
                            </select>
                            <input type="text" id="category-others" name="category-others" style="display: none;" class="form-control" placeholder="Please specify">
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-2">

                        <div class="col-md-6">
                            <div class="field-container">
                                <label for="event-type">Event Type <span class="required-icon">*</span></label>
                                <div class="checkbox-container">
                                    <?php foreach ($result['event_types_details'] as $event_type_array) { ?>

                                        <div class="checkbox-item">
                                            <input type="checkbox" id="seminar" name="event-type" value="seminar" onclick="toggleTerms()">
                                            <label for="seminar"> <?php echo $event_type_array['event_type']; ?>
                                                ₹
                                                <?php if ($event_type_array['package_available'] == 'No') {
                                                    echo $event_type_array['single_price'];
                                                } ?>

                                            </label>
                                        </div>
                                        <?php if ($event_type_array['package_available'] == 'Yes') { ?>
                                            <div class="package-selection" id="package-selection">
                                                <?php if (!empty($event_type_array['vip_row_price'])) { ?>
                                                    <div class="checkbox-item">
                                                        <input type="radio" id="package-vip" name="package-type" value="VIP" data-fee="<?= $event_type_array['vip_row_price'] ?>000.00">
                                                        <label for="package-vip">VIP - ₹ <?= $event_type_array['vip_row_price'] ?></label>
                                                    </div>
                                                <?php } ?>


                                                <?php if (!empty($event_type_array['gold_row_price'])) { ?>
                                                    <div class="checkbox-item">
                                                        <input type="radio" id="package-gold" name="package-type" value="Gold" data-fee="<?= $event_type_array['gold_row_price'] ?>000.00">
                                                        <label for="package-gold">Gold - ₹ <?= $event_type_array['gold_row_price'] ?></label>
                                                    </div>
                                                <?php } ?>


                                                <?php if (!empty($event_type_array['silver_row_price'])) { ?>
                                                    <div class="checkbox-item">
                                                        <input type="radio" id="package-silver" name="package-type" value="Silver" data-fee="<?= $event_type_array['silver_row_price'] ?>000.00">
                                                        <label for="package-silver">Silver - ₹ <?= $event_type_array['silver_row_price'] ?></label>
                                                    </div>
                                                <?php } ?>

                                            </div>
                                        <?php } ?>
                                    <?php } ?>

                                    <!-- <div class="checkbox-item">
                                        <input type="checkbox" id="Competition" name="event-type" value="Competition" onclick="toggleTerms()">
                                        <label for="Competition"> competition - ₹30,000.00</label>  
                                    </div>
                                      -->
                                    <!-- <div class="checkbox-item">
                                                <input type="checkbox" id="Master Class" name="event-type" value="Master Class" onclick="toggleTerms()">
                                                <label for="Master Class">Master Class - ₹30,000.00</label>
                                            </div>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="Expo" name="event-type" value="Expo" onclick="toggleTerms()">
                                                <label for="Expo">Expo - ₹15,000.00</label>
                                            </div> -->
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div id="terms-section" style="display: none;">
                                <h5>Terms And Conditions</h5>
                                <p>Insert your Terms and Conditions here. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor facilis ex amet. Non, aspernatur.Insert your Terms and Conditions here. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor facilis ex amet. Non, aspernatur.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="total-area">
                                <div class="amounts">
                                    <div class="amount-item">
                                        <span class="label">Total:</span>
                                        ₹<span id="payment_total">0.00</span>
                                        <input type="hidden" name="total_amount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="coupon-container">
                                <div class="field">
                                    <label for="coupon-code">Enter Coupon Code<span class="required-icon">*</span></label>
                                    <div class="row">
                                        <div class="col-9 jay">
                                            <input type="text" id="coupon-code" name="coupon-code" class="form-control" placeholder="Enter coupon code">
                                        </div>
                                        <div class="col-3 d-flex align-items-center">
                                            <button type="button" id="apply-coupon" class="btn btn-primary mr-2">Apply</button>
                                            <button type="button" id="cancel-coupon" class="btn btn-danger">
                                                <i class="bi bi-x-circle-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="sms">
                                <p id="coupon-message"></p>
                            </div>
                            <div class="sms">
                                <p id="coupon-alert"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="total-area mb-2">
                                <p>(Including Advance Payment of 50%):</p>
                                <div class="amounts">
                                    <div class="amount-item">
                                        <span class="label">Net payable Total:</span>
                                        ₹<span id="net-payable-total">0.00</span>
                                    </div>
                                    <div class="amount-item">
                                        <span class="label">Advance:</span>
                                        ₹<span id="Advance">0.00</span>
                                        <input type="hidden" name="advance_amount">
                                    </div>
                                    <div class="amount-item">
                                        <span class="label">Remaining:</span>
                                        ₹<span id="remaining_amount">0.00</span>
                                        <input type="hidden" name="remaining_amount">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-md-5">
                            <div class="col-md-11">
                                <div class="field">
                                    <label for="payment-ref-no">Payment Reference No <span class="required-icon">*</span></label>
                                    <input type="text" id="payment-ref-no" name="payment_ref_no" placeholder="Enter Payment Reference No" class="form-control" required>
                                </div>
                            </div>

                        </div>

                        <div class="file-upload-container">
                            <h3 class="upload-heading">Payment Screenshot <span class="required-marker"> *</span></h3>
                            <div class="file-upload-area">
                                <input type="file" id="file-upload" name="file-upload" multiple accept="image/*" required class="form-control">
                                <label for="file-upload" class="upload-button">
                                    <span>Add file</span>
                                </label>
                                <div id="selected-files" class="selected-files"></div>
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
            let couponDiscount = 0;

            // Apply coupon button click handler
            $('#apply-coupon').click(function() {
                const couponCode = $('#coupon-code').val().trim();
                if (couponCode !== currentCoupon) {
                    currentCoupon = couponCode;
                    $.ajax({
                        url: 'verify_coupon.php',
                        type: 'GET',
                        data: {
                            code: couponCode
                        },
                        success: function(response) {
                            const discount = parseFloat(response);
                            let successMessage = '';
                            let errorMessage = '';

                            if (discount > 0 && totalPrice > 0) {
                                successMessage = `Coupon "${couponCode}" applied successfully! Discount: ₹${discount}`;
                                couponDiscount = discount;
                                updateTotal();
                            } else if (discount === -1) {
                                errorMessage = 'Invalid coupon code. Please try again.';
                            } else if (discount === -2) {
                                errorMessage = 'No coupon code provided.';
                            } else {
                                errorMessage = 'Unexpected response from the server.';
                            }

                            if (successMessage) {
                                $('#coupon-message').text(successMessage).addClass('show');
                                $('#coupon-alert').text('').removeClass('show');
                            } else if (errorMessage) {
                                $('#coupon-alert').text(errorMessage).addClass('show');
                                $('#coupon-message').text('').removeClass('show');
                            }
                        },
                        error: function() {
                            $('#coupon-alert').text('An error occurred. Please try again.').addClass('show');
                            $('#coupon-message').text('').removeClass('show');
                        }
                    });
                } else {
                    $('#coupon-alert').text('Coupon code already applied').addClass('show');
                    $('#coupon-message').text('').removeClass('show');
                }
            });


            $('#cancel-coupon').click(function() {
                if (currentCoupon) {
                    $('#coupon-code').val('');
                    $('#coupon-message').text('').removeClass('show');
                    $('#coupon-alert').text('').removeClass('show');
                    couponDiscount = 0;
                    currentCoupon = '';
                    updateTotal();
                } else {
                    $('#coupon-alert').text('No coupon code applied to cancel.').addClass('show');
                    $('#coupon-message').text('').removeClass('show');
                }
            });


            function updateTotal() {
                totalPrice = 0.00;
                const checkboxes = document.querySelectorAll('input[name="event-type"]:checked');
                const prices = {
                    'seminar': 20000,
                    'Competition': 10000,
                    'Master Class': 30000,
                    'Expo': 15000
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

                const advancePayment = (totalPrice * 50) / 100;
                let paymentTotal = totalPrice;

                if (couponDiscount > 0) {
                    paymentTotal -= couponDiscount;
                }

                const remainingAmount = Math.max(0, paymentTotal - advancePayment);

                calculate(advancePayment, remainingAmount, paymentTotal);
            }

            // Function to calculate and update payment details
            function calculate(advanceAmount, remainingAmount, netPayableTotal) {
                const paymentTotalSpan = document.getElementById('payment_total');
                const netPayableTotalSpan = document.getElementById('net-payable-total');
                const advanceAmountSpan = document.getElementById('Advance');
                const remainingAmountSpan = document.getElementById('remaining_amount');

                paymentTotalSpan.textContent = totalPrice.toFixed(2);
                netPayableTotalSpan.textContent = netPayableTotal.toFixed(2);
                advanceAmountSpan.textContent = advanceAmount.toFixed(2);
                remainingAmountSpan.textContent = remainingAmount.toFixed(2);

                document.querySelector('input[name="total_amount"]').value = totalPrice;
                document.querySelector('input[name="advance_amount"]').value = advanceAmount;
                document.querySelector('input[name="remaining_amount"]').value = remainingAmount;
            }

            // Event listeners for checkboxes and radios
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

            // Download QR code button handler
            document.getElementById('download-qr').addEventListener('click', function() {
                const qrCodeUrl = 'QR-Code.png';
                const link = document.createElement('a');
                link.href = qrCodeUrl;
                link.download = '';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });

            // File upload handler
            document.getElementById('file-upload').addEventListener('change', function(event) {
                const files = event.target.files;
                const selectedFilesContainer = document.getElementById('selected-files');
                selectedFilesContainer.innerHTML = '';

                Array.from(files).forEach(file => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.alt = file.name;
                            img.title = file.name;
                            img.style.maxWidth = '150px';
                            img.style.maxHeight = '150px';

                            const removeBtn = document.createElement('button');
                            removeBtn.textContent = 'Remove';
                            removeBtn.className = 'remove-btn';
                            removeBtn.onclick = function() {
                                selectedFilesContainer.removeChild(img);
                                selectedFilesContainer.removeChild(removeBtn);

                                if (selectedFilesContainer.children.length === 0) {
                                    document.getElementById('file-upload').value = '';
                                }
                            };

                            selectedFilesContainer.appendChild(img);
                            selectedFilesContainer.appendChild(removeBtn);
                        };
                        reader.readAsDataURL(file);
                    } else {
                        alert('Please select an image file.');
                    }
                });
            });

            // Change handlers for select elements
            document.getElementById('area-interest').addEventListener('change', function() {
                const areaInterestOthersInput = document.getElementById('category-others');
                areaInterestOthersInput.style.display = (this.value === 'Others') ? 'block' : 'none';
                if (this.value !== 'Others') {
                    areaInterestOthersInput.value = '';
                }
            });

            document.getElementById('lead-source').addEventListener('change', function() {
                const leadSourceOthersInput = document.getElementById('lead-source-others');
                leadSourceOthersInput.style.display = (this.value === 'Others') ? 'block' : 'none';
                if (this.value !== 'Others') {
                    leadSourceOthersInput.value = '';
                }
            });
        });

        function toggleTerms() {
            const termsSection = document.getElementById('terms-section');
            const anyEventSelected = document.querySelectorAll('input[name="event-type"]:checked').length > 0;
            termsSection.style.display = anyEventSelected ? 'block' : 'none';
        }
    </script>



</body>

</html>