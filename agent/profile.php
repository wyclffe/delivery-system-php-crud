<!DOCTYPE html>
<html>
  <head>
    <title></title>

<link rel="stylesheet" href="\bbit/css/style.css">
  </head>
  <body>
      <header>
<h1><a href="index.php">Agent<span class="logo_colour">Panel</span></a></h1>
          </header>


        <nav>
          <ul id="nav">
            <li><a href="index.php">Welcome</a></li>
            <li><a href="servicerequests.php">Service Request Review</a></li>
            <li><a style="background:#FE8222;"href="profile.php">Profile Update</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </nav>

        <div id="site_content">
          <?php
          require_once $_SERVER['DOCUMENT_ROOT'] .'/bbit/logindetails.php';
          session_start();
          if (isset($_SESSION['username'])&&$_SESSION['username']!=$admin_username) {
            $agentname=$_SESSION['username'];
          }
          elseif ($_SESSION['username']=$admin_username) {
            header("location: \bbit/admin");
          }
          else {
            header("location: \bbit/index.php");
          }
$connection=mysqli_connect($hn, $un, $pw, $db);
  $company=$email=$phone=$constituency=$van=$truck=$canter='';
  $companyErr=$emailErr=$phoneErr=$vanErr=$truckErr=$canterErr='';
$query = "SELECT company,email,phone,constituency,van,truck,canter FROM agents WHERE username='$agentname'";
  $result = $connection->query($query);
  while ($row=mysqli_fetch_row($result))
  {
  $company=$row[0];
  $email= $row[1];
  $phone=$row[2];
  $constituency=$row[3];
  $van=$row[4];
  $truck=$row[5];
  $canter=$row[6];

  }

  if (!empty($_POST['company'])&&
  !empty($_POST['email'])&&
  !empty($_POST['phone'])&&
  !empty($_POST['constituency'])&&
  !empty($_POST['van'])&&
  !empty($_POST['truck'])&&
  !empty($_POST['canter'])){
    $company=test_input($_POST['company']);
    $email=test_input($_POST['email']);
    $phone=test_input($_POST['phone']);
    $constituency=test_input($_POST['constituency']);
    $van=test_input($_POST['van']);
    $truck=test_input($_POST['truck']);
    $canter=test_input($_POST['canter']);

    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
      $emailErr="invalid email format";
    }
    if (!preg_match("/^[a-zA-Z ]*$/", $company)) {
      $companyErr="Only letters and white space allowed";
    }
    if (!preg_match("/^[0-9]+$/", $phone)) {
      $phoneErr="Only numbers allowed";
    }
    if (!preg_match("/^[0-9]+$/", $van)) {
      $vanErr="Only numbers allowed";
    }
    if (!preg_match("/^[0-9]+$/", $truck)) {
      $truckErr="Only numbers allowed";
    }
    if (!preg_match("/^[0-9]+$/", $canter)) {
      $canterErr="Only numbers allowed";
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
$Error=$companyErr.$emailErr.$phoneErr;

if ($Error=='') {
  $query_update="UPDATE agents SET company='$company',email='$email',phone='$phone',constituency='$constituency',van='$van',truck='$truck',canter='$canter' WHERE username='$agentname' ";
  $result=$connection->query($query_update);
  if (!$result) die($connection->error);
  $connection->close();

}
           ?>
<h1>Profile Update </h1>

<form class="profile_form" action="profile.php" method="post">

<input type="text" name="company" value="<?php echo $company; ?>"> Company<span class="error"><?php echo $companyErr; ?></span><br><br>
<input type="text" name="email" value="<?php echo $email; ?>"> Email<span class="error"><?php echo $emailErr; ?></span><br><br>
<input type="text" name="phone" value="<?php echo $phone; ?>"> Phone<span class="error"><?php echo $phoneErr; ?></span><br><br>
<select class="select_agent" name="constituency">
  <option value="<?php echo $constituency; ?>"><?php echo $constituency; ?></option>
  <option value="Mvita">Mvita</option>
  <option value="Changamwe">Changamwe</option>
  <option value="Nyali">Nyali</option>
  <option value="Kisauni">Kisauni</option>
  <option value="Likoni">Likoni</option>
  <option value="Jomvu">Jomvu</option>
</select> Constituency<br><br>



Quotes<br><br>
<input type="text" name="van" value="<?php echo $van; ?>"> Van<span class="error"><?php echo $vanErr; ?></span><br><br>
<input type="text" name="truck" value="<?php echo $truck; ?>"> Truck<span class="error"><?php echo $truckErr; ?></span><br><br>
<input type="text" name="canter" value="<?php echo $canter; ?>"> Canter<span class="error"><?php echo $canterErr; ?></span><br><br>
<br>
<input type="submit" name="" value="Update"><br><br>
</form>
        <footer>
          <p>Copyright &copy; Shiby Movers. All Rights Reserved. </p>
        </footer>
</div>
  </body>
</html>
