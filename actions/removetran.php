<?php
session_start();
// Retrieve the value of 'id' from the URL parameter
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  
  include '../connectDB.php';

  // Fetch the data from the database
  $stmt= $conn->prepare("DELETE FROM expense where exp_id = :y");

  
  $stmt->bindParam(':y', $id);

 
$stmt->execute();
echo"Data Updated succefully ";

echo "<script>";
echo "setTimeout(function(){ window.location.href = '../histroy.php' }, 1500);"; 
echo "</script>";
}
?>