<?php
include("connect.php");
// Fetch testimonials from the database
$sql = "SELECT c_name, review, photo, c_rating FROM review WHERE c_rating >= 3"; 
// $sql = "SELECT c_name,c_rating, review, photo FROM review";
$result = $conn->query($sql);

// Check if there are testimonials
if ($result->num_rows > 0) {
    echo '<section class="container">';
    echo '    <div class="testimonial mySwiper">';
    echo '      <div class="review-container-heading">';
    echo '        <h1>Our Testimonials</h1>';
    echo '        <p>What our happy clients say about us</p>';
    echo '      </div>';
    echo '      <div class="testi-content swiper-wrapper">';

    // Loop through the testimonials and generate the HTML structure
    while ($row = $result->fetch_assoc()) {
        $name = $row['c_name'];
        $review = $row['review'];
        $image_path = $row['photo'];
        $rating = (int)$row['c_rating'];

        echo '        <div class="slide swiper-slide">';
        echo '          <img src="' . $image_path . '" alt="" class="image" />';
        echo '          <p>' . $review . '</p>';
        echo '          <div class="rating">';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating) {
                echo '            <span class="star">&#9733;</span>'; // Filled star
            } else {
                echo '            <span class="star">&#9734;</span>'; // Empty star
            }
        }
        echo '          </div>';
        echo '          <div class="details">';
        echo '            <span class="name">' . $name . '</span>';
        echo '          </div>';
        echo '        </div>';
    }

    echo '      </div>';
    echo '      <div class="swiper-button-next nav-btn"></div>';
    echo '      <div class="swiper-button-prev nav-btn"></div>';
    echo '      <div class="swiper-pagination"></div>';
    echo '    </div>';
    echo '</section>';
} else {
    echo 'No testimonials found.';
}

$conn->close();
?>
