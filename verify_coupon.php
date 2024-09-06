<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gwm_events";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if(!$conn)
    {
        die("". mysqli_error($conn));
    }

    if (isset($_GET['code'])) {
        $couponCode = $conn->real_escape_string($_GET['code']); // Sanitize input
    
        // Query to select data from discounts_master table
        $sql = "SELECT * FROM discounts_master WHERE coupon_code = '$couponCode'";
        
        // Execute the query
        $result = $conn->query($sql);
    
        // Check if the query was successful
        if ($result) {
            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Fetch the result
                $row = $result->fetch_assoc();
                echo $row['discount_value']; // Return the discount 
            } else {
                // Return -1 for an invalid coupon code
                echo -1;
            }
        } else {
            // Handle query error
            echo 'Query error: ' . $conn->error;
        }
    } else {
        // Return -2 if no code was provided
        echo -2;
    }
    
    // Close the connection
    $conn->close();
?>