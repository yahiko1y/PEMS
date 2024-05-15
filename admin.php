<?php
include 'connectDB.php';

    // Fetch the data from the database
    $sql = "SELECT * FROM users;";
    $stmt = $conn->query($sql);

    // Store the data in an array
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<?php include 'header.php';?>
<body>
<br>
<br>
<br>
<a class='btn btn-danger' href="actions/adduser.php" >Add User</a>
<table class="table">
      <thead>
        <tr>
          <th>User ID</th>
          <th>Email</th>
          <th>User name</th>
          
          <th colspan = '2'>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Iterate over the rows and display the data in the table
        if (!empty($rows)) {
          foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row["user_id"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["user_name"] . "</td>";
            echo "<td><a class='btn btn-danger' href='actions/reccurring.php?id=" . $row['user_id'] . "'>Edit</a></td>";
            echo "<td><a class='btn btn-danger' href='actions/removetran.php?id=" . $row['user_id'] . "'>remove</a></td>";

            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='5'>No data available</td></tr>";
        }
        ?>
      </tbody>
    </table>
</body>
</html>