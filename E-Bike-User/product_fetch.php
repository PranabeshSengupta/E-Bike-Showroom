<?php
include("connect.php");

$sql = "SELECT model, id, price, b_range, b_image FROM product LIMIT 9";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='product-main-container'>";
    echo "<div class='container' id='card-container'>";

    while($row = $result->fetch_assoc()) {
        echo "
        <a href='product_details.php?model_id=" . urlencode($row["id"]) . "' class='card-link'>
            <div class='card'>
                <div class='card-img-wrapper'>
                    <img src='uploads/" . $row["b_image"] . "' alt='" . $row["model"] . "' class='card-img'>
                </div>
                <div class='card-body'>
                    <h5>" . htmlspecialchars($row["model"]) . "</h5>
                    <h5 class='price'> Price : " . htmlspecialchars($row["price"]) . " /-</h5>
                    <h5 class='range'> Range : " . htmlspecialchars($row["b_range"]) . " km/charge</h5>
                    <div class='card-btn'>
                    <button class='btn'>See more</button>
                    </div>
                </div>
            </div>
        </a>";
    }

    echo "</div>";
    echo "<div class='show-buttons'>
            <button id='show-more' class='s_btn'>Show More</button>
            <button id='show-less' class='s_btn' style='display: none;'>Show Less</button>
        </div>";
    echo "</div>";
} else {
    echo "No data found";
}

$conn->close();
?>
