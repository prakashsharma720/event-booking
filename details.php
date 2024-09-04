<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(248, 244, 225);
            margin: 0;
            padding: 0;
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

            padding: 15px;
            border-radius: 8px;
            max-width: 500px;
            margin: 20px auto;
        }

        .event-details p {
            margin: 10px 0;
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

        .form-container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            border: 1px solid rgb(218, 220, 224);
        }

        .field-container {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            position: relative;
        }

        .field {
            position: relative;
        }

        .field input,
        .field select {
            width: 100%;
            font-size: 17px;
            padding: 10px 0;
            border: none;
            border-bottom: 2px solid lightgrey;
            outline: none;
            transition: border-color 0.3s ease;
            margin: 0;
            box-sizing: border-box;
        }

        .field input:focus,
        .field select:focus {
            border-bottom: 2px solid #4158d0;
        }

        .field select {
            padding: 10px 0;
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
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 17px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Event Details</h1>
    <div class="event-details">
        <p><strong>Event Name:</strong> MUMBAI MEHNDI MARATHON 24</p>
        <p><strong>Event Date:</strong> September 21st </p>
        <p><strong>Event Address:</strong> RAJORA BANQUETS</p>
        <p><strong>Event Location:</strong> <a href="https://g.co/kgs/uLLDqfF" target="_blank">Udaipur</a></p>
        <p><strong>Event Timing:</strong> 9 AM To 6 PM</p>
        <p><strong>Contact No:</strong> +91 9820490762 / +91 9820490460</p>
        <p><strong>Email:</strong> <a href="jayeshpatel.muskowl@gmail.com">jayeshpatel.muskowl@gmail.com</a></p>

    </div>

    <div class="form-container">
        <form action="#" method="POST">
            <div class="field-container">
                <div class="field">
                    <label for="name">Name <span class="required-icon">*</span></label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>
            </div>
    </div>

    <div class="form-container">
        <div class="field-container">
            <div class="field">
                <label for="email">Email <span class="required-icon">*</span></label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
        </div>
    </div>

    <div class="form-container">
        <div class="field-container">
            <div class="field">
                <label for="whatsapp">WhatsApp No <span class="required-icon">*</span></label>
                <input type="tel" id="whatsapp" name="whatsapp" placeholder="Enter your WhatsApp number" required>
            </div>
        </div>
    </div>

    <div class="form-container">
        <div class="field-container">
            <div class="field">
                <label for="gender">Gender <span class="required-icon">*</span></label>
                <select id="gender" name="gender" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-container">
        <div class="field-container">
            <div class="field">
                <label for="state">State <span class="required-icon">*</span></label>
                <input type="text" id="state" name="state" placeholder="Enter your state" required>
            </div>
        </div>
    </div>
    <div class="form-container">
        <div class="field-container">
            <div class="field">
                <label for="event-type">Event Type <span class="required-icon">*</span></label>
                <select id="event-type" name="event-type" required>
                    <option value="" disabled selected>Select your event type</option>
                    <option value="workshop">Workshop</option>
                    <option value="seminar">Seminar</option>
                    <option value="conference">Conference</option>
                    <option value="networking">Networking</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-container">
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

        <input type="submit" value="Book Now">
        </form>
    </div>
</body>

</html>
