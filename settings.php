  <?php
  session_start();
  ?>
  <!--You must start the session on every page to ensure that any session cookie has been started-->
  <html lang="en">
  <head>
  	<title>Settings | Cryosoft</title>

    <!--style sheets and javascripts required to run the console page-->
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="icons/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/foundation/foundation.css">
    <link rel="stylesheet" type="text/css" href="css/foundation/foundicons/foundation-icons.css">
    <link rel="stylesheet" type="text/css" href="css/site_custom.css">
    <script type="text/javascript" src="js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/foundation/foundation.min.js"></script>
    <script type="text/javascript" src="js/modernizr/modernizr.js"></script>

    <!-- internal css though also check external css for more page customizations-->
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
  #picture_upload
  {
   background-color: #4CAF50;
   border: none;
   color: white;
   padding: 16px 32px;
   text-decoration: none;
   margin: 4px 2px;
   cursor: pointer;
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
    <!--The side bar that shows on your left hand side to get you navigating to other sites or logging out-->
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
  <!--End of side bar code -->

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

    <section class="top-bar-section">
      <ul class="left">
        <li><a href="home.php">Home</a></li>
        <li><a href="#">Uploads</a></li>
        <li><a href="#">Accounts</a></li>
        <li><a href="clients.php">Client Info</a></li> 
        <li><a href="feedback.php">Client Feedback</a></li>   
        <li><a href="#">Account Settings</a></li> 
      </ul>
    </section>
  </nav>
  <div class="col-sm-6">
   <div id="title2">Theme Settings</div>
   <div class="welcome_text">
    You can change your theme preferences here.</div>
    <p id="demo2" style="color:#ffffff;"></p>
    <br>
    <form method="post" action="">
      <?php
      $dark="dark";
      $light="light";
      if($_SESSION["theme_preference"]==$dark){
        echo '<div class="col-sm-3">
        Light
        <div class="switch round tiny" onclick="colorlight()" >
        <input id="mySwitch1" type="radio" name="myGroup" value="0" >
        <label for="mySwitch1"></label>
        </div>
        </div>
        <div class="col-sm-3">

        Dark
        <div class="switch round tiny" onclick="colordark()">
        <input id="mySwitch2" type="radio" name="myGroup" checked value="1">
        <label for="mySwitch2"></label>
        </div>
        </div>';
      }
      else if($_SESSION["theme_preference"]==$light){
        echo '<div class="col-sm-3">
        Light
        <div class="switch round tiny" onclick="colorlight()" >
        <input id="mySwitch1" type="radio" name="myGroup" checked  value="0">
        <label for="mySwitch1"></label>
        </div>
        </div>
        <div class="col-sm-3">

        Dark
        <div class="switch round tiny" onclick="colordark()">
        <input id="mySwitch2" type="radio" name="myGroup" value="1">
        <label for="mySwitch2"></label>
        </div>
        </div>';
      }
      ?>
      <button name="theme">Apply</button><br>
      <?php
      if (isset($_POST['theme'])) {
        $myGroup=$_POST['myGroup'];
        if($myGroup==0){
          $conn = new mysqli('localhost','root','', 'cryosoft');
  // Check connection
          if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
          } 
          $con_user=$_SESSION['name_of_user'];
          $sql = "UPDATE users SET theme_preferences='light' WHERE full_name='$con_user'";

          if ($conn->query($sql) === TRUE) {
            echo '<br>You have successfully changed your theme to Light';
            $_SESSION['theme_preference']='light';

          } 
          else {
            echo 'An error occured that is preventing you from changing your theme preferences';
          }
          $conn->close();
        }
        else if($myGroup==1){
          $conn = new mysqli('localhost','root','', 'cryosoft');
  // Check connection
          if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
          } 
          $con_user=$_SESSION['name_of_user'];
          $sql = "UPDATE users SET theme_preferences='dark' WHERE full_name='$con_user'";

          if ($conn->query($sql) === TRUE) {
            echo '<br>You have successfully changed your theme to Dark';
            $_SESSION['theme_preference']='dark';

          } 
          else {
            echo 'An error occured that is preventing you from changing your theme preferences';
          }
          $conn->close();
        }
      }
      ?>
    </form>

  </div>
  <div class="col-sm-6">
    <div id="title2"> Other account settings</div>
    <?php
    if (isset($_POST['user_change'])) {
      $old=$_POST['old_user'];
      $new=$_POST['new_user'];

      $conn = new mysqli("localhost","root","", "cryosoft");
  // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 
      $con_user=$_SESSION["name_of_user"];
      $sql = "SELECT * FROM users WHERE username='$old' AND full_name='$con_user'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $con_user=$_SESSION["name_of_user"];
        $sql = "UPDATE users SET username='$new' WHERE  username='$old' AND full_name='$con_user'";

        if ($conn->query($sql) === TRUE) {
          echo '<div data-alert class="alert-box success">
          <strong>Username Changed.</strong> You have successfully changed your username from '.$old.' to '. $new.'
          </div>';
        } 
        else {
          echo '<div data-alert class="alert-box alert">
          <strong>Error changing Username</strong> An error occured that is preventing you from changing the username.
          </div>';
        }
      }
      else{
        echo '<div data-alert class="alert-box alert">
        <strong>Error changing Username</strong> No such username as '.$old .' exists.
        </div>';
      }
      $conn->close();
    }

    if (isset($_POST['change_pass'])) {
      $user=$_POST['username'];
      $passnew=$_POST['newpass'];
      $hash=md5($passnew);
      $passconf=$_POST['confpass'];
      $conn = new mysqli("localhost","root","", "cryosoft");

        // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 

      $con_user=$_SESSION["name_of_user"];
      $sql = "SELECT * FROM users WHERE username='$user' AND full_name='$con_user'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $con_user=$_SESSION["name_of_user"];
        $sql = "UPDATE users SET password='$hash' WHERE  username='$user' AND full_name='$con_user'";

        if ($conn->query($sql) === TRUE) {
          echo '<div data-alert class="alert-box success"><strong>Username Changed.</strong> You have successfully changed your password.</div>';
        } 
        else {
         echo '<div data-alert class="alert-box alert"><strong>Error changing password</strong> Unable to change the password!</div>';
       }
     }
     else{
      echo '<div data-alert class="alert-box alert"><strong>Error changing Username</strong> No such username as '.$user .' exists.</div>';
    }
    
    $conn->close();

  }

  if (isset($_POST['change_ppiq'])) {
    $target_dir = "personel/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $a=$_SESSION['imagename'];
      if (empty($a)) {

      }
      else{
        if (file_exists("personel/$a")) {
          unlink("personel/$a");
        }
      }

      $conn = new mysqli("localhost","root","", "cryosoft");

        // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 
      $con_user=$_SESSION["name_of_user"];
      $name_of_image=basename($_FILES["fileToUpload"]["name"]);
      $image_code='<img src="personel/'.$name_of_image.'" width="96px" height="96px">';
      $sql = "UPDATE users SET image='$image_code', image_name='$name_of_image' WHERE  full_name='$con_user'";
      if ($conn->query($sql) === TRUE) {
        echo '<div data-alert class="alert-box success"><strong>Profile Picture changed.</strong> The file '.basename( $_FILES["fileToUpload"]["name"]).' has been set as profile picture.</div><meta HTTP-EQUIV="Refresh" CONTENT="5; URL=settings.php">';
        $_SESSION["id"]='<img src="personel/'.basename( $_FILES["fileToUpload"]["name"]).'" width="96px" height="96px">';
      } 
      else {
       echo '<div data-alert class="alert-box alert"><strong>Error changing Profile picture</strong> Unable to change the profile picture!</div>';
     }

   } else {
    echo '<div data-alert class="alert-box alert"><strong>Error changing Profile picture</strong><br>Unable to change the profile picture!</div>';
  }
}
?>
<a href="#" data-toggle="collapse" data-target="#demo">Change Username</a><br>
<div id="demo" class="collapse">
  <form method="post" action="">
    <legend id="legend">Username Configuration</legend>
    <input type="text" placeholder="Old username" name="old_user" required>
    <input type="text" placeholder="New username" name="new_user" required>
    <?php
    if ($_SESSION['name_of_user']=="Guest User") {
      echo "You don't have access to changing of user data";
    }
    else{
      echo("<button class='btn btn-default right' name='user_change' type='submit'>Change Username</button>");
    }
    ?>
    
  </form>

</div>

<a href="#" data-toggle="collapse" data-target="#pass">Change password</a><br>
<div id="pass" class="collapse">
  <form method="post" action="">
    <legend id="legend1">Password Configuration</legend>
    <input type="text" placeholder="Username" name="username" required>
    <input type="password" placeholder="New Password" name="newpass" required>
    <input type="password" placeholder="Confirm Password" name="confpass" required>
    <?php
    if ($_SESSION['name_of_user']=="Guest User") {
      echo "You don't have access to changing of user data";
    }
    else{
      echo("<button class='btn btn-default right' name='change_pass' type='submit'>Change Password</button>");
    }
    ?>
    
  </form>

</div>
<a href="#" data-toggle="collapse" data-target="#profile">Change Profile picture</a><br>
<div id="profile" class="collapse">
  <form method="post" action="" enctype="multipart/form-data">
    <legend id="legend2">Profile Picture Update</legend>
    <div id="picture_upload">
      <center><div id="appearhere"></div></center><br>
      <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <?php
    if ($_SESSION['name_of_user']=="Guest User") {
      echo "You don't have access to changing of user data";
    }
    else{
      echo("<button class='btn btn-default' name='change_ppiq'>Change Profile Picture</button>");
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

function colordark()
{
  document.getElementById("body").style.color = "white";
  document.getElementById("body").style.backgroundColor = "black";
  document.getElementById("legend").style.color = "white";
  document.getElementById("legend1").style.color = "white";
  document.getElementById("legend2").style.color = "white";
}
function colorlight()
{
  document.getElementById("body").style.color = "black";
  document.getElementById("body").style.backgroundColor = "white";
  document.getElementById("legend").style.color = "black";
          document.getElementById("legend1").style.color = "black";
          document.getElementById("legend2").style.color = "black";

}
function filePreview(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#appearhere + img').remove();
      $('#appearhere').after('<img src="'+e.target.result+'" width="400" height="300"/>');
              //$('#uploadForm + embed').remove();
              //$('#uploadForm').after('<embed src="'+e.target.result+'" width="450" height="300">');
            }
            reader.readAsDataURL(input.files[0]);
          }
        }

        $("#fileToUpload").change(function () {
          filePreview(this);
        });
        </script>
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
          document.getElementById("body").style.backgroundColor = "black";
           document.getElementById("legend").style.color = "white";
          document.getElementById("legend1").style.color = "white";
          document.getElementById("legend2").style.color = "white";
          </script>';
        }
        else if($_SESSION["theme_preference"]==$light)
        {
         echo '<script>
         document.getElementById("body").style.color = "black";
         document.getElementById("body").style.backgroundColor = "white";
          document.getElementById("legend").style.color = "black";
          document.getElementById("legend1").style.color = "black";
          document.getElementById("legend2").style.color = "black";
         </script>';
       }
       ?>