<?php
include("connect.php");

$sql = "SELECT model, id, price, b_image FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<section class="main-vehicle-container">
        <h2>See Our E-Bikes</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <div class="vehicle-card-container">
          <div class="vehicle-card-slider" id="vehicleSlider">';

    while ($row = $result->fetch_assoc()) {
        echo '
        <a href="product_details.php?model_id=' . urlencode($row['id']) . '" class="card-link">
        <div class="main-vehicle-card">
            <div class="vehicle-card-img">
                <img src="uploads/' . $row["b_image"] . '" alt="' . $row["model"] . '">
            </div>
            <div class="vehicle-card-text-container">
                <div class="vehicle-card-text">
                    <h3>' . htmlspecialchars($row["model"]) . '</h3>  <!-- Displaying model name in the h3 tag properly -->
                </div>
                <div class="vehicle-card-btn">
                    <button id="vehicle-card-btn">View More</button>
                </div>
            </div>
        </div>
        </a>';
    }

    echo '</div>
          </div>
        <div class="vehicle-next-prev-btn">
            <button id="vehicle-prev-btn">Prev</button>
            <button id="vehicle-next-btn">Next</button>
        </div>
    </section>';
} else {
    echo "<p>No vehicles found!</p>";
}

$conn->close();
?>
