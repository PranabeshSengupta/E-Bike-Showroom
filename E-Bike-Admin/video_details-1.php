<?php
include("connect.php");

// Get the video ID from the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id) {
    // Fetch the video path from the database
    $sql = "SELECT p_video FROM video WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $videoPath = $row['p_video'];
    } else {
        echo "Video not found.";
        exit;
    }
} else {
    echo "Invalid video ID.";
    exit;
}

// Close the database connection
mysqli_close($conn);
?>

<div class="video-container">
    <video controls>
        <source src="<?php echo htmlspecialchars($videoPath); ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
