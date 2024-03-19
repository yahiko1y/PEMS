<?php
$servername = "localhost";
$username = "root";
$password = '';

try {
  $conn = new PDO("mysql:host=$servername;dbname=final", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connection Successfully ";
  echo "<script>";
  echo "setTimeout(function(){ window.location.href = 'index.php' }, 3000);"; 
  echo "</script>";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>