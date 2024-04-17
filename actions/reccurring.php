<?php
session_start();
// Retrieve the value of 'id' from the URL parameter
if (isset($_GET['id'])) {
  $id = $_GET['id'];
 
  
  include '../connectDB.php';

  // Fetch the data from the database
  $sql = "SELECT * FROM `expense` WHERE exp_id= $id";
  $stmt = $conn->query($sql);

  // Store the data in an array
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$data = array(); // Create an empty array

if (!empty($rows)) {
    foreach ($rows as $row) {
        $rowData = array(
            "user_id" => $_SESSION['user_id'],
            "exp" => $row["exp"],
            "price" => $row["price"],
            "exp_type" => $row["exp_type"]
        );
        $data[] = $rowData; // Append the row data to the array
    }
}else {
    echo "No data available";
  }
}

$r=0;

$stmt = $conn->prepare("INSERT INTO expense(user_id, exp, price, is_recurring, exp_type)
  VALUES (:u, :e, :p, :i, :x)");

$stmt->bindParam(':u', $data[0]["user_id"]);
$stmt->bindParam(':e', $data[0]["exp"]);
$stmt->bindParam(':p', $data[0]["price"]);
$stmt->bindParam(':i', $r);
$stmt->bindParam(':x', $data[0]["exp_type"]);

$stmt->execute();
echo"Data Added succefully ";

echo "<script>";
echo "setTimeout(function(){ window.location.href = '../addExpense.php' }, 1500);"; 
echo "</script>";
?>