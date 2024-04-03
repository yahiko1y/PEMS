<?php


include 'connectDB.php';

    // Fetch the data from the database
    $sql = "SELECT DISTINCT exp_type FROM expense";
    $stmt = $conn->query($sql);

    // Store the data in an array
    $dis = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql2= "SELECT exp_type, SUM(price) AS total FROM expense GROUP BY exp_type; ";

    $stmt2 = $conn->query($sql2);

    // Store the data in an array
    $exp = $stmt2->fetchAll(PDO::FETCH_ASSOC);
   
  
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>PEMS</title>
</head>

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
                        <h3>Reports</h3>
                    </div>
                </div>
                <div class="container">
                <div>
  <div class="chart-container" style="position: relative; height:50vh; width:100vw">
    <canvas id="myChart"></canvas>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

let type =[]
let total = []

            // Make an AJAX request to fetch_data.php
            var exp = <?php echo json_encode($exp); ?>;
            exp.forEach(function (params) {
              console.log(params.exp_type)
              type.push(params.exp_type)
              total.push(params.total)

            })

            console.log(type); 
            console.log(total); 
        
   

  const ctx = document.getElementById('myChart');
 

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: type,
      datasets: [{
        label: 'Cost of Each of the categories',
        data: total,
         backgroundColor: [
      'rgba(255, 99, 132, 0.6)',
      'rgba(255, 159, 64, 0.6)',
      'rgba(255, 205, 86, 0.6)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)'
    ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
                  </div>
            </main>
        </div>
    </div>
    
  
    <script src="script.js"></script>
</body>

</html>