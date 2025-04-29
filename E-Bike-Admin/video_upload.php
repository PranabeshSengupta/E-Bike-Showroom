<?php
include("connect.php");

if (isset($_POST['submit'])) {
    // Check if video file is uploaded
    if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        // Allowed file types
        $allowed_types = array('video/mp4', 'video/avi', 'video/mpeg', 'video/mov');
        $file_type = $_FILES['video']['type'];
        $file_size = $_FILES['video']['size'];

        
        $max_size = 1024 * 1024 * 1024; 

        // Validate file type and size
        if (in_array($file_type, $allowed_types) && $file_size <= $max_size) {
            // Set file upload path
            $upload_dir = 'C:\\Users\\Tahir\\Desktop\\php\\htdocs\\minor_project\\videos\\';
            $upload_dir_1 = 'C:\\Users\\Tahir\\Desktop\\php\\htdocs\\Diamond E-Bike Admin\\videos\\';
            $file_name = basename($_FILES['video']['name']);
            $upload_path = $upload_dir . $file_name;
            $upload_path_1 = $upload_dir_1 . $file_name;

            // Ensure path exists
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            if (!is_dir($upload_dir_1)) {
                mkdir($upload_dir_1, 0777, true);
            }

            // Move file to the specific directory
            if (move_uploaded_file($_FILES['video']['tmp_name'], $upload_path)) {
                // Insert only relative path into database
                if(copy($upload_path, $upload_path_1)){
                $relative_path = 'videos/' . $file_name;
                $sql = "INSERT INTO video (p_video) VALUES ('$relative_path')";
                }

                if ($conn->query($sql) === TRUE) {
                    // Redirect to add_video.php
                    echo "<meta http-equiv='refresh' content='0; url=http://localhost/Diamond E-Bike Admin/add_video.php' />";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Failed to move the uploaded video.";
            }
        } else {
            echo "Invalid file type or file too large.";
        }
    } else {
        echo "No video file uploaded.";
    }
}

$conn->close();
?>
