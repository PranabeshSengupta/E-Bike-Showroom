<?php
 include("connect.php");
// Fetch videos from the database
$sql = "SELECT p_video FROM video";
$result = $conn->query($sql);

// Check if there are videos
if ($result->num_rows > 0) {
    echo '<div class="whatsnew">';
    echo '    <div class="whatsnew-headings">';
    echo '      <h1>what\'s new</h1>';
    echo '      <p>See our new videos</p>';
    echo '    </div>';
    echo '  <section class="main swiper mySwiper-1">';
    echo '    <div class="wrapper swiper-wrapper">';

    // Loop through each video and output the HTML structure for it
    while ($row = $result->fetch_assoc()) {
        $videoPath = $row['p_video'];
        echo '      <div class="slide swiper-slide">';
        echo '        <video controls autoplay loop muted class="image">';
        echo '          <source src="'.$videoPath.'" type="video/mp4">';
        echo '        </video>';
        echo '      </div>';
    }

    echo '    </div>';
    echo '    <div class="swiper-button-next nav-btn"></div>';
    echo '    <div class="swiper-button-prev nav-btn"></div>';
    echo '    <div class="swiper-pagination"></div>';
    echo '  </section>';
    echo '</div>';
} else {
    echo 'No videos found.';
}

$conn->close();
?>
