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
            <li><a style="background:#FE8222;" href="feedback.php">Give Feedback</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
        </nav>

        <div id="site_content">
<h1 >Feedback</h1>

          <div id="feedback">
            <?php

            $nameErr=$emailErr=$numberErr=$feedbackErr="";
            $name=$number=$email=$feedback=$success="";
            require_once 'logindetails.php';
            $connection=mysqli_connect($hn, $un, $pw, $db);

            if ($_SERVER["REQUEST_METHOD"]=="POST"){

              if (empty($_POST['name'])){
                $nameErr="No name was entered";
              }
              else {
                $name=test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                  $nameErr="Only letters and white space allowed";
                }
              }

              if (empty($_POST["email"])) {
                  $emailErr="Email is required";
              }
              else {
                $email=test_input($_POST["email"]);
                if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                  $emailErr="invalid email format";
                }
              }
              if (empty($_POST["number"])) {
                 $numberErr="No Number was entered";
              }
              else {
                $number=test_input($_POST["number"]);
                if (!preg_match("/^[0-9]+$/", $number)) {
                  $numberErr="Only numbers allowed";
                }
              }
              if (empty($_POST["feedback"])) {
                $feedbackErr="no feedback was given";
              }
              else {
                $feedback=test_input($_POST["feedback"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $feedback)) {
                  $feedbackErr="only letters are allowed";
                }
              }
              $Error=$feedbackErr.$emailErr.$numberErr.$numberErr;
            if ($Error=='') {

               $name=$connection->real_escape_string($name);
               $number=$connection->real_escape_string($number);
               $email=$connection->real_escape_string($email);
               $feedback=$connection->real_escape_string($feedback);
              $query="INSERT INTO feedback (name,contact,email,feedback)VALUES"."('$name','$number','$email','$feedback')";
              $result=$connection->query($query);
              $success="feedback was submitted successfully";
                $name=$number=$email=$feedback="";

              if (!$result) die($connection->error);
              $connection->close();
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
<form class="feedback" action="feedback.php" method="post">
<p class="error"><?php echo $success ?></p><br>
Full Name <span class="error">*<?php echo $nameErr; ?></span><br><input type="text" name="name" value="<?php echo $name; ?>"><br>
Contact <span class="error">*<?php echo $numberErr; ?></span><br><input type="text" name="number" value="<?php echo $number; ?>"><br>
Email    <span class="error">*<?php echo $emailErr; ?></span><br><input type="text" name="email" value="<?php echo $email; ?>"><br>
Feedback <span class="error">*<?php echo $feedbackErr; ?></span><br><textarea name="feedback" rows="8" cols="40"></textarea><br>
<br><input type="submit" name="" value="Submit">
<input type="reset" name="" value="Reset"><br><br>
</form>

</div>

        <footer>
          <p>Copyright &copy; Shiby Movers. All Rights Reserved. </p>
        </footer>

</div>

  </body>
</html>
