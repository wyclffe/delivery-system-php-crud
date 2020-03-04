<!DOCTYPE html>
<html>
  <head>
<title></title>

<link rel="stylesheet" href="\bbit/css/style.css">
  </head>
  <body>
        <header>
<h1><a href="index.php">Admin<span class="logo_colour">Panel</span></a></h1>
          </header>

          <nav>
            <ul id="nav">
              <li><a href="index.php">Welcome</a></li>
              <li><a style="background:#FE8222;"href="agents.php">Agent Management</a></li>
              <li><a href="servicerequests.php">Service Request Management</a></li>
              <li><a href="feedback.php">Feedback Management</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </nav>
        <div id="site_content">

<h1>Agent Management </h1>
  <table>
    <tr>
      <th>Company</th><th>Email</th><th>Phone</th><th>Constituency</th><th colspan="2">action</th>
    </tr>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/bbit/logindetails.php';
session_start();
if ($_SESSION['username']!=$admin_username) {
header("location: \bbit/index.php");
}
$connection=mysqli_connect($hn, $un, $pw, $db);
$company=$email=$phone=$Constituency='';

if (isset($_POST['delete'])) {

$query = "DELETE FROM agents WHERE username='$_POST[username]'";
$result = $connection->query($query);
}

if (isset($_POST['update'])) {
  $company=$_POST['company'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $Constituency=$_POST['constituency'];

$query_update="UPDATE agents SET company='$company',email='$email',phone='$phone',constituency='$Constituency' WHERE username='$_POST[username]' ";
$result=$connection->query($query_update);

}



$query = "SELECT company,email,phone,constituency,username FROM agents WHERE username!='$admin_username'";
  $result = $connection->query($query);
  while ($row=mysqli_fetch_row($result))
  {
    $company=$row[0];
    $email= $row[1];
    $phone=$row[2];
    $Constituency=$row[3];
    $username=$row[4];


echo <<<_Shiby
<tr>
<form class="" action="agents.php" method="post">
<td><input type="text" name="company" value=$company></td>
<td><input type="text" name="email" value=$email></td>
<td><input type="text" name="phone" value=$phone></td>
<td><select class="select_agent" name="constituency">
  <option value="$Constituency">$Constituency</option>
  <option value="Mvita">Mvita</option>
  <option value="Changamwe">Changamwe</option>
  <option value="Nyali">Nyali</option>
  <option value="Kisauni">Kisauni</option>
  <option value="Likoni">Likoni</option>
  <option value="Jomvu">Jomvu</option>
</select></td>

<input type="hidden" name="company" value="$row[0]">
<input type="hidden" name="username" value="$row[4]">
<td><input type="submit" name="update" value='update'></td>
<td><input type="submit" name="delete" value='delete'></td>
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
  </body>
</html>
