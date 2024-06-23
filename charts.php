<h1> THIS IS YOUR EXPENSE REPORT</h1>


<?php

// Include the db.php file to establish the database connection
include('db.php');
$sql = "SELECT 	Category, COUNT(Amount) as count FROM expenses GROUP BY Name";
$result = $con->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[$row['Category']] = $row['count'];
}
?>
<?php
$data_json = json_encode($data);
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 400px; height: 400px;">
        <canvas id="myPieChart"></canvas>
    </div>

    <script>
        var data = <?php echo $data_json; ?>;
        var labels = Object.keys(data);
        var values = Object.values(data);

        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: [
                        'red',
                        'blue',
                        'green',
                        'orange'
                    ]
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>
</html>

