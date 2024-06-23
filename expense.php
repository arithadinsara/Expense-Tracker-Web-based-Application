<!DOCTYPE html>
<html>
<head>
  <title>Interface Example</title>
  <style>
  
	

    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    h1 {
      text-align: center;
    }
    form {
      max-width: 400px;
      margin: 0 auto;
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    select,
    input[type="date"],
    input[type="number"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    input[type="submit"],
    input[type="reset"] {
      margin-top: 10px;
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type="submit"]:hover,
    input[type="reset"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h1>Interface Example</h1>
  
  <form method="POST">
  
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        
    <label for="category">Category:</label>
    <select id="category" name="category">
      <option value="Food">Food and entertainment</option>
      <option value="Utility">utility Bills </option>
      <option value="Fuel">Fuel</option>
      <option value="Education">Education</option>
      <option value="Helthcare">Helthcare</option>
      <option value="Finace">Finace</option>
      <option value="Other">Other</option>

    </select>
    
    <label for="date">Date:</label>
    <input type="date" id="date" name="date">
    
    <label for="amount">Amount:</label>
    <input type="number" id="amount" name="amount" step="1">
    
    <label for="comment">Comment:</label>
    <textarea id="comment" name="comment" rows="4"></textarea>
    
    <input type="submit" value="Submit" >
  </form>
</body>
</html>







<?php
require_once('db.php'); // Assuming 'db.php' contains your database connection code.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $name = $_POST["name"];
    $category = $_POST["category"];
    $date = $_POST["date"];
    $amount = $_POST["amount"];
    $comment = $_POST["comment"];

    // Prepare and execute the SQL INSERT statement
    $query = "INSERT INTO expenses (Category, Name, Dates, Amount, Comments) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sssss", $category, $name, $date, $amount, $comment);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Data has been successfully saved to the database.";
		    
			echo "<script>window.location='table.php';</script>";
		       
			  
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
	
}

?>
</table>
</table>