<?php


include 'connectDB.php';

$user=1;
$name = $_POST['name'];
$price = $_POST['price'];
$date = $_POST['date'];
$recurring = isset($_POST['r']) ? 1 : 0;
$expenseType = $_POST['expenseType']; 
$stmt = $conn->prepare("INSERT INTO expense(user_id, exp, price, is_recurring, Purchase_date, exp_type)
  VALUES (:u, :e, :p, :i, :d, :x)");

$stmt->bindParam(':u', $user);
$stmt->bindParam(':e', $name);
$stmt->bindParam(':p', $price);
$stmt->bindParam(':i', $recurring);
$stmt->bindParam(':d', $date);
$stmt->bindParam(':x', $expenseType);

$stmt->execute();
echo"Data Added succefully ";

echo "<script>";
echo "setTimeout(function(){ window.location.href = 'addExpense.php' }, 1500);"; 
echo "</script>";
?>

