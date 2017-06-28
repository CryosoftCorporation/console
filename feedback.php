<?php
session_start();

?>
<html lang="en">
<head>
	<title>Client Feedback | Cryosoft</title>

  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="icons/favicon.png" type="image/x-icon">
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
 h1{
  font-family: custom_font;
}
body
{
	font-family: custom_font;
}
.chip {
  display: inline-block;
  padding: 0 25px;
  height: 50px;
  font-size: 16px;
  line-height: 50px;
  border-radius: 25px;

}

.chip img {
  float: left;
  margin: 0 10px 0 -25px;
  height: 50px;
  width: 50px;
  border-radius: 50%;
}
#image{
  padding-top: 20px;
}
#deadlines
{
  color: red;
  border-style: double;
  border-color: red;
}
#heading
{
  font-size: 20px;
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
          <a href="logout.php" class="item">
            <i class="fi-power"></i>
          </a>
        </div>

      </aside>
      
      <section class="main-section" style="min-height: 100%;">   
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12"><div id="title">Cryosoft</div>
            <div id="image" class="chip show-for-medium-up" style="float:right;">
              <?php echo $_SESSION["id"];?>
              <?php  echo $_SESSION["name_of_user"];?>

            </div>
          </div>
        </div>
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
      <li><a href="home.php">Home</a></li>
      <li><a href="#">Uploads</a></li>
      <li><a href="#">Accounts</a></li>
      <li><a href="clients.php">Client Info</a></li>
      <!-- the class="active" changes the color to blue to show the current page being browsed on--> 
      <li class="active"><a href="#">Client Feedback</a></li>  
      <li><a href="settings.php">Account Settings</a></li> 
    </ul>
  </section>
</nav>
<h1 id="heading" style="font-size:40px;">What the Clients have to say:</h1>
<div class="welcome_text">
  This is where you view and analyse what your customers have to say about Cryosoft.
</div><br>
<?php
$conn = new mysqli("localhost","root","", "feedback");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM client_feedback";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<strong>Client Name:</strong><br>".$row["first_name"]." ".$row["middle_name"]." ".$row["last_name"]."<br><strong>Email:</strong><br>".$row["email"]."<br><strong>Phone Number:</strong><br>".$row["phone_number"]."<br><strong>Rated out of 10: </strong><br>".$row["rating"]."<br><strong>Comments:</strong><br>".$row['comment']."<br><strong>Served by:</strong><br>".$row['served_by']."<hr>";

  }
} else {
  echo "<strong>No feedback given yet</strong>";
}
$conn->close();
?>

<center>
  <footer>&copy;<?php echo date("Y")?> Cryosoft corporation.</footer></center>

</div>
</div>

</section>
<script>
$(document).ready(function() {
      $(document).foundation();
})
</script>

</body>
</html>
<?php
$dark="dark";
$light="light";
if($_SESSION["theme_preference"]==$dark){
  echo '<script>
  document.getElementById("body").style.color = "white";
  document.getElementById("body").style.backgroundColor = "black";
  document.getElementById("heading").style.color="white";
  </script>';
}
else if($_SESSION["theme_preference"]==$light)
{
 echo '<script>
 document.getElementById("body").style.color = "black";
 document.getElementById("body").style.backgroundColor = "white";
 document.getElementById("heading").style.color="black";
 </script>';
}
?>
