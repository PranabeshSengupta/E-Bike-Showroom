<?php
include("connect.php");

function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

if (isset($_POST['submit'])) {
    // Sanitize and validate input data
    $name = sanitizeInput($_POST["name"]);
    $email = filter_var(sanitizeInput($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $mobile = sanitizeInput($_POST["mobile"]);
    $dob = sanitizeInput($_POST["dob"]);
    $password = sanitizeInput($_POST["password"]);
    $confirm_password = sanitizeInput($_POST["confirm_password"]);
    $terms = isset($_POST["terms"]);

    $errors = [];

    // Name validation: between 2-50 characters, only letters and spaces, no leading/trailing spaces
    if (empty($name) || !preg_match("/^[a-zA-Z\s]{2,50}$/", $name) || preg_match("/^\s|\s$/", $name)) {
        $errors[] = "Name must contain 2-50 letters and spaces only, without leading or trailing spaces.";
    }

    // Email validation
    if (!$email) {
        $errors[] = "Please enter a valid email address.";
    }

    // Mobile validation: 10 digits, starts with non-zero
    if (!preg_match('/^[1-9][0-9]{9}$/', $mobile)) {
        $errors[] = "Mobile number must be exactly 10 digits and cannot start with 0.";
    }

    if (empty($dob)) {
        $errors[] = "Date of birth is required.";
    }

    // Password validation
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Password must contain at least one uppercase letter.";
    } elseif (!preg_match('/[a-z]/', $password)) {
        $errors[] = "Password must contain at least one lowercase letter.";
    } elseif (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
        $errors[] = "Password must contain at least one special character.";
    } elseif (!preg_match('/\d/', $password)) {
        $errors[] = "Password must contain at least one number.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if (!$terms) {
        $errors[] = "You must accept the terms and conditions.";
    }

    // Handle photo upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $photo_ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        $allowed_exts = ['jpg', 'jpeg', 'png'];
        if (!in_array($photo_ext, $allowed_exts)) {
            $errors[] = "Only JPG, JPEG, and PNG files are allowed.";
        } else {
            $photo_path = 'uploads/' . uniqid() . '.' . $photo_ext;
            move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path);
        }
    } else {
        $errors[] = "Please upload a valid photo.";
    }

    // Check if email or mobile number already exists
    $check_query = "SELECT * FROM admins WHERE a_email = ? OR a_mobile = ?";
    $stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $mobile);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $existing_user = mysqli_fetch_assoc($result);
        if ($existing_user['a_email'] === $email) {
            $errors[] = "An account with this email already exists.";
        }
        if ($existing_user['a_mobile'] === $mobile) {
            $errors[] = "This mobile number is already registered.";
        }
    }
    mysqli_stmt_close($stmt);

    // Insert data if there are no errors
    if (empty($errors)) {
        $insert_query = "INSERT INTO admins (a_name, a_email, a_mobile, a_dob, a_img, a_password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $mobile, $dob, $photo_path, $password);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>document.addEventListener('DOMContentLoaded', function() { $('#successModal').modal('show'); });</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        // Display validation errors
        $error_messages = implode("<br>", $errors);
        echo "<script>document.addEventListener('DOMContentLoaded', function() { 
                $('#errorModal').modal('show'); 
                $('#errorModal .modal-body').html('$error_messages');
            });</script>";
    }
}

mysqli_close($conn);
?>



<!-- Bootstrap Modal HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="registration.css"> <!-- Link to custom styles -->
    <title>Registration</title>
</head>
<body>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="successModalLabel">🎉 Registration Successful!</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                You have successfully registered! Welcome aboard.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" onclick="redirectToRegistration()">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="errorModalLabel">🚫 Registration Error</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Error messages will be injected here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="redirectToRegistration()">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
function redirectToRegistration() {
    window.location.href = 'new_admin.php'; // Redirect to registration.php
}
</script>
</body>
</html>
</body> 
</html>