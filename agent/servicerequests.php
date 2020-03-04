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
            <li><a style="background:#FE8222;"href="servicerequests.php">Service Request Review</a></li>
            <li><a href="profile.php">Profile Update</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </nav>

        <div id="site_content">
          <?php
          require_once $_SERVER['DOCUMENT_ROOT'] .'/bbit/logindetails.php';

          session_start();
          $agentname='';
          if (isset($_SESSION['username'])&&$_SESSION['username']!=$admin_username) {
            $agentname=$_SESSION['username'];
          }
          elseif ($_SESSION['username']=$admin_username) {
            header("location: \bbit/admin");
          }
          else {
            header("location: \bbit/index.php");
          }
           ?>
<h1>Service Request Review </h1>

  <?php
  $connection=mysqli_connect($hn, $un, $pw, $db);
  $queryCompany = "SELECT agent_id FROM agents WHERE username='$agentname'";
$resultCompany = $connection->query($queryCompany);

$email=$phone=$service=$name=$shiftfrom=$shiftto=$date=$description=$vehicle='';

while ($rowc=mysqli_fetch_row($resultCompany))
{
$query = "SELECT * FROM requests WHERE agent_id='$rowc[0]' ";
$result = $connection->query($query);

  echo "<table id=table_quotes>";
  echo "<tr><th>Name</th><th>Number</th><th>Email</th><th>Shift from</th><th>Shift to</th><th>Date</th><th>Description</th><th>Vehicle</th></tr>";
          while ($row=mysqli_fetch_row($result))
        {
  $name=$row[1];
  $phone=$row[2];
  $email=$row[3];
  $shiftfrom=$row[4];
  $shiftto=$row[5];
  $date=$row[6];
  $description=$row[7];
  $vehicle=$row[8];

echo "<tr><td>".$name."</td><td>".$phone."</td><td>".$email."</td><td>".$shiftfrom."</td><td>".$shiftto."</td><td>".$date."</td><td>".$description."</td><td>".$vehicle."</td></tr>";

}
echo "</table>";

}

  ?>

  <footer>
          <p>Copyright &copy; Shiby Movers. All Rights Reserved. </p>
        </footer>

</div>
  </body>
</html>
