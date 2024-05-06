<?php 
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {

}else{
     header("Location: index.php");
     exit();
}
 ?>
<?php
include 'connectDB.php';

    // Fetch the data from the database
    $cat = $_POST["exptype"];

    $start_date = $_POST["date1"];
    $end_date = $_POST["date2"];

    $sql = "SELECT expense.user_id, exp, exp_id, categoryName, Purchase_date, price 
    FROM expense 
    JOIN category ON expense.exp_type = category.categoryID 
    WHERE expense.user_id = " . $_SESSION['user_id'] . " 
    AND Purchase_date >= '" . $start_date . "' 
    AND Purchase_date <= '" . $end_date . "'
    AND categoryName = '" . $cat . "'";

$stmt = $conn->query($sql);

// Store the data in an array
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'header.php';?>

<body>
<?php include 'sidebar.php';?>
        <!-- Main Component -->
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button" data-bs-theme="dark">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3>Transtions</h3>
                    </div>
                </div>
                <div class="container rev">
            
                    <div class="card-body">
    <h1>transactions history</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Expense</th>
          <th>Price</th>
          <th>Expense Type</th>
          <th colspan = '2'>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Iterate over the rows and display the data in the table
        if (!empty($rows)) {
          foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row["exp"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["categoryName"] . "</td>";
            echo "<td><a class='btn btn-danger' href='actions/reccurring.php?id=" . $row['exp_id'] . "'>Edit</a></td>";
            echo "<td><a class='btn btn-danger' href='actions/removetran.php?id=" . $row['exp_id'] . "'>remove</a></td>";

            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='4'>No data available</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
                  </div>
            </main>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>