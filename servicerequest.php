<!DOCTYPE html>

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
            <li><a style="background:#FE8222;" href="servicerequest.php">Service Request</a></li>
          <li><a href="feedback.php">Give Feedback</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
        </nav>

        <div id="site_content">
<h1 >Service Request</h1>

          <div id="quotes">
            <?php
            $agentErr=$vehicleErr=$nameErr=$emailErr=$mobileErr=$shift_fromErr=$shift_toErr=$dateErr=$descriptionErr='';
            $success=$agent=$vehicle=$name=$email=$shift_to=$shift_from=$mobile=$date=$description='';
require_once 'logindetails.php';

$connection=mysqli_connect($hn, $un, $pw, $db);
if ($connection->connect_error) die($conn->connect_error);

if ($_SERVER["REQUEST_METHOD"]=="POST") {
  if (empty($_POST['agents'])) {
    $agentErr='agent not selected';
  }
  else {
    $agent=test_input($_POST["agents"]);
  }
  if (empty($_POST['vehicle'])) {
    $vehicleErr='vehicle not selected';
  }
  else {
    $vehicle=test_input($_POST["vehicle"]);
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

  if (empty($_POST['mobile'])) {
    $mobileErr="No Number was entered";
  }
  else {
    $mobile=test_input($_POST["mobile"]);
    if (!preg_match("/^[0-9]+$/", $mobile)) {
      $mobileErr="Only numbers allowed";
    }
  }

  if (empty($_POST['name'])) {
    $nameErr="No name was entered";
  }
  else {
    $name=test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
      $nameErr="Only letters and white space allowed";
    }
  }

  if (empty($_POST['date'])) {
    $dateErr='no date was given';
  }
  else {
    $date=test_input($_POST["date"]);
  }

  if (empty($_POST['shift_from'])) {
    $shift_fromErr='shift from not given';
  }
  else {
    $shift_from=test_input($_POST['shift_from']);
    if (!preg_match("/^[a-zA-Z ]*$/", $shift_from)) {
      $shift_fromErr="Only letters and white space allowed";
    }
  }

  if (empty($_POST['shift_to'])) {
    $shift_toErr='shift to not given';
  }
  else {
    $shift_to=test_input($_POST['shift_to']);
    if (!preg_match("/^[a-zA-Z ]*$/", $shift_to)) {
      $shift_toErr="Only letters and white space allowed";
    }
  }

  if (empty($_POST['description'])) {
    $descriptionErr='no description given';
  }
  else {
    $description=test_input($_POST['description']);
    if (!preg_match("/^[a-zA-Z ]*$/", $description)) {
      $descriptionErr="Only letters and white space allowed";
    }
  }

$Error=$agentErr.$vehicleErr.$emailErr.$mobileErr.$nameErr.$dateErr.$shift_fromErr.$shift_toErr.$descriptionErr;
if ($Error=='') {
  $name=$connection->real_escape_string($name);
  $mobile=$connection->real_escape_string($mobile);
  $shift_from=$connection->real_escape_string($shift_from);
  $shift_to=$connection->real_escape_string($shift_to);
  $description=$connection->real_escape_string($description);

$query="SELECT agent_id FROM agents WHERE company='$agent'";
$result=$connection->query($query);
        if ($row=mysqli_fetch_row($result)) {
$query2="INSERT INTO requests (company,email,mobilenumber,fullname,date,shiftfrom,shiftto,description,vehicle,agent_id)VALUES"."('$agent','$email','$mobile','$name','$date','$shift_from','$shift_to','$description','$vehicle','$row[0]')";
$result=$connection->query($query2);
$success="service request submitted successfully";
$agent=$vehicle=$services=$name=$email=$shift_to=$shift_from=$mobile=$date=$description='';
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
 <form class="quotes" action="servicerequest.php" method="post">
<p class="error"><?php echo $success ?></p><br>
 Select Agent <span class="error">*<?php echo $agentErr; ?></span><br>
 <select class="select_agent" name="agents">
   <option value="<?php echo $agent; ?>"><?php echo $agent; ?></option>
   <?php
   $query = "SELECT company FROM agents WHERE username!='$admin_username'";
   $result = $connection->query($query);
 while ($row=mysqli_fetch_row($result))
 {
 echo '<option value="' . $row[0] . '">' . $row[0] . '</option>';
 }
 echo "</select><br>";


 ?>
 Select Vehicle <span class="error">*<?php echo $vehicleErr; ?></span><br>
<select class="select_agent" name="vehicle">
  <option value="<?php echo $vehicle; ?>"><?php echo $vehicle; ?></option>
<option value="van">Van</option>
<option value="truck">Truck</option>
<option value="canter">Canter</option>
</select>
 <br>

 Full Name <span class="error">*<?php echo $nameErr; ?></span><br><input type="text" name="name" value="<?php echo $name; ?>"><br>
 Mobile Number <span class="error">*<?php echo $mobileErr; ?></span><br><input type="text" name="mobile" value="<?php echo $mobile; ?>"><br>
 Email <span class="error">*<?php echo $emailErr; ?></span><br><input type="text" name="email" value="<?php echo $email; ?>"><br>
 Shift From <span class="error">*<?php echo $shift_fromErr; ?></span><br>
 <select class="select_agent" name="shift_from">
   <option value="<?php echo $shift_from; ?>"><?php echo $shift_from; ?></option>
   <option value="Mvita">Mvita</option>
   <option value="Changamwe">Changamwe</option>
   <option value="Nyali">Nyali</option>
   <option value="Kisauni">Kisauni</option>
   <option value="Likoni">Likoni</option>
   <option value="Jomvu">Jomvu</option>
 </select><br>
 Shift To <span class="error">*<?php echo $shift_toErr; ?></span><br>
 <select class="select_agent" name="shift_to">
   <option value="<?php echo $shift_to; ?>"><?php echo $shift_to; ?></option>
   <option value="Mvita">Mvita</option>
   <option value="Changamwe">Changamwe</option>
   <option value="Nyali">Nyali</option>
   <option value="Kisauni">Kisauni</option>
   <option value="Likoni">Likoni</option>
   <option value="Jomvu">Jomvu</option>
 </select><br>

 Expected shipping date<span class="error">*<?php echo $dateErr; ?></span><br><input type="date" name="date" value="<?php echo $date; ?>"><br>
 Description<span class="error">*<?php echo $descriptionErr; ?></span><br><textarea name="description" rows="8" cols="80" ><?php echo $description; ?></textarea><br>
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
