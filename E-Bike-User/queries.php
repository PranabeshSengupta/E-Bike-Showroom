<?php
include("connect.php"); // Ensure this includes your database connection code

$message = "";
$showModal = false;

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $number = trim($_POST['number']);
    $product = trim($_POST['product_name']);
    $question = trim($_POST['question']);
    
    $errors = [];

    if (empty($name) || !preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $errors[] = "Please enter a valid name (letters and spaces only).";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }
    if (empty($number) || !preg_match("/^\d{10}$/", $number)) {
        $errors[] = "Please enter a valid 10-digit phone number.";
    }
    if (empty($product)) {
        $errors[] = "Please select a product name.";
    }
    if (empty($question)) {
        $errors[] = "Please enter your question.";
    }

    if (empty($errors)) {
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $number = mysqli_real_escape_string($conn, $number);
        $product = mysqli_real_escape_string($conn, $product);
        $question = mysqli_real_escape_string($conn, $question);

        $sql = "INSERT INTO comments (c_name, c_email, c_mobile, product_name, c_question) 
                VALUES ('$name', '$email', '$number', '$product', '$question')";

        if (mysqli_query($conn, $sql)) {
            $message = "Your comment has been posted successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    } else {
        $message = implode("<br>", $errors);
    }
    $showModal = true;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Submission</title>
<style>
/* Enhanced Modal Styling */
/* Enhanced Modal Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Modal Overlay */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    opacity: 0;
    transition: opacity 0.4s ease-in-out;
}

.modal.show {
    display: flex;
    opacity: 1;
}

/* Modal Content */
.modal-content {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 12px;
    max-width: 450px;
    width: 90%;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
    text-align: center;
    position: relative;
    transform: translateY(-50%);
    animation: slide-down 0.5s ease forwards;
}

.modal-content h2 {
    color: #4CAF50;
    font-size: 1.8em;
    margin-bottom: 0.3em;
}

.modal-content p {
    font-size: 1em;
    color: #555;
    line-height: 1.6;
    margin-bottom: 1.5em;
}

/* Close Button */
.close-btn {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s;
}

.close-btn:hover {
    background-color: #45a049;
}

.close-icon {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 1.5em;
    color: #888;
    cursor: pointer;
    transition: color 0.3s;
}

.close-icon:hover {
    color: #333;
}

/* Animation for Modal */
@keyframes slide-down {
    from {
        transform: translateY(-30%);
    }
    to {
        transform: translateY(0);
    }
}

/* Responsive Styling */
@media (max-width: 768px) {
    .modal-content {
        padding: 20px;
    }

    .modal-content h2 {
        font-size: 1.5em;
    }

    .modal-content p {
        font-size: 0.9em;
    }

    .close-icon {
        top: 10px;
        right: 10px;
    }
}

@media (max-width: 480px) {
    .modal-content {
        padding: 15px;
        max-width: 90%;
    }

    .modal-content h2 {
        font-size: 1.3em;
    }

    .modal-content p {
        font-size: 0.85em;
    }

    .close-btn {
        padding: 8px 16px;
        font-size: 0.9em;
    }
}

</style>
</head>
<body>



<!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close-icon" onclick="closeModal()"></span>
        <h2><?php echo empty($errors) ? "Success!" : "Error"; ?></h2>
        <p><?php echo $message; ?></p>
        <button class="close-btn" onclick="closeModal()">Close</button>
    </div>
</div>

<script>
// Show the modal if PHP sets $showModal to true
<?php if ($showModal): ?>
    document.getElementById("myModal").classList.add("show");
<?php endif; ?>

// Function to close the modal
function closeModal() {
    document.getElementById("myModal").classList.remove("show");
    setTimeout(() => {
        window.location.href = "products.php";
    }, 300); // Redirect after a slight delay for smooth transition
}
</script>

</body>
</html>
