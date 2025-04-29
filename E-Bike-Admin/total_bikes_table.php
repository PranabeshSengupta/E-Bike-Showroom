<?php
include("connect.php");
                  
 // Fetch data from the 'product' table
 $sql = "SELECT id, model, price, b_range FROM product";  // Adjust the columns based on your needs
 $result = mysqli_query($conn, $sql);
                  
 if (mysqli_num_rows($result) > 0) {
    echo '<div class="table-responsive">';
    echo '<table class="table align-items-center table-flush">';
    echo '<thead class="thead-light">';
    echo '<tr>';
    echo '<th>Model</th>';
    echo '<th>Price</th>';
    echo '<th>Range</th>';
    echo '<th>Action-1</th>';
    echo '<th>Action-2</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
                      
    // Loop through each row and display the data
     while ($row = mysqli_fetch_assoc($result)) {
           $model = $row['model'];
           $price = $row['price'];
           $range = $row['b_range'];
           $id = $row['id'];
                          
           echo '<tr>';
           echo "<td>$model</td>";
           echo "<td>$price </td>";
           echo "<td>$range km/charge</td>";
           echo '<td><a href="bikes_update.php?model_id=' . $id . '" class="btn btn-sm btn-success">Update</a></td>';
          //  echo '<td><a href="bikes_delete.php?model_id=' . $id . '" class="btn btn-sm btn-danger">Delete</a></td>';
           echo '<td><button onclick="confirmDelete(' . $id . ')" class="btn btn-sm btn-danger">Delete</button></td>';
           echo '</tr>';
  }
                      
           echo '</tbody>';
           echo '</table>';
           echo '</div>';
          } else {
           echo "No records found.";
         }
                  
// Close the database connection
 mysqli_close($conn);
 ?>

 <!-- Modal Structure -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <h3>Confirm Deletion</h3>
        <p>Are you sure you want to delete this data?</p>
        <div class="modal-buttons">
            <button onclick="deleteRecord()" class="confirm-btn">Yes, Delete</button>
            <button onclick="closeModal()" class="cancel-btn">Cancel</button>
        </div>
    </div>
</div>

<!-- CSS for Modal -->
<style>
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    width: 300px;
}

.modal-buttons {
    display: flex;
    justify-content: space-around;
    margin-top: 15px;
}

.confirm-btn, .cancel-btn {
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.confirm-btn {
    background-color: #dc3545;
    color: #fff;
}

.cancel-btn {
    background-color: #6c757d;
    color: #fff;
}
</style>

<!-- JavaScript for Modal -->
<script>
let modelIdToDelete = null;

function confirmDelete(id) {
    modelIdToDelete = id;  // Set the ID for deletion
    document.getElementById('deleteModal').style.display = 'flex'; // Show the modal
}

function closeModal() {
    document.getElementById('deleteModal').style.display = 'none'; // Hide the modal
}

function deleteRecord() {
    if (modelIdToDelete) {
        window.location.href = `bikes_delete.php?model_id=${modelIdToDelete}`;
    }
}
</script>