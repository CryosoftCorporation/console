<?php
session_start();

?>
<html lang="en">
<head>
	<title>Home | Cryosoft</title>

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
          <a href="logout.php" class="item" name="">
            <i class="fi-power" name="log_out"></i>
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
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Uploads</a></li>
      <li><a href="#">Accounts</a></li>
      <li><a href="clients.php">Client Info</a></li> 
      <li><a href="feedback.php">Client Feedback</a></li>  
      <li><a href="settings.php">Account Settings</a></li> 
    </ul>
  </section>
</nav>
<center> <div id="title2">Welcome</div>
  <div class="welcome_text">
    This admin console enables you to upload files and work, create databases, view client information, change your 
    account settings, check for any news from the management office and so much more.</div>
    <br>
    <button onclick="startJoy()">Take a tour of the console</button><br>
  </center>
  <div class="row"><hr><div id="deadlines" class="col-sm-3">
    <div id="heading"><strong>Client deadlines:</strong></div>
    <?php
    $conn = new mysqli("localhost","root","", "cryosoft");

      // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 
    $sql="SELECT client_deadline FROM cryosoft_clients";
    $result = $conn->query($sql);
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo ' <div id="date">'.$row["client_deadline"].'</div>';}
      } else {
        echo "No Clients available";}
        ?>
      </div>
      <div class="col-sm-1"></div>
      <div class="col-sm-4">

<?php
  $val_user= $_SESSION["ident"];
  $conn = new mysqli("localhost","root","", "cryosoft");
      // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  $sql="SELECT * FROM cryosoft_clients WHERE id_assigned_to = '$val_user'" ;
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $startdate = $row["client_deadline"];
      $enddate = date("Y-m-d");
      if ($startdate < $enddate) {
        echo "The following client has not been cleared:<br>";
        echo "<li>".$row["client_name"]."</li>";
        echo "<script> 
        alert('You have a deadline that has not been met');</script>"; 

      }
      else{
      }

    } 
  }


  ?>

      </div>
      <div class="col-sm-4">
        <strong>Assigned work:</strong><br>
        <?php
  $val_user= $_SESSION["ident"];
  $conn = new mysqli("localhost","root","", "cryosoft");
      // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  $sql="SELECT * FROM cryosoft_clients WHERE id_assigned_to = '$val_user'" ;
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<img src='icons/attention-48.png'alt='attention icon'><a href='clients.php'>You have been assigned some work.</a>";
    }
      else{
        echo "<img src='icons/info-48.png'alt='info icon'>You have not been assigned any work";
      }


  ?>
      </div>
      
</div>
<div class="row">
  <center>
    <footer><hr>&copy;<?php echo date("Y")?> Cryosoft corporation.</footer></center>
  </div>
</div>
</div>

</section>

<a class="exit-off-canvas"></a>

</div>
</div>
</div>

<ol class="joyride-list" data-joyride>
  <li data-id="first">
    <h4>Convinience bar</h4>
    <p>Use this bar to navigate to other sites associated with Cryosoft. Click on the Hamburger sign at the top left to access the side bar. You can also <strong>LOG OUT</strong>
      from here.</p>
    </li>
    <li data-id="second">
      <h4>Nav Bar</h4>
      <p>The tabs provide access to other parts of the console. On smaller Devices click the Hamburger sign at the far right of the bar to access the menu</p>
    </li>
    <li data-id="deadlines">
      <h4>Deadlines</h4>
      <p>Whenever there is a posted job, check out the deadlines for the posted work here. You will get an alert when you miss out on a deadline if the work was assigned to you and haven't posted as completed.</p>
    </li>
    <li data-id="image">
      <h4>User Data</h4>
      <p>See the details of the currently logged on user from here</p>
    </li>

    <li data-button="End">
      <h4>That's all for now</h4>
      <p>We've just covered the basics. The rest just comes natural: do what you do best!</p>
    </li>
  </ol>

  <!-- Start Joyride Upon Initialization -->
  <script>
  $(document).ready(function() {
        $(document).foundation();
  })

  function startJoy(){
    $(document).ready(function() {
      $(document).foundation('joyride', 'start');
    })}

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