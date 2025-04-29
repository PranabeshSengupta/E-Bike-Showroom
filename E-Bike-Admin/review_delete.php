<?php
include("connect.php");

if (isset($_GET['review_id'])) {
    $model_id = $_GET['review_id'];
    
    // Delete record from the 'comments' table
    
    $sql = "DELETE FROM review WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $model_id);
    
    if (mysqli_stmt_execute($stmt)) {
        // echo "Record deleted successfully.";
        ?>
        <meta http-equiv = "refresh" content = "0; url = http://localhost/Diamond E-Bike Admin/review.php" />
       <?php
        // header("Location: bikes_list.php"); 
        // exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>
