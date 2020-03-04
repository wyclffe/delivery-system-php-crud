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
            <li><a style="background:#FE8222;"href="index.php">Welcome</a></li>
            <li><a href="servicerequests.php">Service Request Review</a></li>
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
<h1>Welcome back <?php echo $agentname; ?></h1>
        <footer>
          <p>Copyright &copy; Shiby Movers. All Rights Reserved. </p>
        </footer>

</div>
  </body>
</html>
