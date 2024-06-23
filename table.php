<?php
require_once('db.php');
$query = "SELECT Category, Name, Dates, Amount, Comments FROM expenses";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Expense List</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    h1 {
      text-align: center;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 8px;
      border: 1px solid #ccc;
    }
    th {
      background-color: #4CAF50;
      font-weight: bold;
    }
	input{
		background-color:white;
		color:black;
		border-radius:50px;
		width:300px;
		height:70px;
	}
		input:hover{
		background-color:#4CAF50;
		color:white;
		border-radius:50px;
		width:300px;
		height:70px;
	}
	
  </style>
</head>
<body>
  <h1>Expense List</h1>
 
    <input type="button" value="Add Record" onclick="call()">
	    <input type="button" value="View Report" onclick="calls()">
		<table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Category</th>
        <th>Date</th>
        <th>Amount</th>
        <th>Comments</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td><?php echo $row['Name']; ?></td>
          <td><?php echo $row['Category']; ?></td>
          <td><?php echo $row['Dates']; ?></td>
          <td><?php echo $row['Amount']; ?></td>
          <td><?php echo $row['Comments']; ?></td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
  

</body>

<script>
function call(){
	window.location='expense.php';
	

}
function calls(){
    window.location='charts.php';
	window.addEventListener('load', generatePieChart);


}
</script>
</html>