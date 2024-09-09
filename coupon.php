<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

        .event-details {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #fff;
            padding: 45px;

            max-width: 1200px;
            margin: 20px auto;
            width: 100%;
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
            width: 200px;
            height: 50px;
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
    </style>
</head>

<body>
    <img src="head.jpg" alt="">

    <div class="event-details">
        <p><strong>Event Name:</strong> MUMBAI MEHNDI MARATHON 24</p>
        <p><strong>Event Date:</strong> September 21st</p>
        <p><strong>Event Address:</strong> RAJORA BANQUETS</p>
        <p><strong>Event Location:</strong> <a href="https://g.co/kgs/uLLDqfF" target="_blank">Udaipur</a></p>
        <p><strong>Event Timing:</strong> 9 AM To 6 PM</p>
        <p><strong>Contact No:</strong> +91 9820490762 / +91 9820490460</p>
        <p><strong>Email:</strong> <a href="mailto:jayeshpatel.muskowl@gmail.com">jayeshpatel.muskowl@gmail.com</a></p>
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
                            <option value="other">Other</option>
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
                            <option value="Others">Others</option>
                        </select>
                        <input type="text" id="other" name="category-others" style="display: none;">
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
                        <input type="text" id="category-others" name="category-others" style="display: none;">
                    </div>
                </div>
                <div class="field-container">
                    <div class="field">
                        <select required>
                            <option value="" disabled selected>Select an option</option>
                            <option value="Friends Reference">Friends Reference</option>
                            <option value="GWM Instagram Page">GWM Instagram Page</option>
                            <option value="GWM Facebook Page ">GWM Facebook Page </option>
                            <option value="Mehndi Marathon 24 Instagram Page "> Mehndi Marathon 24 Instagram Page</option>
                            <option value="Mehndi Marathon 24 Facebook Page"> Mehndi Marathon 24 Facebook Page</option>
                            <option value="GWM Website ">GWM Website </option>
                            <option value="GWM WhatsApp ">GWM WhatsApp </option>
                            <option value="Ads Campaign ">Ads Campaign </option>
                            <option value="Google Ads">Google Ads </option>
                            <option value="YouTube "> YouTube </option>
                            <option value="SMS">SMS </option>
                            <option value="Email Marketing  ">Email Marketing </option>
                            <option value="Tele Calling ">Tele Calling </option>
                            <option value="Linked In  ">Linked In </option>
                            <option value="Artists Page"> Artists Page</option>
                            <option value="Others" id="other">Others</option>

                        </select>
                        <label for="dropdown">Lead Source Master <span class="required-icon">*</span></label>
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
                    <p>(Including Advance Payment of ₹3,500):</p>
                    <div class="amounts">
                        <div class="amount-item">
                            <span class="label">Total:</span>
                            ₹<span id="payment_total">0.00</span>
                            <input type="hidden" name="total_amount">
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
                <div class="field-container discount-section">
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
                </div>

                <div class="field-container" id="coupon-container">
                    <div class="field">
                        <label for="coupon-code">Enter Coupon Code</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" id="coupon-code" name="coupon-code" placeholder="Enter coupon code">
                            </div>
                            <div class="col-3">
                                <button type="button" id="apply-coupon" class="btn btn-primary">Apply</button>
                                <button type="button" id="cancel-coupon" class="btn btn-secondary my-2 ">Cancel</button>
                            </div>
                            <div class="col-3">
                                <p id="coupon-message" style="color: green;"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Your existing code for submit button and other elements -->

                <br>
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
            <div class="file-upload-container">
                <h3 class="upload-heading">Payment Screenshot<span class="required-marker"> *</span></h3>

                <div class="file-upload-area">
                    <input type="file" id="file-upload" name="file-upload" multiple accept="image/*" required>
                    <label for="file-upload" class="upload-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <g transform="translate(-3, -3)">
                                <path d="M6,14.25 L7.5,14.25 L7.5,16.5 L16.5,16.5 L16.5,14.25 L18,14.25 L18,16.5 C18,17.325 17.325,18 16.5,18 L7.5,18 C6.675,18 6,17.325 6,16.5 L6,14.25 Z M9.3075,10.8075 L11.25,8.8725 L11.25,15 L12.75,15 L12.75,8.8725 L14.6925,10.815 L15.75,9.75 L12,6 L8.25,9.75 L9.3075,10.8075 Z"></path>
                            </g>
                        </svg>
                        <span>Add file</span>
                    </label>
                    <div id="selected-files" class="selected-files"></div>
                </div>

                <button type="submit" class="upload-submit-button">Upload</button>
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
                const remainingAmount = Math.max(0, discountedTotal - advancePayment);


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