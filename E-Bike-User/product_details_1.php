<?php
include("connect.php");

// Get the model_id from the URL
if (isset($_GET['model_id'])) {
    $model_id = mysqli_real_escape_string($conn, $_GET['model_id']);
    
    // Fetch full data for the product based on model_id
    $sql = "SELECT * FROM product WHERE id = '$model_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the product details
        $row = $result->fetch_assoc();
        ?>
        <section class="products_details">
            <div class="products_details_heading">
                <h2><?php echo htmlspecialchars($row['model']); ?></h2>
            </div>
            <div class="slider-container">
                <div class="slider-wrapper">
                    <div class="product_images">
                        <img id="img" src="uploads/<?php echo $row['b_image']; ?>">
                    </div>
                    <div class="product_images">
                        <img id="img" src="uploads/<?php echo $row['g_image_1']; ?>">
                    </div>
                    <div class="product_images">
                        <img id="img" src="uploads/<?php echo $row['g_image_2']; ?>">
                    </div>
                    <div class="product_images">
                        <img id="img" src="uploads/<?php echo $row['g_image_3']; ?>">
                    </div>
                    <div class="product_images">
                        <img id="img" src="uploads/<?php echo $row['g_image_4']; ?>">
                    </div>
                    <div class="product_images">
                        <img id="img" src="uploads/<?php echo $row['g_image_5']; ?>">
                    </div>
                </div>
            </div>
            <div class="buttons">
                <button id="prev">prev</button>
                <button id="next">next</button>
            </div>

            <div class="products_details_table">
                <table cellspacing="20">
                    <tr>
                        <th colspan="2">Product Details</th>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><?php echo htmlspecialchars($row['price']); ?> /-</td>
                    </tr>
                    <tr>
                        <td>Range</td>
                        <td><?php echo htmlspecialchars($row['b_range']); ?> Km/Charge</td>
                    </tr>
                    <tr>
                        <th colspan="2">Specifications</th>
                    </tr>
                    <tr>
                        <td>Displacement</td>
                        <td><?php echo htmlspecialchars($row['displacement']); ?></td>
                    </tr>
                    <tr>
                        <td>Top Speed</td>
                        <td><?php echo htmlspecialchars($row['top_speed']); ?> Km/h</td>
                    </tr>
                    <tr>
                        <td>Charging Time</td>
                        <td><?php echo htmlspecialchars($row['charging_time']); ?> hours</td>
                    </tr>
                    <tr>
                        <td>Weight Capacity</td>
                        <td><?php echo htmlspecialchars($row['weight_capacity']); ?> Kg</td>
                    </tr>
                    <tr>
                        <td>Weight of Vehicle</td>
                        <td><?php echo htmlspecialchars($row['weight_vehicle']); ?> Kg</td>
                    </tr>
                    <tr>
                        <th colspan="2">Key Features</th>
                    </tr>
                    <tr>
                        <td>Smart Dashboard</td>
                        <td><?php echo htmlspecialchars($row['smart_dashboard']); ?></td>
                    </tr>
                    <tr>
                        <td>App Connectivity</td>
                        <td><?php echo htmlspecialchars($row['app_connectivity']); ?></td>
                    </tr>
                    <tr>
                        <td>Safety Features</td>
                        <td><?php echo htmlspecialchars($row['safety_features']); ?></td>
                    </tr>
                    <tr>
                        <td>Lights and Indicators</td>
                        <td><?php echo htmlspecialchars($row['light']); ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">Service And Maintenance Schedule</th>
                    </tr>
                    <tr>
                        <td>1st Service</td>
                        <td><?php echo htmlspecialchars($row['1st_service']); ?></td>
                    </tr>
                    <tr>
                        <td>2nd Service</td>
                        <td><?php echo htmlspecialchars($row['2nd_service']); ?></td>
                    </tr>
                    <tr>
                        <td>3rd Service</td>
                        <td><?php echo htmlspecialchars($row['3rd_service']); ?></td>
                    </tr>
                </table>
            </div>
        </section>
        <?php
    } else {
        echo "No details found for this product.";
    }
} else {
    echo "No product selected.";
}

// Close the connection
$conn->close();
?>

