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
    $sql = "SELECT * FROM `expense` where is_recurring = 1";
    $stmt = $conn->query($sql);

    // Store the data in an array
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'header.php';?>

<body>

<script>

  var test = <?php echo json_encode($rows); ?>;

  console.log(test);
</script>
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
     
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Expense Form</h1>
                    <form action="do.php" method="post">
                    <div class="form-group">
                        <label for="price">Expense:</label>
                        <input type="text" class="form-control" id="price" name="name" value="test" required>
                      </div>
                      <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" id="price" name="price" value=21 required>
                      </div>
                      <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" >
                      </div>
                      <script>
                        // Get the current date
                        var currentDate = new Date().toISOString().split('T')[0];
                        
                        // Set the current date as the default value
                        document.getElementById('date').value = currentDate;
                        </script>
                      <div class="form-group">
                          Add to reccuring expense: <input type="checkbox" name="r" value=1 default=0> 
                        </div>
                      <div class="form-group">
                        <label>Expense Type:</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="expenseType" id="food" value="food" required>
                          <label class="form-check-label" for="food">Food</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="expenseType" id="entertainment" value="entertainment" required>
                          <label class="form-check-label" for="entertainment">Entertainment</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="expenseType" id="housing" value="housing" required>
                          <label class="form-check-label" for="housing">Housing/Rent</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="expenseType" id="livelihood" value="livelihood" required>
                          <label class="form-check-label" for="livelihood">Livelihood</label>
                        </div>
                       
                      </div>
                      <input type="submit" class="btn btn-secondary">
                    </form>
                </div>
                <div class="col-md-6">
                <div class="card">
  <div class="card-body">
    <h1>Recurring Expenses Data Table</h1>
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
            echo "<td>" . $row["exp_type"] . "</td>";
            echo "<td><a class='btn btn-danger' href='actions/reccurring.php?id=" . $row['exp_id'] . "'>Add</a></td>";
            echo "<td><a class='btn btn-danger' href='actions/removeRec.php?id=" . $row['exp_id'] . "'>remove</a></td>";

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
                </div>
            </div>
        </div>

        <form onsubmit="mindeeSubmit(event)" >
    <input type="file" id="my-file-input" name="file" />
    <input type="submit" />
</form>
<div id="valuecontainer"></div>
<div id="catcontainer"></div>
<script type="text/javascript">

    const mindeeSubmit = (evt) => {
        evt.preventDefault()
        let myFileInput = document.getElementById('my-file-input');
        let myFile = myFileInput.files[0]
        if (!myFile) { return }
        let data = new FormData();
        data.append("document", myFile, myFile.name);

        let xhr = new XMLHttpRequest();

        xhr.addEventListener("readystatechange", function () {
            if (this.readyState === 4) {
                var response = JSON.parse(this.responseText);
                let valueContainer = document.getElementById('valuecontainer');
                let catContainer = document.getElementById('catcontainer');
                let value = response['document']['inference']['pages'][0]['prediction']['total_amount']['value'];
                let cat = response['document']['inference']['pages'][0]['prediction']['category']['value'];
                console.log(response)
                console.log(value);
                valueContainer.textContent = "the value is: " + value
                catContainer.textContent = "the category is: " + cat
             
            }
        });

        xhr.open("POST", "https://api.mindee.net/v1/products/mindee/expense_receipts/v5/predict");
        xhr.setRequestHeader("Authorization", "172fd464a10ab21e0332fda231215300");
        xhr.send(data);
    }
</script>
    </main>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>

