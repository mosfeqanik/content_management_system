<?php
class Database
{
  function CreateConnection()
  {  

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "cms";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;

  }

}

?>
<!Doctype html>
<html>
<head>
  <title>Content Management System</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="../assets/js/bootstrap.min.js"></script>
</head>
<body style="background-color:lavender;">
    <div class="navbar-brand" >Content Management System</div>
      <?php

        $db = new Database();
        $conn = $db -> CreateConnection();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

              $email     = $_POST['email'];
              $password  = $_POST['password'];
              $password = md5($password);

              if (

                  empty($email) ||
                  empty($password)

              ) {
                echo "<span style='color: red;font-weight: bold;' >ERROR ! Field must not be empty..</span>";
              }
              else{

                $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
                $result=mysqli_query($conn,$sql);
                $rowcount=mysqli_num_rows($result);

                if ($rowcount > 0) {

                    $rows=mysqli_fetch_assoc($result);
                    session_start();
                    $_SESSION["name"] = $rows['name'];
                    header("Location:dashboard.php");


                } else {

                    echo "<span style='color: red;font-weight: bold;' > Username or password does not match !</span>";
                }

            mysqli_close($conn);

            }

        }

      ?>
    <form id="signin" class="navbar-form navbar-right" action="index.php" method="post" >
    <div class="input-group">
        <span class="input-group-addon">
        <i class="glyphicon glyphicon-user"></i></span>
        <input id="email" type="email" class="form-control" name="email" placeholder="Email Address"> 
    </div>
      <div class="input-group" >
      <span class="input-group-addon">
      <i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" 
      name="password" value="" placeholder="Password">   
    </div>
    <button type="submit" class="btn btn-primary" name="submit" value="Login">Login</button>
    </form>
<div class="container"  >
    <div class="col-md-6 col-xs-12 col-xs-12 col-md-offset-6" >
        <div id="logbox"  >
            <h1>Create an Account</h1>
            <input name="user[Name]" type="Name" placeholder="Name" class="input pass"/>
            <input name="user[email]" type="email" placeholder="Email address" class="input pass"/>
            <input name="user[password]" type="password" placeholder="Choose a password" required="required" class="input pass"/>
            <input name="user[password2]" type="password" placeholder="Confirm password" required="required" class="input pass"/>
            <input type="submit" value="Sign me up!" class="inputButton"/>
        </div>
    </div>
</div>
</body>
</html>