<!DOCTYPE html>
<html>
  <head>
<title></title>

<link rel="stylesheet" href="\bbit/css/style.css">
  </head>
  <body>
    <div id="main">
        <header>
<h1><a href="index.php">Admin<span class="logo_colour">Panel</span></a></h1>
          </header>

          <nav>
            <ul id="nav">
              <li><a href="index.php">Welcome</a></li>
              <li><a href="agents.php">Agent Management</a></li>
              <li><a style="background:#FE8222;"href="servicerequests.php">Service Request Management</a></li>
              <li><a href="feedback.php">Feedback Management</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </nav>
        <div id="site_content">

<h1>Service Request Management </h1>
  <table>
    <tr>
      <th>Company</th><th>name</th><th>phone</th>
      <th>email</th><th>shift from</th><th>shift to</th><th>date</th>
      <th>description</th><th>vehicle</th><th>action</th>
    </tr>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/bbit/logindetails.php';
session_start();
if ($_SESSION['username']!=$admin_username) {
header("location: \bbit/index.php");
}

$connection=mysqli_connect($hn, $un, $pw, $db);

if (isset($_POST['delete'])) {

$query = "DELETE FROM requests WHERE quote_id='$_POST[quote_id]'";
$result = $connection->query($query);
}

$query= "SELECT * FROM requests";
$company=$email=$phone=$name=$shiftfrom=$shiftto=$date=$description=$vehicle='';
  $result = $connection->query($query);
  while ($row=mysqli_fetch_row($result))
  {
  $company=$row[0];
  $name=$row[1];
  $phone=$row[2];
  $email=$row[3];
  $shiftfrom=$row[4];
  $shiftto=$row[5];
  $date=$row[6];
  $description=$row[7];
  $vehicle=$row[8];
  $quote_id=$row[9];

echo <<<_Shiby
<tr>
<td>$company</td>
<td>$name</td>
<td>$phone</td>
<td>$email</td>
<td>$shiftfrom</td>
<td>$shiftto</td>
<td>$date</td>
<td>$description</td>
<td>$vehicle</td>

<form class="" action="servicerequests.php" method="post">
<input type="hidden" name="quote_id" value="$quote_id">
<td><input type="submit" name="delete" value="delete"></td>
</form>
</tr>
_Shiby;
   }
   ?>
  </table>

        <footer>
          <p>Copyright &copy; Shiby Movers. All Rights Reserved. </p>
        </footer>
      </div>
</div>
  </body>
</html>
