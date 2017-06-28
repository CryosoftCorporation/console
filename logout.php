<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();
?>
<html>
<head>
	<meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/site_custom.css">
    <script type="text/javascript" src="js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
    <link rel="icon" href="icons/favicon.png" type="image/x-icon">
    <style type="text/css">
    body{
       font-family: "Segoe UI Light"
   }
   @font-face{
       font-family: custom_font;
       src: url(fonts/font_segoe.TTF);
   }
   #padding_sign{
       padding-top: 50px;
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
</style>
<title>Cryosoft | Secure Log Out</title>
</head>
<body>
	<div class="container-fluid"><div class="row">
       <div class="col-sm-12" id="padding_sign">
           <center>
              <div id="intro_page_title">Thank you for keeping the future at hand</div>
              <?php
// Unset all of the session variables.
              $_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
              if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                    );
            }

// Finally, destroy the session.
            session_destroy();
            echo '<div class="alert alert-success"><strong>YOU ARE BEING LOGGED OUT</strong> Please wait, redirecting... <div class="loader" style="float:right;"></div></div> 
            <meta HTTP-EQUIV="Refresh" CONTENT="4; URL=index.php">';
            ?>
        </center>
    </div></div>
</div>
<div class="row">
    <center>
        <footer><hr>&copy;<?php echo date("Y")?> Cryosoft corporation.</footer></center>
    </div>
</body>
</html>

<script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
</script> 