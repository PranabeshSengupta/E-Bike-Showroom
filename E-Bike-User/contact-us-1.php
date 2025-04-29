<?php
// Include database connection
include("connect.php");

// Define an array to store validation errors
$errors = [];
$successMessage = "";

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Capture and validate form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $phone = trim($_POST['phone']);

    // Validate name (required, only letters and spaces)
    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "Only letters and white space are allowed in the name.";
    }

    // Validate email (required, proper email format)
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate message (required, at least 10 characters)
    if (empty($message)) {
        $errors[] = "Message is required.";
    } elseif (strlen($message) < 10) {
        $errors[] = "Message should be at least 10 characters long.";
    }

    // Validate phone (required, only numbers, 10-15 characters)
    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match("/^[0-9]{10,15}$/", $phone)) {
        $errors[] = "Phone number should contain only numbers and be between 10 and 15 digits.";
    }

    // If no errors, proceed with inserting into the database
    if (empty($errors)) {
        // Sanitize data for database insertion
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $message = mysqli_real_escape_string($conn, $message);
        $phone = mysqli_real_escape_string($conn, $phone);

        // Insert data into the contacts table
        $sql = "INSERT INTO contact (c_name, c_email, c_message, c_mobile) 
                VALUES ('$name', '$email', '$message', '$phone')";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            $successMessage = "Message sent successfully!";
        } else {
            $errors[] = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form with Modal</title>
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            align-items: center;
            justify-content: center;
            padding: 20px;
            transition: opacity 0.3s ease;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 0.5s ease;
        }

        .modal-content h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .modal-content p {
            font-size: 16px;
            margin-bottom: 20px;
            color: #333;
        }

        /* Success and Error styles */
        .modal.success .modal-content {
            border-top: 6px solid #28a745;
        }

        .modal.error .modal-content {
            border-top: 6px solid #dc3545;
        }

        .close-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .close-btn:hover {
            background-color: #0056b3;
        }

        /* Error message list styling */
        .modal.error ul {
            list-style: none;
            padding: 0;
            color: #dc3545;
            text-align: left;
            font-size: 15px;
        }

        .modal.error ul li {
            margin-bottom: 8px;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .modal-content {
                width: 90%;
            }
            .modal-content h2 {
                font-size: 20px;
            }
            .modal-content p,
            .modal.error ul li {
                font-size: 14px;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<!-- Success Modal -->
<div id="successModal" class="modal success">
    <div class="modal-content">
        <h2>Success</h2>
        <p><?php echo $successMessage; ?></p>
        <button class="close-btn" onclick="closeModal('successModal')">Close</button>
    </div>
</div>

<!-- Error Modal -->
<div id="errorModal" class="modal error">
    <div class="modal-content">
        <h2>Error</h2>
        <ul>
            <?php foreach ($errors as $error) {
                echo "<li>$error</li>";
            } ?>
        </ul>
        <button class="close-btn" onclick="closeModal('errorModal')">Close</button>
    </div>
</div>

<script>
    // Show success or error modal based on PHP outcome
    <?php if (!empty($successMessage)) : ?>
        document.getElementById("successModal").style.display = "flex";
    <?php elseif (!empty($errors)) : ?>
        document.getElementById("errorModal").style.display = "flex";
    <?php endif; ?>

    // Function to close modals
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
        window.location.href = "contact-us.html"; // Redirect to contact.php
    }
</script>

</body>
</html>
