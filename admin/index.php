<!DOCTYPE html>
<html >
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
            <li><a style="background:#FE8222;"href="index.php">Welcome</a></li>
            <li><a href="agents.php">Agent Management</a></li>
            <li><a href="servicerequests.php">Service Request Management</a></li>
            <li><a href="feedback.php">Feedback Management</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </nav>

        <div id="site_content">
          <?php
          require_once $_SERVER['DOCUMENT_ROOT'] .'/bbit/logindetails.php';
          session_start();
          $agentname='';
if ($_SESSION['username']!=$admin_username) {

  header("location: \bbit/index.php");
}
else {
  $agentname=$_SESSION['username'];

}
           ?>
<h1>Welcome back <?php echo $agentname; ?></h1>


        <footer>
          <p>Copyright &copy; Shiby Movers. All Rights Reserved. </p>
        </footer>
      </div>
</div>




  </body>
</html>
