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
$user= $_SESSION['user_id'];
    // Fetch the data from the database
    $sql = "SELECT expense.user_id,exp, exp_id, categoryName, Purchase_date, price FROM `expense` JOIN `category` ON expense.exp_type = category.categoryID WHERE expense.user_id = $_SESSION[user_id] ; ";
    $stmt = $conn->query($sql);

    // Store the data in an array
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = "SELECT * FROM `category` where `user_id`=1 or `user_id` =$user";
    $stmt2 = $conn->query($sql2);
    $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
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
                <div class="container">
            
        <div class="col-md-6 card-body">
        
          <h2>Filter</h2>
          <form action="filter.php" method="post">
          <div class="form-group">
                        <label>Category:</label>
                        <select id="exptype" name="exptype">
                        <option disabled selected>Select type</option> 
                        <?php
                        if (!empty($rows2)) {
                          foreach ($rows2 as $row2) {
                        
                            echo '<option value="' . $row2['categoryName'] . '">' . $row2['categoryName'] . '</option>';
                            
                          }
                        } else {
                          echo '<option value="no data">no data</option>';
                        }
                        ?>
                       </select>
                      </div>
                      <div class="form-group">
                        <label for="date">StartDate:</label>
                        <input type="date" class="form-control" id="date" name="date1" >
                      </div>
                      <div class="form-group">
                        <label for="date">EndDate:</label>
                        <input type="date" class="form-control" id="date" name="date2" >
                      </div>
                     
        <input type="submit" class="btn btn-secondary">
                    </form>
                    </div>
                  </div>
                    <div class="card-body">
    <h1>transactions history</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Expense</th>
          <th>Price</th>
          <th>Expense Type</th>
          <th>Date </th>
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
            echo "<td>" . $row["Purchase_date"] . "</td>";
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