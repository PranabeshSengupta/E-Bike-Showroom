<?php
include("connect.php");

if (isset($_POST['submit'])) {
    
    // Initialize an array to hold validation errors
    $errors = [];
    
    // Validate inputs
    if (empty($_POST['model'])) {
        $errors[] = "Model Name is required.";
    }
    if (empty($_POST['price']) || !is_numeric($_POST['price'])) {
        $errors[] = "A valid Price is required.";
    }
    if (empty($_POST['range']) || !is_numeric($_POST['range'])) {
        $errors[] = "A valid Range (Km/charge) is required.";
    }
    if (empty($_POST['displacement']) || !is_numeric($_POST['displacement'])) {
        $errors[] = "A valid Displacement (CC) is required.";
    }
    if (empty($_POST['top_speed']) || !is_numeric($_POST['top_speed'])) {
        $errors[] = "A valid Top Speed (Km/h) is required.";
    }
    if (empty($_POST['charging_time']) || !is_numeric($_POST['charging_time'])) {
        $errors[] = "A valid Charging Time (hours) is required.";
    }
    if (empty($_POST['weight_capacity']) || !is_numeric($_POST['weight_capacity'])) {
        $errors[] = "A valid Weight Capacity (Kg) is required.";
    }
    if (empty($_POST['weight_vehicle']) || !is_numeric($_POST['weight_vehicle'])) {
        $errors[] = "A valid Weight of the Vehicle (Kg) is required.";
    }
    if (empty($_POST['smart_dashboard'])) {
        $errors[] = "Smart Dashboard details are required.";
    }
    if (empty($_POST['app_connectivity'])) {
        $errors[] = "App Connectivity details are required.";
    }
    if (empty($_POST['safety_features'])) {
        $errors[] = "Safety Features details are required.";
    }
    if (empty($_POST['light'])) {
        $errors[] = "Lights and Indicators details are required.";
    }
    if (empty($_POST['service_1'])) {
        $errors[] = "1st Service details are required.";
    }
    if (empty($_POST['service_2'])) {
        $errors[] = "2nd Service details are required.";
    }
    if (empty($_POST['service_3'])) {
        $errors[] = "3rd Service details are required.";
    }

    // Check for image upload
    if (!isset($_FILES['image']) || $_FILES['image']['error'] != UPLOAD_ERR_OK) {
        $errors[] = "Main image upload failed.";
    }
    
    // Check for gallery image uploads
    for ($i = 1; $i <= 5; $i++) {
        if (!isset($_FILES['g_image_' . $i]) || $_FILES['g_image_' . $i]['error'] != UPLOAD_ERR_OK) {
            $errors[] = "Gallery Image-$i upload failed.";
        }
    }

    // If there are no validation errors
    if (empty($errors)) {
        // Escape the inputs for database insertion
        $model = mysqli_real_escape_string($conn, $_POST['model']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $range = mysqli_real_escape_string($conn, $_POST['range']);
        $displacement = mysqli_real_escape_string($conn, $_POST['displacement']);
        $top_speed = mysqli_real_escape_string($conn, $_POST['top_speed']);
        $charging_time = mysqli_real_escape_string($conn, $_POST['charging_time']);
        $weight_capacity = mysqli_real_escape_string($conn, $_POST['weight_capacity']);
        $weight_vehicle = mysqli_real_escape_string($conn, $_POST['weight_vehicle']);
        $smart_dashboard = mysqli_real_escape_string($conn, $_POST['smart_dashboard']);
        $app_connectivity = mysqli_real_escape_string($conn, $_POST['app_connectivity']);
        $safety_features = mysqli_real_escape_string($conn, $_POST['safety_features']);
        $light = mysqli_real_escape_string($conn, $_POST['light']);
        $service_1 = mysqli_real_escape_string($conn, $_POST['service_1']);
        $service_2 = mysqli_real_escape_string($conn, $_POST['service_2']);
        $service_3 = mysqli_real_escape_string($conn, $_POST['service_3']);

        // Upload images function
        function upload_image($file, $target_dir) {
            $image_name = basename($file['name']);
            $target_file = $target_dir . $image_name;
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true); 
            }
            if (move_uploaded_file($file['tmp_name'], $target_file)) {
                return $image_name;
            } else {
                return false;
            }
        }

        // Specify the image folder path
        $image_folder = "C:\Users\Tahir\Desktop\php\htdocs\minor_project\uploads/";
        $main_image = upload_image($_FILES['image'], $image_folder);
        $gallery_image_1 = upload_image($_FILES['g_image_1'], $image_folder);
        $gallery_image_2 = upload_image($_FILES['g_image_2'], $image_folder);
        $gallery_image_3 = upload_image($_FILES['g_image_3'], $image_folder);
        $gallery_image_4 = upload_image($_FILES['g_image_4'], $image_folder);
        $gallery_image_5 = upload_image($_FILES['g_image_5'], $image_folder);

        // Check if all images were uploaded successfully
        if ($main_image && $gallery_image_1 && $gallery_image_2 && $gallery_image_3 && $gallery_image_4 && $gallery_image_5) {
            // Prepare the SQL statement
            $sql = "INSERT INTO product (model, price, b_range, displacement, top_speed, charging_time, weight_capacity, weight_vehicle, smart_dashboard, app_connectivity, safety_features, light, 1st_service, 2nd_service, 3rd_service, b_image, g_image_1, g_image_2, g_image_3, g_image_4, g_image_5) 
                    VALUES ('$model', '$price', '$range', '$displacement', '$top_speed', '$charging_time', '$weight_capacity', '$weight_vehicle', '$smart_dashboard', '$app_connectivity', '$safety_features', '$light', '$service_1', '$service_2', '$service_3', '$main_image', '$gallery_image_1', '$gallery_image_2', '$gallery_image_3', '$gallery_image_4', '$gallery_image_5')";

            // Execute the query
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Record inserted successfully');</script>";
                echo '<meta http-equiv="refresh" content="0; url=http://localhost/Diamond E-Bike Admin/add_scooty.html" />';
            } else {
                echo "<script>alert('Sorry, the record could not be inserted. Please check your input.');</script>";
                echo '<meta http-equiv="refresh" content="0; url=http://localhost/Diamond E-Bike Admin/add_scooty.html" />';
            }
        } else {
            echo "<script>alert('Failed to upload one or more images. Please try again.');</script>";
            echo '<meta http-equiv="refresh" content="0; url=http://localhost/Diamond E-Bike Admin/add_scooty.html" />';
        }
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
        echo '<meta http-equiv="refresh" content="0; url=http://localhost/Diamond E-Bike Admin/add_scooty.html" />';
    }
}

mysqli_close($conn);
?>




