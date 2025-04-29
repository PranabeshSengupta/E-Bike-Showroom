<?php
include("connect.php");

// Initialize error message and success status
$error_message = '';
$success_message = '';
$success = false;

// Process the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $name = trim($_POST['name']);
    if (empty($name)) {
        $error_message .= "Name is required.<br>";
    } elseif (strlen($name) < 2) {
        $error_message .= "Name must be at least 2 characters long.<br>";
    } elseif (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
        $error_message .= "Name must contain only letters and spaces.<br>";
    }

    // Validate email
    $email = trim($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message .= "Invalid email format.<br>";
    }

    // Validate rating
    if (!isset($_POST['rating'])) {
        $error_message .= "Rating is required.<br>";
    } else {
        $rating = $_POST['rating'];
    }

    // Validate review
    $review = trim($_POST['review']);
    if (empty($review)) {
        $error_message .= "Review is required.<br>";
    }

    // File upload handling
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        
        // Validate file size (limit to 500MB)
        if ($fileSize > 500 * 1024 * 1024) {
            $error_message .= "File size must be less than 500MB.<br>";
        }

        // Specify allowed file types (optional)
        $allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($fileType, $allowedFileTypes)) {
            $error_message .= "Only JPEG, PNG and GIF files are allowed.<br>";
        }

        // Specify upload directory
        $uploadDir = 'uploads/';
        $destination = $uploadDir . basename($fileName);
        
        // Move the uploaded file
        if (!move_uploaded_file($fileTmpPath, $destination)) {
            $error_message .= "Error uploading the file.<br>";
        }
    } else {
        $destination = NULL; // No file uploaded
    }

    // If no errors, insert data into database
    if (empty($error_message)) {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO review (c_name, c_email, c_rating, review, photo) VALUES (?, ?, ?, ?, ?)");
        
        // Check if the statement preparation was successful
        if ($stmt === false) {
            die("MySQL prepare error: " . $conn->error);
        }
        
        // Bind parameters
        $stmt->bind_param("ssiss", $name, $email, $rating, $review, $destination);
        
        if ($stmt->execute()) {
            $success = true;
            $success_message = "Review submitted successfully.";
        } else {
            $error_message = "Error submitting review: " . $stmt->error; // Use $stmt->error for specific statement error
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Submission</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Review Form Container */
        .review-form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        .custom-file-input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
            width: 100%;
            box-sizing: border-box; /* Ensures padding is included in width */
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        /* Rating Stars */
        .rating {
            display: flex;
            direction: row-reverse;
            justify-content: flex-start;
        }

        .rating label {
            font-size: 25px;
            color: #FFD700; /* Gold color for stars */
            cursor: pointer;
        }

        /* Custom File Input */
        .custom-file-input-wrapper {
            position: relative;
        }

        .custom-file-label {
            position: absolute;
            left: 10px;
            top: 10px;
            pointer-events: none;
        }

        /* Modals Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.5); /* Black w/ opacity */
        }

        .modal.show {
            display: block; /* Show the modal */
        }

        .modal-content {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center the content */
            justify-content: center; /* Center the content vertically */
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
            animation: modal-in 0.3s forwards;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%; /* Make button full-width for centering */
        }

        button:hover {
            background-color: #45a049;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .review-form-container {
                margin: 10px;
                padding: 15px;
            }

            .modal-content {
                width: 95%; /* Adjust modal width for small screens */
            }
        }
    </style>
</head>

<body>
    <!-- Success Modal -->
    <div id="success-modal" class="modal <?= $success ? 'show' : '' ?>">
        <div class="modal-content">
            <span class="close" onclick="closeModal('success-modal')"></span>
            <h2>SUCCESS</h2>
            <p><?= $success_message ?></p>
            <button onclick="redirectToReview()">Close</button>
        </div>
    </div>

    <!-- Error Modal -->
    <div id="error-modal" class="modal <?= !empty($error_message) ? 'show' : '' ?>">
        <div class="modal-content">
            <span class="close" onclick="closeModal('error-modal')"></span>
            <h2>ERROR</h2>
            <p><?= $error_message ?></p>
            <button onclick="redirectToReview()">Close</button>
        </div>
    </div>

    <script>
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        function redirectToReview() {
            window.location.href = 'review.php'; // Redirect to your review page
        }
    </script>
</body>
</html>
