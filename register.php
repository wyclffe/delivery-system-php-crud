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
          <ul id="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="agents.php">Our Agents</a></li>
            <li><a href="servicerequest.php">Service Request</a></li>
            <li><a href="feedback.php">Give Feedback</a></li>
            <li><a style="background:#FE8222;" href="login.php">Login</a></li>
          </ul>
        </nav>

        <div id="site_content">
<h1 >register</h1>
    <div id="login">

            <?php
            require_once 'logindetails.php';
            $company=$email=$phone=$constituency=$password=$username=$van=$truck=$canter='';
            $companyErr=$emailErr=$constituencyErr=$phoneErr=$paswErr=$usernameErr=$vanErr=$truckErr=$canterErr='';

            $connection=mysqli_connect($hn, $un, $pw, $db);
            if ($connection->connect_error) die($conn->connect_error);
            if ($_SERVER["REQUEST_METHOD"]=="POST") {
              if (empty($_POST['usern'])) {
                $usernameErr='username not specified';
              }
              else {
                $username=test_input($_POST["usern"]);
              }
              if (empty($_POST['company'])) {
                $companyErr='company name not set';
              }
              else {
                $company=test_input($_POST["company"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $company)) {
                  $companyErr="Only letters and white space allowed";
                }
              }
              if (empty($_POST['email'])) {
                $emailErr="Email is required";
              }
              else {
                $email=test_input($_POST["email"]);
                if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                  $emailErr="invalid email format";
                }
              }
              if (empty($_POST['phone'])) {
                $phoneErr="No Number was entered";
              }
              else {
                $phone=test_input($_POST["phone"]);
                if (!preg_match("/^[0-9]+$/", $phone)) {
                  $phoneErr="Only numbers allowed";
                }
              }
              if (empty($_POST['constituency'])) {
                $constituencyErr="constituency not entered";
              }
              else {
                $constituency=test_input($_POST['constituency']);
                if (!preg_match("/^[a-zA-Z ]*$/", $constituency)) {
                  $constituencyErr="Only letters and white space allowed";
                }
              }
              if (empty($_POST['passw'])) {
                $paswErr="input a password";
              }
              else {
                $password=test_input($_POST['passw']);
              }
              if (empty($_POST['van'])) {
                $vanErr="No Number was entered";
              }
              else {
                $van=test_input($_POST["van"]);
                if (!preg_match("/^[0-9]+$/", $van)) {
                  $vanErr="Only numbers allowed";
                }
              }
              if (empty($_POST['truck'])) {
                $truckErr="No Number was entered";
              }
              else {
                $truck=test_input($_POST["truck"]);
                if (!preg_match("/^[0-9]+$/", $truck)) {
                  $truckErr="Only numbers allowed";
                }
              }
              if (empty($_POST['canter'])) {
                $canterErr="No Number was entered";
              }
              else {
                $canter=test_input($_POST["canter"]);
                if (!preg_match("/^[0-9]+$/", $canter)) {
                  $canterErr="Only numbers allowed";
                }
              }

              $Error=$usernameErr.$companyErr.$emailErr.$phoneErr.$constituencyErr.$paswErr.$vanErr.$truckErr.$canterErr;
              if ($Error=='') {
                $query="INSERT INTO agents (username,company,email,phone,constituency,password,van,truck,canter)VALUES"."('$username','$company','$email','$phone','$constituency','$password','$van','$truck',$canter)";

                if ($result=$connection->query($query)) {
                  session_start();
                  $_SESSION['username']=$_POST['usern'];
                  header("location: agent");
                  $connection->close();
                }
              }

            }

            function test_input($data)
            {
             $data=trim($data);
             $data=stripslashes($data);
             $data = strip_tags($data);
             $data=htmlspecialchars($data);
             return $data;
            }

             ?>

<form class="login" action="register.php" method="post">

Username <span class="error">*<?php echo $usernameErr; ?></span><br><input type="text" name="usern" value="<?php echo $username; ?>"><br>
Company <span class="error">*<?php echo $companyErr; ?></span><br><input type="text" name="company" value="<?php echo $company; ?>"><br>
Email <span class="error">*<?php echo $emailErr; ?></span><br><input type="text" name="email" value="<?php echo $email; ?>"><br>
Phone <span class="error">*<?php echo $phoneErr; ?></span><br><input type="text" name="phone" value="<?php echo $phone; ?>"><br>
Constituency <span class="error">*<?php echo $constituencyErr; ?></span><br>
<select  name="constituency">
  <option value="<?php echo $constituency; ?>"><?php echo $constituency; ?></option>
  <option value="Mvita">Mvita</option>
  <option value="Changamwe">Changamwe</option>
  <option value="Nyali">Nyali</option>
  <option value="Kisauni">Kisauni</option>
  <option value="Likoni">Likoni</option>
  <option value="Jomvu">Jomvu</option>
</select>
<br>
Password <span class="error">*<?php echo $paswErr; ?></span><br><input type="text" name="passw" value="<?php echo $password; ?>"><br>
<br>
Give Quotes
<br>
Van <span class="error">*<?php echo $vanErr; ?></span><br><input type="text" name="van" value="<?php echo $van; ?>"><br>
Truck <span class="error">*<?php echo $truckErr; ?></span><br><input type="text" name="truck" value="<?php echo $truck; ?>"><br>
Canter <span class="error">*<?php echo $canterErr; ?></span><br><input type="text" name="canter" value="<?php echo $canter; ?>"><br>

<br><input type="submit" name="" value="signup">
<br><br>
</form>
</div>
        <footer>
          <p>Copyright &copy; Shiby Movers. All Rights Reserved. </p>
        </footer>
</div>
  </body>
</html>
