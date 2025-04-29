<?php
include("connect.php");

if (isset($_POST['update'])) {
    // Get data from the form
    $profile_id = trim($_POST['profile_id']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $dob = trim($_POST['dob']);
    
    // Initialize an array for error messages
    $errors = [];

    // Strong validation for each input field
    if (empty($profile_id) || !ctype_digit($profile_id)) {
        $errors[] = "Invalid profile ID.";
    }

    if (empty($name) || !preg_match('/^[a-zA-Z\s]{2,50}$/', $name)) {
        $errors[] = "Name must contain only letters and spaces, and be 2-50 characters long.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email address is required.";
    }

    if (empty($mobile) || !preg_match('/^\d{10}$/', $mobile)) {
        $errors[] = "A valid 10-digit mobile number is required.";
    }

    if (empty($dob) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $dob) || !strtotime($dob)) {
        $errors[] = "A valid date of birth (YYYY-MM-DD) is required.";
    }

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = 'uploads/' . basename($_FILES['photo']['name']);
        $file_type = strtolower(pathinfo($photo, PATHINFO_EXTENSION));

        if (!in_array($file_type, ['jpg', 'jpeg', 'png'])) {
            $errors[] = "Only JPG, JPEG, and PNG formats are allowed for the photo.";
        } elseif ($_FILES['photo']['size'] > 2 * 1024 * 1024) {
            $errors[] = "The photo size should not exceed 2MB.";
        } else {
            move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
            $photo_sql = ", a_img='$photo'";
        }
    } else {
        $photo_sql = "";
    }

    // Show error modal if there are validation errors
    if (count($errors) > 0) {
        echo "<script>document.addEventListener('DOMContentLoaded', function () { openModal('errorModal', '" . implode("<br>", $errors) . "'); });</script>";
    } else {
        $sql = "UPDATE admins SET 
                    a_name='" . mysqli_real_escape_string($conn, $name) . "', 
                    a_email='" . mysqli_real_escape_string($conn, $email) . "', 
                    a_mobile='" . mysqli_real_escape_string($conn, $mobile) . "', 
                    a_dob='" . mysqli_real_escape_string($conn, $dob) . "' 
                    $photo_sql 
                WHERE id=" . mysqli_real_escape_string($conn, $profile_id);

        if (mysqli_query($conn, $sql)) {
            echo "<script>document.addEventListener('DOMContentLoaded', function () { openModal('successModal'); });</script>";
        } else {
            echo "<script>document.addEventListener('DOMContentLoaded', function () { openModal('errorModal', 'Error updating record: " . mysqli_error($conn) . "'); });</script>";
        }
    }

    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="update_modal.css">
    
</head>

<body>

   
    <!-- Error Modal -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('errorModal')">&times;</span>
            <p id="errorMessage"></p>
            <button onclick="redirectTo('profiles.php')">OK</button>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('successModal')">&times;</span>
            <p>Record updated successfully.</p>
            <button onclick="redirectTo('profiles.php')">OK</button>
        </div>
    </div>

    <script>


        function openModal(modalId, message = '') {
            // Close any open modals
            closeModal('errorModal');
            closeModal('successModal');

            // Set the message and open the correct modal
            const modal = document.getElementById(modalId);
            if (message && modalId === 'errorModal') {
                document.getElementById('errorMessage').innerHTML = message;
            }
            modal.classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        function redirectTo(url) {
            window.location.href = url;
        }

    </script>

</body>

</html>