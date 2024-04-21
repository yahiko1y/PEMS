<?php 
session_start(); 
include "db_conn.php";
if (isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['email'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
    $email = validate($_POST['email']);


    $query = "SELECT COUNT(*) AS email_count
    FROM users
    WHERE email = '$email'";

$query2 = "SELECT COUNT(*) AS c
FROM users
WHERE user_name = '$uname'";

$result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query2);
if ($result) {
$row = mysqli_fetch_assoc($result);
$emailCount = $row['email_count'];
if ($emailCount<1){
    if ($result2){
        $row2 = mysqli_fetch_assoc($result2);
        $userCount = $row2['c'];
        
        if ($userCount<1){
            $stmt = $conn->prepare("INSERT INTO users(email, user_name, password_) VALUES (?, ?, ?)");
            $stmt->bind_param('sss', $email, $uname, $pass);
            $stmt->execute();
          header("Location: ../index.php?message=Registered successfully now you can login");
          exit();

     
        }
            else{
                header("Location: register.php?error=User Name is already used");
                exit(); 
        }

}

    
}else{
    header("Location: register.php?error=Email is already used");
    exit();
} 
   
} else {
    echo "Error executing query: " . mysqli_error($conn);
    }
    
}