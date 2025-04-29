<?php
include("connect.php");  
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

$sql = "SELECT model, price, b_range, b_image FROM product LIMIT 9 OFFSET $offset";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "
        <a href='product_details.php?model=" . urlencode($row["model"]) . "' class='card-link'>
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
    
} else {
   
    echo "";
}
$conn->close();
?>
