<?php
session_start();
// Retrieve the value of 'id' from the URL parameter
if (isset($_GET['id'])) {
  $id = $_GET['id'];
 $x = 0;
  
  include '../connectDB.php';

  // Fetch the data from the database
  $stmt= $conn->prepare("UPDATE expense SET is_recurring = :x where exp_id = :y");

  $stmt->bindParam(':x', $x);
  $stmt->bindParam(':y', $id);

 
$stmt->execute();
echo"Data Updated succefully ";

echo "<script>";
echo "setTimeout(function(){ window.location.href = '../addExpense.php' }, 1500);"; 
echo "</script>";
}
?>