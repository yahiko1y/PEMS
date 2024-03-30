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
                        <h3>Add revenue</h3>
                    </div>
                </div>
                <div class="container exp">
                    <h1>Expense Form</h1>
                    <form action='do.php' method="post">
                    <div class="form-group">
                        <label for="price">Name:</label>
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
                      <div class="form-group">
                          Click here if it a reccuring exepnse: <input type="checkbox" name="r" value=1 default=0> 
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
                      <input type="submit" class="btn btn-primary">
                    </form>
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

