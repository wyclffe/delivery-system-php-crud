<!DOCTYPE html>
<html >
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
            <li><a style="background:#FE8222;"href="agents.php">Our Agents</a></li>
            <li><a href="servicerequest.php">Service Request</a></li>
          <li><a href="feedback.php">Give Feedback</a></li>
            <li><a href="login.php">Login</a></li>
          </ul>
        </nav>

        <div id="site_content">
<h1 >Our Agents</h1>

          <div id="agents">
<?php
require_once 'logindetails.php';
$connection=mysqli_connect($hn, $un, $pw, $db);

$query = "SELECT * FROM agents WHERE username !='$admin_username'";
$result = $connection->query($query);
while ($row=mysqli_fetch_row($result))
{

  echo "<table id='table_agents'>";
echo "<tr><th>Name</td><td>".$row[1]."</td></tr>";
echo "<tr><th>Email</td><td>".$row[2]."</td></tr>";
echo "<tr><th>Phone</td><td>".$row[3]."</td></tr>";
echo "<tr><th>Constituency</td><td>".$row[4]."</td></tr>";
echo "<tr><th colspan='2'>Quotes</th></tr>";
echo "<tr><th>Van</td><td>".$row[5]."</td></tr>";
echo "<tr><th>Truck</td><td>".$row[6]."</td></tr>";
echo "<tr><th>Canter</td><td>".$row[7]."</td></tr>";
echo "<table>";
}
 ?>
</div>

        <footer>
          <p>Copyright &copy; Shiby Movers. All Rights Reserved. </p>
        </footer>

      </div>

  </body>
</html>
