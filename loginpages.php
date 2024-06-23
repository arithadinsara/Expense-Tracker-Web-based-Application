
<?php session_start();?>
<html>
<head>

<title>Login</title>

<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  padding: 0;
}

h3 {
  text-align: center;
}

form {
  max-width: 300px;
  margin: 0 auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.input-group {
  margin-bottom: 20px;
}

.input-group label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

.input-group input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.btn {
  display: inline-block;
  background-color: #4CAF50;
  color: #fff;
  padding: 10px 20px;
  border-radius: 4px;
  border: none;
  cursor: pointer;
}

.btn:hover {
  background-color: #45a049;
}

.x, .y {
  display: flex;
  flex-direction: column;
}

.x input, .y input {
  margin-bottom: 10px;
}

.x input[type="reset"] {
  margin-top: 20px;
}

</style>

</head>

<body>
 
<h3>EXPENSE TRACKER APPLICATION</h3>


<form id="adminform" action=""  method="POST" class="input-group">
<h2><span>ENTER YOUR LOGIN CREDENTIALS</span></h2>
<div class="x">
<label for ="name">User Name</label>
<br>
<input id="name" value="" name="txtname" >
</div>
<br>
<br>
<div class="y">
<label for ="ids">Password</label>
<br>
<input id="ids" value="" name="userpassword" type="password" >
</div>
<div>
<br>
<br>
<br>
   <button name='login' class="btn" id="placelogin" type="submit">Log In</button>
       </div>
<br>
<br>
<br>
<input type="reset">
</div>
</div>
</body>


<?php 
include('db.php');
if(isset($_POST['login']))
{   
    $uname=$_POST['txtname'];
    $password=$_POST['userpassword'];

    $query = mysqli_query($con, "SELECT * FROM users WHERE UserName='$uname' and Pasword='$password'");
   
    $row=mysqli_num_rows($query);

    if($row==1)
    {
        $_SESSION['admin']='admin';
            echo'
            <script>
                alert("logged in");
                window.location="table.php";
                </script>
                ';
	}
	  else{
            echo'
            <script>
            alert("Access denied");
            window.location="loginpages.php";
            </script>';
                }


}



?>
</body>

    </html>