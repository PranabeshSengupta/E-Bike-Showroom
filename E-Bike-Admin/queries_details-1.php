<?php
include("connect.php"); // Include your database connection

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get the id from the URL and ensure it's an integer

    // Fetch data for the specific comment
    $sql = "SELECT * FROM comments WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['c_name'];
        $email = $row['c_email'];
        $question = $row['c_question'];
        $mobile = $row['c_mobile'];
        $product = $row['product_name'];

        // Display the data in a table format
        echo '<div class="table-responsive">';
        echo '<table class="table align-items-center table-flush">';
        echo '<tr><th>Name</th><td>' . htmlspecialchars($name) . '</td></tr>';
        echo '<tr><th>Email</th><td>' . htmlspecialchars($email) . '</td></tr>';
        echo '<tr><th>Mobile</th><td>' . htmlspecialchars($mobile) . '</td></tr>';
        echo '<tr><th>Product name </th><td>' . htmlspecialchars($product) . '</td></tr>';
        echo '<tr><th>Question</th><td>' . htmlspecialchars($question) . '</td></tr>';
        // echo '<tr><th>Mobile</th><td>' . htmlspecialchars($mobile) . '</td></tr>';
        echo '</table>';
        echo '</div>';

        // Centered and Styled Reply Form
        echo '<div class="reply-form-container">';
        echo '<h3>Reply to Customer</h3>';
        echo '<form action="send_queries_reply.php" method="POST">';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($id) . '">';
        echo '<input type="hidden" name="email" value="' . htmlspecialchars($email) . '">';
        echo '<input type="hidden" name="question" value="' . htmlspecialchars($question) . '">';
        echo '<textarea name="reply_message" rows="4" placeholder="Type your reply here..." required></textarea><br>';
        echo '<button type="submit" name="submit_reply" class="btn-submit">Send Reply</button>';
        echo '</form>';
        echo '</div>';
    } else {
        echo "No record found for this ID.";
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
mysqli_close($conn);
?>

<!-- CSS for Centered and Styled Reply Form -->
<style>
.reply-form-container {
    width: 100%;
    max-width: 500px;
    margin: 30px auto;
    padding: 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #f9f9f9;
    border-radius: 8px;
    text-align: center;
}

.reply-form-container h3 {
    font-family: Arial, sans-serif;
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

.reply-form-container textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    resize: vertical;
    margin-bottom: 15px;
}

.btn-submit {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-submit:hover {
    background-color: #45a049;
}
</style>
