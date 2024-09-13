<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
            transition: background-color 0.5s ease;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-top: 20px;
        }

        .event-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            margin: 20px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .event-details {
            font-family: Arial, sans-serif;
            color: #333;
            max-width: 60%;
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

        .event-container img {
            max-width: 658px;
            height: 235px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Media Queries for Responsive Design */
        @media (max-width: 768px) {
            .event-container {
                flex-direction: column;
                text-align: center;
            }

            .event-details {
                max-width: 100%;
                margin-bottom: 20px;
            }

            .event-container img {
                width: 100%;
            }
        }

        .event-details a:hover {
            text-decoration: underline;
        }

        .container {
            display: flex;
            align-items: flex-start;
            max-width: 1200px;
            width: 100%;
            padding: 50px;
            background-color: #fff;

        }

        .form-container {
            flex: 1;
            max-width: 600px;
            padding-right: 20px;
        }

        .payment-methods-area {
            width: 100%;
            max-width: 500px;
            padding: 20px;
        }

        .payment-methods-area h2 {
            margin-top: -50px;
            text-align: center;
            margin-bottom: .5rem;
            font-weight: 500;
            line-height: 1.2;
            color: #007bff;
        }

        .payment-method-container {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 12px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .payment-method-container:hover {
            background-color: #e9f1ff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .payment-method-container input[type="radio"] {
            margin-right: 10px;
        }

        .payment-method-container label {
            margin: 0;
            font-size: 16px;
            color: #333;
        }

        .form-address-table {
            width: 100%;
            border-collapse: collapse;
        }

        .form-address-table td {
            padding: 5px;
        }

        .form-address-table input {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 12px;
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

        .field {
            position: relative;
        }

        .field input,
        .field select {
            width: 100%;
            font-size: 17px;
            padding: 12px 0;
            border: none;
            border-bottom: 2px solid lightgrey;
            outline: none;
            transition: border-color 0.3s ease;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .field input:focus,
        .field select:focus {
            border-bottom: 2px solid #4158d0;
        }

        .field select {
            padding: 12px 0;
            background-color: #fff;
        }

        .field label {
            position: absolute;
            top: -20px;
            left: 0;
            color: #4158d0;
            font-weight: 400;
            font-size: 16px;
            background: #fff;
            padding: 0 5px;
            transition: all 0.3s ease;
        }

        .field input:focus~label,
        .field select:focus~label,
        .field input:valid~label,
        .field select:valid~label {
            top: -30px;
            font-size: 14px;
            color: #4158d0;
        }

        .required-icon {
            color: red;
            font-size: 14px;
            margin-left: 5px;
            vertical-align: middle;
        }

        .form-container input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 14px 28px;
            border-radius: 5px;
            font-size: 20px;
            cursor: pointer;
            margin: 2px 76px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
            transform: scale(1.02);
        }

        .form-product-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }

        .form-product-item:hover {
            transform: scale(1.02);
        }

        .form-product-item-detail {
            display: flex;
            flex-direction: row;
            align-items: center;
            width: 100%;
        }

        .p_col {
            flex: 0 0 auto;
        }

        .p_checkbox input {
            margin-right: 10px;
        }

        .form-product-container {
            flex: 1;
        }

        .title_description {
            font-size: 16px;
            color: #333;
        }

        .form-product-name {
            font-weight: bold;
        }

        .form-product-details {
            margin-top: 5px;
            font-size: 18px;
            color: #007bff;
        }

        .form-sub-label-container {
            margin-top: 10px;
        }

        .form-sub-label-container label {
            font-size: 16px;
            color: #333;
        }

        .form-sub-label-container select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
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

        .label {
            font-weight: bold;
        }

        .payment-methods-area {
            width: 100%;
            max-width: 500px;
            padding: 20px;


            margin-top: 20px;
        }

        .payment-methods-area h2 {
            font-size: 24px;
            color: #0056b3;
        }

        .content-area {

            padding: 20px;
            margin-bottom: 20px;

        }

        .content-area p {
            margin: 8px 0;
            color: #333;
        }


        .qr-code-container {
            text-align: center;
            margin-top: -54px;
        }

        .qr-code-container img {
            max-width: 150px;
            height: auto;
        }


        .checkbox-container {
            display: flex;
            flex-direction: column;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            padding: 10px;


            margin-bottom: 10px;

            transition: background-color 0.3s ease;
        }

        .checkbox-item:hover {
            background-color: #f1f1f1;
        }

        .checkbox-item input[type="checkbox"] {
            margin-right: 10px;
            transform: scale(1.2);
            cursor: pointer;
        }

        .checkbox-item label {
            font-size: 16px;
            color: #333;
        }



        .package-selection {
            display: none;
            /* Initially hidden */
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .package-selection .checkbox-item {
            display: flex;
            margin-bottom: 3px;
            padding: 9px;
            background-color: #f9f9f9;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .package-selection .checkbox-item:hover {
            background-color: #f1f1f1;
        }

        .package-selection input[type="radio"] {
            margin-right: 10px;
            transform: scale(1.2);
        }

        .checkbox-item input {
            margin-right: 10px;
            transform: scale(1.2);
            cursor: pointer;
        }

        /* Media Queries for Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                padding: 20px;
            }

            .form-container {
                padding-right: 0;
                margin-bottom: 20px;
            }

            .payment-methods-area {
                padding: 10px;
            }

            .total-area {
                width: 100%;
                margin-top: 20px;
            }

            .event-details {
                padding: 20px;
            }
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

        /* General Mobile Styles */
        @media only screen and (max-width: 600px) {
            .event-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .event-image img {
                max-width: 100%;
                height: auto;
            }

            .form-container form {
                padding: 15px;
            }

            .field-container {
                margin-bottom: 10px;
            }

            .field-container .field label,
            .field-container .field input,
            .field-container .field select {
                width: 100%;
            }

            .checkbox-container {
                display: flex;
                flex-direction: column;
            }

            .checkbox-item {
                margin-bottom: 10px;
            }

            .amounts {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .total-area {
                margin-top: 15px;
                text-align: center;
            }

            .total-area .amount-item {
                margin-bottom: 10px;
            }

            .file-upload-container {
                text-align: center;
            }

            .file-upload-area {
                display: inline-block;
            }

            .payment-methods-area {
                padding: 15px;
            }

            .payment-methods-area .content-area {
                margin-bottom: 15px;
            }

            .qr-code-container img {
                max-width: 100px;
                height: auto;
            }

            #coupon-container .col-6,
            #coupon-container .col-3 {
                width: 100%;
                margin-bottom: 10px;
            }

            #coupon-message {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="event-container">
        <div class="event-details">
            <p><strong>Event Name:</strong> MUMBAI MEHNDI MARATHON 24</p>
            <p><strong>Event Date:</strong> September 21st</p>
            <p><strong>Event Address:</strong> RAJORA BANQUETS</p>
            <p><strong>Event Location:</strong> <a href="https://g.co/kgs/uLLDqfF" target="_blank">Udaipur</a></p>
            <p><strong>Event Timing:</strong> 9 AM To 6 PM</p>
            <p><strong>Contact No:</strong> +91 9820490762 / +91 9820490460</p>
            <p><strong>Email:</strong> <a href="mailto:jayeshpatel.muskowl@gmail.com">jayeshpatel.muskowl@gmail.com</a></p>
        </div>
        <div class="event-image">
            <img src="head.jpg" alt="Event Image">
        </div>
    </div>

    <div class="container">
        <div class="form-container">
            <form action="#" method="POST">


                <div class="field-container">
                    <div class="field">
                        <label for="name">Company Name <span class="required-icon">*</span></label>
                        <input type="text" id="name" name="name" placeholder="Enter Company Name" required>
                    </div>
                </div>

                <div class="field-container">
                    <div class="field">
                        <select id="gender" name="gender" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>

                        </select>
                        <label for="gender">Gender <span class="required-icon">*</span></label>
                    </div>
                </div>

                <div class="field-container">
                    <div class="field">
                        <label for="state">State <span class="required-icon">*</span></label>
                        <input type="text" id="state" name="state" placeholder="Enter your state" required>
                    </div>
                </div>
                <div class="field-container">
                    <div class="field">
                        <label for="category-type">Category Type <span class="required-icon">*</span></label>
                        <select id="category-type" name="category-type" required>
                            <option value="" disabled selected>Select your category</option>
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

                        </select>

                    </div>
                </div>


                <div class="field-container">
                    <div class="field">
                        <label for="area-interest">Area of Interest <span class="required-icon">*</span></label>
                        <select id="area-interest" name="area-interest" required>
                            <option value="" disabled selected>Select your area of interest</option>
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
                        <input type="text" id="category-others" name="category-others" style="display: none;" placeholder="Please specify">
                    </div>
                </div>
                <div class="field-container">
                    <div class="field">
                        <label for="lead-source">Lead Source Master <span class="required-icon">*</span></label>
                        <select id="lead-source" name="lead-source" required>
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
                        <input type="text" id="lead-source-others" name="lead-source-others" style="display: none;" placeholder="Please specify">
                    </div>
                </div>

                <div class="field-container">
                    <div class="field">
                        <label for="experience">Experience Level <span class="required-icon">*</span></label>
                        <select id="experience" name="experience" required>
                            <option value="" disabled selected>Select your experience level</option>
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                        </select>
                    </div>
                </div>

                <div class="field-container">
                    <label for="event-type">Event Type <span class="required-icon">*</span></label>
                    <div class="checkbox-container">
                        <div class="checkbox-item">
                            <input type="checkbox" id="seminar" name="event-type" value="seminar">
                            <label for="seminar">Seminar - ₹20,000.00</label>
                        </div>
                        <div class="package-selection" id="package-selection">
                            <div class="checkbox-item">
                                <input type="radio" id="package-vip" name="package-type" value="VIP" data-fee="2000.00">
                                <label for="package-vip">VIP - ₹2000.00</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="radio" id="package-gold" name="package-type" value="Gold" data-fee="1500.00">
                                <label for="package-gold">Gold - ₹1500.00</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="radio" id="package-silver" name="package-type" value="Silver" data-fee="1000.00">
                                <label for="package-silver">Silver - ₹1000.00</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="radio" id="package-none" name="package-type" value="None" data-fee="0.00" checked>
                                <label for="package-none">None - ₹0.00</label>
                            </div>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="Competition" name="event-type" value="Competition">
                            <label for="Competition">Competition - ₹10,000.00</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="Master Class" name="event-type" value="Master Class">
                            <label for="Master Class">Master Class - ₹30,000.00</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="Expo" name="event-type" value="Expo">
                            <label for="Expo">Expo - ₹15,000.00</label>
                        </div>


                    </div>
                </div>

                <div class="total-area">

                    <div class="amounts">
                        <div class="amount-item">
                            <span class="label">Total:</span>
                            ₹<span id="payment_total">0.00</span>
                            <input type="hidden" name="total_amount">
                        </div>

                    </div>
                </div>
                <br>
                <!-- <div class="field-container discount-section">
                    <label for="discount">Choose Discount</label>
                    <div class="checkbox-container">
                        <div class="checkbox-item">
                            <input type="radio" id="discount-early-birds" name="discount" value="early-birds">
                            <label for="discount-early-birds">Early Birds</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="radio" id="discount-group" name="discount" value="group">
                            <label for="discount-group">Group</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="radio" id="discount-general" name="discount" value="general">
                            <label for="discount-general">General</label>
                        </div>
                    </div>
                </div> -->

                <div class="field-container" id="coupon-container">
                    <div class="field">
                        <label for="coupon-code">Enter Coupon Code<span class="required-icon">*</span></label>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="coupon-code" name="coupon-code" placeholder="Enter coupon code">
                            </div>
                            <div class="col-3 button">
                                <button type="button" id="apply-coupon" class="btn btn-primary">Apply</button>
                                <button type="button" id="cancel-coupon" class="btn btn-danger my-2 mr-2 "><i class="bi bi-x-circle-fill"></i></button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex">
                    <p id="coupon-message" style="color: green;"></p>
                </div>
                <div class="total-area">
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

                <br>

                <div class="field-container">
                    <div class="field">
                        <label for="payment-ref-no">Payment Reference No <span class="required-icon">*</span></label>
                        <input type="text" id="payment-ref-no" name="payment_ref_no" placeholder="Enter Payment Reference No" required>
                    </div>
                </div>
                <br>
                <br>

                <div class="qr-code-container " id="qr-code" name="qr-code">
                    <img src="QR-Code.png" id="download-qr">
                </div>
                <H5 class="text-center my-2"> Click on QR code to Download</H5>

                <br>

                <div class="file-upload-container">
                    <h3 class="upload-heading">Payment Screenshot<span class="required-marker"> *</span></h3>
                    <div class="file-upload-area">
                        <input type="file" id="file-upload" name="file-upload" multiple accept="image/*" required>
                        <label for="file-upload" class="upload-button">
                            <span>Add file</span>
                        </label>
                        <div id="selected-files" class="selected-files"></div>
                    </div>

                </div>
                <input type="submit" value="Submit">
            </form>
        </div>

        <div class="payment-methods-area">
            <h2>Payment Method</h2>
            <div id="payment-method-content">
                <div class="content-area">
                    <p><strong>Bank Name:</strong> Example Bank</p>
                    <p><strong>Account Number:</strong> 1234567890</p>
                    <p><strong>Account Name:</strong> John Doe</p>
                    <p><strong>IFSC Code:</strong> EXAM0001234</p>
                    <p><strong>Account Type:</strong> Savings</p>
                    <p><strong>Branch Address:</strong> 123 Bank St, City, State, ZIP</p>
                    <p><strong>UPI ID:</strong> example@upi</p>
                    <br>
                    <strong>QR CODE::</strong>
                    <div class="qr-code-container" id="qr-code-container">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/800px-QR_code_for_mobile_English_Wikipedia.svg.png" id="qr-code" alt="QR Code for Bank Transfer">
                    </div>
                </div>

                <div class="content-area">
                    <p><strong>Bank Name:</strong> Example Bank</p>
                    <p><strong>Account Number:</strong> 1234567890</p>
                    <p><strong>Account Name:</strong> John Doe</p>
                    <p><strong>IFSC Code:</strong> EXAM0001234</p>
                    <p><strong>Account Type:</strong> Savings</p>
                    <p><strong>Branch Address:</strong> 123 Bank St, City, State, ZIP</p>
                    <p><strong>UPI ID:</strong> example@upi</p>
                    <br>
                    <strong>QR CODE::</strong>
                    <div class="qr-code-container" id="qr-code-container">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/800px-QR_code_for_mobile_English_Wikipedia.svg.png" id="qr-code" alt="QR Code for Bank Transfer">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <br>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9bU0DGRpS2L90m0cH0n2AnXL7jF1C2DBcBxrmQ1o5OS7Y3ELDDa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-Tc5G3sS0u5S7nH6j27blOg9Q71GmA0m1m4U2F2mvDlV8z7F3Km/rI4b3r8ewpPpY" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
$(document).ready(function() {
    let totalPrice = 0.00;
    let currentCoupon = "";
    let couponDiscount = 0;

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
                    var discount = parseFloat(response);
                    var message = '';
                    if (discount > 0 && totalPrice > 0) {
                        message = 'Coupon applied successfully! Discount: ₹' + discount;
                        couponDiscount = discount;
                        updateTotal();
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

    $('#cancel-coupon').click(function() {
        if (currentCoupon) {
            $('#coupon-code').val('');
            $('#coupon-message').text('');
            couponDiscount = 0;
            currentCoupon = '';
            updateTotal();
        } else {
            $('#coupon-message').text('No coupon code applied to cancel.');
        }
    });

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

        // Calculate advance payment based on original total before applying any coupon discount
        const advancePayment = (totalPrice * 50) / 100;
        const remainingAmount = Math.max(0, totalPrice - advancePayment);

        let paymentTotal = totalPrice;
        if (couponDiscount > 0) {
            paymentTotal -= couponDiscount;
        }

        let netPayableTotal = paymentTotal;

        calculate(advancePayment, remainingAmount, netPayableTotal);
    }

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

    document.getElementById('download-qr').addEventListener('click', function() {
        var qrCodeUrl = 'QR-Code.png';
        var link = document.createElement('a');
        link.href = qrCodeUrl;
        link.download = '';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });

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

    document.addEventListener('DOMContentLoaded', function() {
        const areaInterestSelect = document.getElementById('area-interest');
        const areaInterestOthersInput = document.getElementById('category-others');

        areaInterestSelect.addEventListener('change', function() {
            if (this.value === 'Others') {
                areaInterestOthersInput.style.display = 'block';
            } else {
                areaInterestOthersInput.style.display = 'none';
                areaInterestOthersInput.value = '';
            }
        });

        const leadSourceSelect = document.getElementById('lead-source');
        const leadSourceOthersInput = document.getElementById('lead-source-others');

        leadSourceSelect.addEventListener('change', function() {
            if (this.value === 'Others') {
                leadSourceOthersInput.style.display = 'block';
            } else {
                leadSourceOthersInput.style.display = 'none';
                leadSourceOthersInput.value = '';
            }
        });
    });
});
    </script>

</body>

</html>