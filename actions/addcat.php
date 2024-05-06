<?php


session_start();
include '../connectDB.php';

$user=$_SESSION['user_id'];
$name = $_POST['cat'];
echo"category is: ".$name."\n";
echo"user ID is: ".$user."\n";


$stmt = $conn->prepare("INSERT INTO category(user_id,categoryName)
  VALUES (:u, :e)");

$stmt->bindParam(':u', $user);
$stmt->bindParam(':e', $name);



$stmt->execute();
header("Location: addexpense.php");
    exit();

?>