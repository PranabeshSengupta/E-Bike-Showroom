<?php
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $model_id = $_POST['model_id'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $range = $_POST['range'];
    $displacement = $_POST['displacement'];
    $top_speed = $_POST['top_speed'];
    $charging_time = $_POST['charging_time'];
    $weight_capacity = $_POST['weight_capacity'];
    $weight_vehicle = $_POST['weight_vehicle'];
    $smart_dashboard = $_POST['smart_dashboard'];
    $app_connectivity = $_POST['app_connectivity'];
    $safety_features = $_POST['safety_features'];
    $light = $_POST['light'];
    $service_1 = $_POST['service_1'];
    $service_2 = $_POST['service_2'];
    $service_3 = $_POST['service_3'];

    // Update the product details in the database
    $sql = "UPDATE product SET 
                model = ?, 
                price = ?, 
                b_range = ?, 
                displacement = ?, 
                top_speed = ?, 
                charging_time = ?, 
                weight_capacity = ?, 
                weight_vehicle = ?, 
                smart_dashboard = ?, 
                app_connectivity = ?, 
                safety_features = ?, 
                light = ?, 
                1st_service = ?, 
                2nd_service = ?, 
                3rd_service = ?
            WHERE id = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param(
            $stmt,
            'sssssssssssssssi',
            $model,
            $price,
            $range,
            $displacement,
            $top_speed,
            $charging_time,
            $weight_capacity,
            $weight_vehicle,
            $smart_dashboard,
            $app_connectivity,
            $safety_features,
            $light,
            $service_1,
            $service_2,
            $service_3,
            $model_id
        );

        if (mysqli_stmt_execute($stmt)) {
            // echo "Product updated successfully.";
            ?>
            <meta http-equiv = "refresh" content = "0; url = http://localhost/Diamond E-Bike Admin/index.php" />
           <?php
        } else {
            echo "Error updating product: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
