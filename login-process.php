<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo "<pre>";  print_r($_POST); exit:
  


    $required_fields = ['mobile', 'password'];
    $missing_fields = [];

    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
            $missing_fields[] = $field;
        }
    }

    if (empty($missing_fields)) {
        $mobile = trim($_POST['mobile']);
        $password = trim($_POST['password']);

        // Prepare and execute a query to fetch user by mobile number
        $stmt = $conn->prepare("SELECT id, password, user_type FROM users WHERE mobile = ?");
        $stmt->bind_param('s', $mobile);
        $stmt->execute();
        $stmt->store_result();

        // Check if the user exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password, $user_type);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, log the user in
                // Redirect based on user type
                if ($user_type == 'Participant') {
                    header("Location: participant_dashboard.php");
                } elseif ($user_type == 'Visitor') {
                    header("Location: visitor_dashboard.php");
                } else {
                    // Handle unknown user types
                    header("Location: unknown_user.php");
                }
                exit();
            } else {
                // Incorrect password
                echo json_encode(['status' => 'error', 'message' => 'Invalid password']);
            }
        } else {
            // User does not exist
            echo json_encode(['status' => 'error', 'message' => 'User not found']);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing required fields', 'fields' => $missing_fields]);
    }
} else {
    // No action taken for invalid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method. Expected POST, received ' . $_SERVER["REQUEST_METHOD"]]);
}

$conn->close();
?>
