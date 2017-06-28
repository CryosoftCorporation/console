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
  <title>Clients | Cryosoft</title>

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
  #clients
  {
    font-family: custom_font;
  }
  #clients2
  {
    font-family: custom_font;
  }
  .loader {
    border: 5px solid #f3f3f3; /* Light grey */
    border-top: 5px solid #17A05E; /* green */
    border-radius: 50%;
    width: 30px;
    height: 30px;
    animation: spin 2s linear infinite;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
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
    
    <section class="main-section" style="min-height: 100%;">   
      <div class="container-fluid">
        <div class="row"><div class="col-sm-12"><div id="title">Cryosoft</div>
        <div id="image" class="chip show-for-medium-up" style="float:right;">
          <?php echo $_SESSION["id"];?>
          <?php  echo $_SESSION["name_of_user"];?>
        </div>
      </div></div>
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
  <!--This is the menu where you can navigate to throughout the console-->
  <section class="top-bar-section">
    <ul class="left">
      <li><a href="home.php">Home</a></li>
      <li><a href="#">Uploads</a></li>
      <li><a href="#">Accounts</a></li>
      <li class="active"><a href="index.php">Client Info</a></li>
      <li><a href="feedback.php">Client Feedback</a></li>    
      <li><a href="settings.php">Account Settings</a></li> 
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
        echo "<strong>Client Name:</strong><br>".$row["client_name"]."<br><strong>Client's Phone Number</strong><br>".$row["client_phone"]."<br><strong>Client's email:</strong><br>".$row["client_email"]."<br><strong>What the client wants:</strong><br>".$row["client_description"]."<br><strong>Deadline</strong><br>".$row["client_deadline"]."<br><strong>Work assigned to:</strong><br>".$row["assigned_to"]."<br><br>";
        if ($_SESSION['name_of_user']=="Guest User") {
          echo "<strong>You don't have access to complete or delete clients. This is where options for completing tasks or deleting them appear.</strong>";
        }
        else{
         echo "<form method='post' action=''><button class='button tiny' name='".$row['client_name']."'>Complete</button></form><form method='get' action=''><button type='button' class='button tiny' data-reveal-id='myModal'>Remove</button>
        </form><hr>";
        if (isset($_POST[''])) {
          # code...
        }
       }

       if (isset($_POST[$row['client_name']])) {
        $comp=$row['client_name'];
        $conn = new mysqli("localhost","root","", "cryosoft");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "DELETE FROM cryosoft_clients WHERE client_name = '$comp';";
        $sql .= "UPDATE `deadlines` SET `status`= '1' WHERE name_of_client = '$comp'";
        if ($conn->multi_query($sql) === TRUE) {
          echo "</div> <meta HTTP-EQUIV='Refresh' CONTENT='1, URL= clients.php'>'";
        } 
        else {
          echo "Error deleting record: " . $conn->error;
        }
      }
      if (isset($_GET[$row['client_name']])) {
        $comp2=$row['client_name'];
        $conn = new mysqli("localhost","root","", "cryosoft");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "DELETE FROM cryosoft_clients WHERE client_name = '$comp2';";
        $sql .= "DELETE FROM `deadlines` WHERE name_of_client = '$comp2'";
        if ($conn->multi_query($sql) === TRUE) {
          echo "</div> <meta HTTP-EQUIV='Refresh' CONTENT='1, URL= clients.php'>'";
        } 
        else {
          echo "Error deleting record: " . $conn->error;
        }
      }
    }
  } 
  else {
    echo "Cryosoft has no current clients.";
  }

  $conn->close();

  ?>
</div>
<div class="col-sm-6">
  <h1 id="clients2">Post Clients:</h1>
  <?php

  if (isset($_POST['post_work'])) {
    $name=$_POST['cl_name'];
    $email=$_POST['cl_email'];
    $phone=$_POST['cl_phone'];
    $descript=$_POST['cl_descript'];
    $ddline=$_POST['cl_deadline'];
    $value=$_POST['cl_assign'];
    switch ($value) {
      case 1 :
      $assigned=" Joseph Njogu";
      break;
      case 2:
      $assigned="Karim K. Kanji";
      break;
      case 3:
      $assigned="Valentine Munikah";
      break;    
      default:
      # code...
      break;
    }

    $conn = new mysqli("localhost","root","", "cryosoft");
// Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO cryosoft_clients (client_name, client_phone, client_email, client_description, client_deadline, assigned_to, id_assigned_to)
    VALUES ('$name', '$phone','$email', '$descript','$ddline','$assigned','$value');";
    $sql .= "INSERT INTO deadlines (name_of_client, deadline, status, assigned_to, id_assigned) VALUES ('$name','$ddline','0','$assigned','$value')";
    if ($conn->multi_query($sql) === TRUE) {
      echo '<div data-alert class="alert-box success">
      <strong>Success!</strong> New Client successfully added.<div class="loader" style="float:right;"></div>
      </div> <meta HTTP-EQUIV="Refresh" CONTENT="2, URL= clients.php">';
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
  ?>
  <form  name='clients' onsubmit="return validateForm()" method="post" action="">
    Client name:<input type="text" name="cl_name"><div id="name"></div>
    Client's phone number:<input type="text" name="cl_phone"><div id="phone"></div>
    Client's email<input type="email" name="cl_email" ><div id="email"></div> 
    Client's description of work<textarea rows="10" cols="20" name="cl_descript" ></textarea><div id="des"></div>
    Deadline of work:<input type="date" name="cl_deadline"><div id="dead"></div>
    Assigned to:
    <select name="cl_assign">
      <option value="1">Joseph Njogu</option>
      <option value="2">Karim K. Kanji</option>
      <option value="3">Valentine Munikah</option>
    </select><div id="assign"></div>
    <?php
    if ($_SESSION['name_of_user']=="Guest User") {
      echo "<strong>You don't have access to posting clients. This is where Clients are posted.</strong>";
    }
    else{
      echo("<button name='post_work'>Post Work</button>
        <button type='reset'>Reset Form</button>");
    }
    ?>


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

function validateForm() {
  var a = document.forms["clients"]["cl_name"].value;
  if (a == null || a == "") {
    document.getElementById("name").innerHTML = "Please fill in this field!";
    document.getElementById("name").style.color = "red";
    return false;
  }
  else if (a != null || a != "") {
    document.getElementById("name").innerHTML = "";
  }
  var b = document.forms["clients"]["cl_phone"].value;
  var n = b.length;
  if(n>13 || n<10)
  {
    document.getElementById("phone").innerHTML = "The phone number you have entered is invalid.";
    document.getElementById("phone").style.color = "red";
    return false;
  }
  if (b== null || b == "") {
    document.getElementById("phone").innerHTML = "Please fill in this field!";
    document.getElementById("phone").style.color = "red";
    return false;
  }
  else if (b != null || b != "") {
    document.getElementById("phone").innerHTML = "";
  }

  var c = document.forms["clients"]["cl_email"].value;

  if (c == null || c == "") {
    document.getElementById("email").innerHTML = "Please fill in this field!";
    document.getElementById("email").style.color = "red";
    return false;
  }
  else if (c != null || c!= "") {
    document.getElementById("email").innerHTML = "";
  }
  var d = document.forms["clients"]["cl_descript"].value;
  if (d == null || d == "") {
    document.getElementById("des").innerHTML = "Please fill in this field!";
    document.getElementById("des").style.color = "red";
    return false;
  }
  else if (d != null || d != "") {
    document.getElementById("des").innerHTML = "";
  }
  var e = document.forms["clients"]["cl_deadline"].value;
  if (e == null || e == "") {
    document.getElementById("dead").innerHTML = "Please fill in this field!";
    document.getElementById("dead").style.color = "red";
    return false;
  }
  else if (e != null || e != "") {
    document.getElementById("dead").innerHTML = "";
  }
  var f = document.forms["clients"]["cl_assign"].value;
  if (f== null || f == "") {
    document.getElementById("assign").innerHTML = "Please fill in this field!";
    document.getElementById("assign").style.color = "red";
    return false;
  }
  else if (f != null || f != "") {
    document.getElementById("assign").innerHTML = "";
  }


}
</script>
<div id='myModal' class='reveal-modal medium' data-reveal role='dialog'>
        <h3><img src='icons/cancel-48.png' alt='cancel icon'><br>Please provide a reason why you are removing the client</h3>
        <p><input type='text' name='del'></p>
        <p><button class='button alert' name='".$row['client_name']."'>Continue to remove</button> <button class='button success' class="close-reveal-modal">Cancel removal</button</p>
        </div>        
<div class="row">
  <center>
    <footer><hr>&copy;<?php echo date("Y")?> Cryosoft corporation.</footer></center>
  </div>
</body>
</html>
<?php
$dark="dark";
$light="light";
if($_SESSION["theme_preference"]==$dark){
  echo '<script>
  document.getElementById("body").style.color = "white";
  document.getElementById("clients").style.color = "white";
  document.getElementById("clients2").style.color = "white";
  document.getElementById("body").style.backgroundColor = "black";
  </script>';
}
else if($_SESSION["theme_preference"]==$light)
{
 echo '<script>
 document.getElementById("body").style.color = "black";
 document.getElementById("body").style.backgroundColor = "white";
 </script>';
}
?>