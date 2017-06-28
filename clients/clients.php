<?php
session_start();
$dark="dark";
if($_SESSION["theme_preference"]===$dark){
  echo '<script>
document.getElementById("body").style.color = "white";
document.getElementById("body").style.backgroundColor = "black";
</script>';
}
else if($_SESSION["theme_preference"]='light' )
{
   echo '<script>
document.getElementById("body").style.color = "black";
document.getElementById("body").style.backgroundColor = "white";
</script>';
}
?>
<html lang="en">
<head>
	<title>Home | Cryosoft</title>

<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/foundation/foundation.css">
<link rel="stylesheet" type="text/css" href="css/foundation/foundicons/foundation-icons.css">
<link rel="stylesheet" type="text/css" href="css/site_custom.css">
<script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/foundation/foundation.min.js"></script>
<script type="text/javascript" src="js/modernizr/modernizr.js"></script>


<style type="text/css">
@font-face{
	font-family: custom_font;
	src: url(fonts/font_segoe.TTF);
}
body
{
	font-family: custom_font;
}
#clients
{
font-family: custom_font;
}
</style>
</head>
<body id="body">
	<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">
    <nav class="tab-bar">
      <section class="left-small">
        <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
      </section>

      <section class="middle tab-bar-section">
        <h1 class="title" id="first">Admin Console</h1>
      </section>
    </nav>

    <aside class="left-off-canvas-menu">
     <div class="icon-bar vertical five-up">
  <a href="upload.php" class="item">
    <i class="fi-upload"></i>
  </a>
  <a href="http://www.facebook.com/cryosoft101limited" class="item">
    <i class="fi-social-facebook"></i>
  </a>
  <a href="#" class="item">
    <i class="fi-social-android"></i>
  </a>
   <a href="#" class="item">
    <i class="fi-social-windows"></i>
  </a>
   <a href="#" class="item">
    <i class="fi-social-apple"></i>
  </a>
  <a href="http://www.github.com" class="item">
    <i class="fi-social-github"></i>
  </a>
   <a href="settings.php" class="item">
    <i class="fi-widget"></i>
  </a>
  <a href="index.php" class="item">
    <i class="fi-power"></i>
  </a>
</div>

    </aside>
    
    <section class="main-section" style="height:100%;">   
<div class="container-fluid">
<div class="row"><div class="col-sm-12"><div id="title">Cryosoft</div></div></div>
<div class="row">
<div class="col-sm-12">
	
	<nav class="top-bar" data-topbar>
  <ul class="title-area">
    <li class="name">
      <h1><a href="#" id="second">Admin Console</a></h1>
    </li>
    <!-- Collapsible Button on small screens: remove the .menu-icon class to get rid of icon. 
    Remove the "Menu" text if you only want to show the icon -->
    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
  </ul>

  <section class="top-bar-section">
    <ul class="left">
      <li><a href="#">Home</a></li>
      <li><a href="#">Uploads</a></li>
      <li><a href="#">Accounts</a></li>
      <li class="active"><a href="index.php">Client Info</a></li>   
      <li><a href="#">Account Settings</a></li> 
    </ul>
  </section>
</nav>
<div class="row">
<div class="col-sm-6">
<h1 id="clients">Current clients:</h1>
<?php
$conn = new mysqli("localhost","root","", "cryosoft");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM cryosoft_clients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<strong>Client Name:</strong><br>".$row["client_name"]."<br><strong>Client's Phone Number</strong><br>".$row["client_phone"]."<br><strong>Client's email:</strong><br>".$row["client_email"]."<br><strong>What the client wants:</strong><br>".$row["client_description"]."<br><strong>Deadline</strong><br>".$row["client_deadline"]."<br><strong>Work assigned to:</strong><br>".$row["assigned_to"]."<br><br><hr>";

    }
} else {
    echo "Cryosoft has no current clients.";
}
$conn->close();
?>
</div>
<div class="col-sm-6">
<h1 id="clients">Post Clients:</h1>
<?php
if (isset($_POST['post_work'])) {
  $name=$_POST['cl_name'];
  $email=$_POST['cl_email'];
  $phone=$_POST['cl_phone'];
  $descript=$_POST['cl_descript'];
  $ddline=$_POST['cl_deadline'];
  $assigned=$_POST['cl_assign'];
  # code...

$conn = new mysqli("localhost","root","", "cryosoft");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO cryosoft_clients (client_name, client_phone, client_email, client_description, client_deadline, assigned_to)
VALUES ('$name', '$phone','$email', '$descript','$ddline','$assigned')";

if ($conn->query($sql) === TRUE) {
    echo '<div data-alert class="alert-box success">
  <strong>Success!</strong> New Client successfully added.
</div> <meta HTTP-EQUIV="Refresh" CONTENT="4, URL= index.php">';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
<form method="post" action="">
Client name:<input type="text" name="cl_name"><br>
Client's phone number:<input type="text" name="cl_phone"><br>
Client's email<input type="text" name="cl_email">
Client's description of work<textarea rows="10" cols="20" name="cl_descript"></textarea>
Deadline of work:<input type="date" name="cl_deadline">
Assigned to:<input type="text" name="cl_assign">
<input type="submit" value="Post work" name="post_work">
</form>

</div>
</div>
</div>
</div>

    </section>

    <a class="exit-off-canvas"></a>

  </div>
</div>


<!-- Start Joyride Upon Initialization -->
<script>
$(document).ready(function() {
    $(document).foundation();
})



</script>
</body>
</html>