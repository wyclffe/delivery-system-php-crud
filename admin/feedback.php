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
              <li><a href="servicerequests.php">Service Request Management</a></li>
              <li><a style="background:#FE8222;"href="feedback.php">Feedback Management</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </nav>
        <div id="site_content">

<h1>Feedback Management </h1>
<table class="feedback_table">
    <tr>
      <th>name</th><th>contact</th><th>email</th><th>feedback</th><th>action</th>
    </tr>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/bbit/logindetails.php';
session_start();
if ($_SESSION['username']!=$admin_username) {
header("location: \bbit/index.php");
}

$connection=mysqli_connect($hn, $un, $pw, $db);
$name=$contact=$email=$feedback='';
if (isset($_POST['delete'])) {

$query = "DELETE FROM feedback WHERE feedback_id='$_POST[feedback_id]'";
$result = $connection->query($query);

}
$query= "SELECT * FROM feedback";

$result = $connection->query($query);

  while ($row=mysqli_fetch_row($result))
  {
    $name=$row[0];
    $contact= $row[1];
    $email=$row[2];
    $feedback=$row[3];
    $feedback_id=$row[4];


echo <<<_Shiby

<tr>


<td>$name</td>
<td>$contact</td>
<td>$email</td>
<td>$feedback</td>
<form class="" action="feedback.php" method="post">

<input type="hidden" name="feedback_id" value="$feedback_id">

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
</div>




  </body>
</html>
