<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $required_fields = ['mobile', 'password'];
    $missing_fields = [];

    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
            $missing_fields[] = $field;
        }
    }

    if (empty($missing_fields)) {
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];

        // Prepare and execute a query to fetch user by mobile number
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE mobile = ?");
        $stmt->bind_param('s', $mobile);
        $stmt->execute();
        $stmt->store_result();

        // Check if the user exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, log the user in
                echo json_encode(['status' => 'success', 'message' => 'Login successful']);
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
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

$conn->close();
?>