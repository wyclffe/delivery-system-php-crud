<!DOCTYPE html>
<html>
  <head>
    <title></title>

<link rel="stylesheet" href="css/style.css">
  </head>
  <body>

        <header>
<h1><a href="index.php">Shiby<span class="logo_colour">Movers.com</span></a></h1>
          </header>

        <nav>
          <ul class="sf-menu" id="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="agents.php">Our Agents</a></li>
            <li><a href="servicerequest.php">Service Request</a></li>
            <li><a href="feedback.php">Give Feedback</a></li>
            <li><a style="background:#FE8222;" href="login.php">Login</a></li>
          </ul>
        </nav>

        <div id="site_content">
<h1 >Agent login</h1>

          <div id="login">

<?php
session_start();
require_once 'logindetails.php';
$connection=mysqli_connect($hn, $un, $pw, $db);

if (isset($_POST['username']) &&
isset($_POST['password'])) {

$temp_username=$_POST['username'];
$temp_password=$_POST['password'];

$query = "SELECT username,password FROM agents WHERE username='$temp_username' AND password='$temp_password'";
$result = $connection->query($query);
if ($result->num_rows == 0)
{
echo  '<p class="error">Your username or Password is invalid</p>';
}
else
{
  $_SESSION['username']=$temp_username;
  if ($_SESSION['username']==$admin_username) {
header("location: admin");
  }
else

 header("location: agent");
}

}

 ?>
 <form class="login" action="login.php" method="post">

 username <br><input type="text" name="username" value=""><br>
 password <br><input type="text" name="password" value=""><br>
 <br><input type="submit" name="" value="Login">

 </form>
 <p>New user? <a href="register.php">register here</a> </p><br><br>
</div>

    <footer>
          <p>Copyright &copy; Shiby Movers. All Rights Reserved. </p>
        </footer>

      </body>
</div>
</html>
