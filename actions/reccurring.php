<?php
// Retrieve the value of 'id' from the URL parameter
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  echo $id;
  
  include '../connectDB.php';

  // Fetch the data from the database
  $sql = "SELECT * FROM `expense` WHERE exp_id= $id";
  $stmt = $conn->query($sql);

  // Store the data in an array
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (!empty($rows)) {
    foreach ($rows as $row) {
      echo $row["exp"];
      echo $row["price"];
      echo $row["exp_type"];
    }
  } else {
    echo "No data available";
  }
}
?>