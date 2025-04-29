<?php
include("connect.php");

if (isset($_GET['model_id'])) {
    $model_id = $_GET['model_id'];
    
    // Fetch the specific record from the database
    $sql = "SELECT * FROM product WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $model_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Populate each form field with database values
        $model = $row['model'];
        $price = $row['price'];
        $range = $row['b_range'];
        $displacement = $row['displacement'];
        $top_speed = $row['top_speed'];
        $charging_time = $row['charging_time'];
        $weight_capacity = $row['weight_capacity'];
        $weight_vehicle = $row['weight_vehicle'];
        $smart_dashboard = $row['smart_dashboard'];
        $app_connectivity = $row['app_connectivity'];
        $safety_features = $row['safety_features'];
        $light = $row['light'];
        $service_1 = $row['1st_service'];
        $service_2 = $row['2nd_service'];
        $service_3 = $row['3rd_service'];
    } else {
        echo "No record found.";
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
</head>
<body>
    <section class="product">
        <form action="bikes_update-2.php" method="post" enctype="multipart/form-data">
            <div class="form-grid">
                <h2 class="heading">Product Basic Details</h2>
                <input type="hidden" name="model_id" value="<?php echo $model_id; ?>">

                <label class="inp-heading">Model Name :</label>
                <input type="text" name="model" value="<?php echo $model; ?>" required>

                <label class="inp-heading">Price :</label>
                <input type="text" name="price" value="<?php echo $price; ?>" required>

                <label class="inp-heading">Range :</label>
                <input type="text" name="range" value="<?php echo $range; ?>" required>

                <h2 class="heading">Specifications</h2>
                <label class="inp-heading">Displacement :</label>
                <input type="text" name="displacement" value="<?php echo $displacement; ?>" required>

                <label class="inp-heading">Top speed :</label>
                <input type="text" name="top_speed" value="<?php echo $top_speed; ?>" required>

                <label class="inp-heading">Charging Time :</label>
                <input type="text" name="charging_time" value="<?php echo $charging_time; ?>" required>

                <label class="inp-heading">Weight Capacity :</label>
                <input type="text" name="weight_capacity" value="<?php echo $weight_capacity; ?>" required>

                <label class="inp-heading">Weight of the Vehicle :</label>
                <input type="text" name="weight_vehicle" value="<?php echo $weight_vehicle; ?>" required>

                <h2 class="heading">Key Features</h2>
                <label class="inp-heading">Smart Dashboard :</label>
                <input type="text" name="smart_dashboard" value="<?php echo $smart_dashboard; ?>" required>

                <label class="inp-heading">App Connectivity :</label>
                <input type="text" name="app_connectivity" value="<?php echo $app_connectivity; ?>" required>

                <label class="inp-heading">Safety Features :</label>
                <input type="text" name="safety_features" value="<?php echo $safety_features; ?>" required>

                <label class="inp-heading">Lights and Indicators :</label>
                <input type="text" name="light" value="<?php echo $light; ?>" required>

                <h2 class="heading">Service & Maintenance Schedule</h2>
                <label class="inp-heading">1st Service :</label>
                <input type="text" name="service_1" value="<?php echo $service_1; ?>" required>

                <label class="inp-heading">2nd Service :</label>
                <input type="text" name="service_2" value="<?php echo $service_2; ?>" required>

                <label class="inp-heading">3rd Service :</label>
                <input type="text" name="service_3" value="<?php echo $service_3; ?>" required>
                <input type="submit" class="submit" name="submit" value="Update">
            </div>
        </form>
    </section>
</body>
</html>
