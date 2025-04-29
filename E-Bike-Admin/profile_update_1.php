<?php
include("connect.php");

// Get the profile ID from the URL
$profile_id = $_GET['profile_id'];

// Fetch the data for this profile ID
$sql = "SELECT * FROM admins WHERE id = $profile_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Check if data is found
if (!$row) {
    echo "No record found.";
    exit;
}
?>

<div class="container">
    <div class="form-container">
        <h3>Update Profile</h3>
        <form method="POST" action="profile_update_2.php" id="update-form" enctype="multipart/form-data">
            <input type="hidden" name="profile_id" value="<?php echo $profile_id; ?>">
            
            <div class="input-group">
                <label for="name"><i class="fas fa-user"></i></label>
                <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $row['a_name']; ?>" required>
            </div>
            <div class="input-group">
                <label for="email"><i class="fas fa-envelope"></i></label>
                <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $row['a_email']; ?>" required>
            </div>
            <div class="input-group">
                <label for="mobile"><i class="fas fa-phone"></i></label>
                <input type="tel" id="mobile" name="mobile" placeholder="Mobile Number" value="<?php echo $row['a_mobile']; ?>" required>
            </div>
            <div class="input-group">
                <label for="dob"><i class="fas fa-calendar-alt"></i></label>
                <input type="date" id="dob" name="dob" value="<?php echo $row['a_dob']; ?>" required>
            </div>
            <div class="input-group">
                <label for="photo"><i class="fas fa-camera"></i></label>
                <input type="file" id="photo" name="photo" accept="image/*">
            </div>
            <button type="submit" name="update" class="signup-btn">Update</button>
        </form>
    </div>
</div>

<?php mysqli_close($conn); ?>
