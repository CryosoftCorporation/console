
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/site_custom.css">
	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
	<link rel="icon" href="icons/favicon.png" type="image/x-icon">
	<title>Admin | Cryosoft</title>
	
</head>
<style type="text/css">
body{
	/*background-color: #31B0D5;*/
}
@font-face{
	font-family: custom_font;
	src: url(fonts/font_segoe.TTF);
}
.loader {
	border: 5px solid #f3f3f3; /* Light grey */
	border-top: 5px solid #17A05E; /* green */
	border-radius: 50%;
	width: 30px;
	height: 30px;
	animation: spin 2s linear infinite;
}
.modal-header, h4, .close {
	background-color: #31B0D5;
	color:white;
	text-align: center;
	font-size: 30px;
}

@keyframes spin {
	0% { transform: rotate(0deg); }
	100% { transform: rotate(360deg); }
}
/*#material{
	margin-top: 8%;
		background-color: white;
		width: 90%;
		height: 0%;
    	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    	text-align: center;

}*/
</style>
<body>
	<center>
		<div class="container-fluid">
			<div id="material">
			<img src="logo.png"  height="15%" style="padding-top:20px;">
			<div id="intro_page_title">Cryosoft's Console</div>
			<div class="row" id="text">Hi there! <br>Please sign in to access the Admin Console.</div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<?php
					if (isset($_POST['submit'])) {
						$uname=$_POST['username'];
						$password=$_POST['pwd'];
						$hash=md5($password);
						$uname2="kanji-karanja";
						$password2="1234";
						$conn = new mysqli("localhost","root","", "cryosoft");
// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						} 

						$sql = "SELECT * FROM users WHERE username='$uname' AND password='$hash'";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							echo '<div class="alert alert-success"><strong>Success!</strong> Please wait, redirecting... <div class="loader" style="float:right;"></div></div> 
							<meta HTTP-EQUIV="Refresh" CONTENT="4; URL=home.php">';
							session_start();
							while($row = $result->fetch_assoc()) {
								$_SESSION["theme_preference"] =  $row["theme_preferences"];
								$_SESSION["name_of_user"] =  $row["full_name"];
								$_SESSION['id']=$row["image"];
								$_SESSION['imagename']=$row["image_name"];
								$_SESSION['ident']= $row["id"];
							}
						}
						else
						{
							echo '<div class="alert alert-danger"><strong>Error!</strong> No such username or password exists. Please try again.</div>';
						}
					}

					?>
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="well">

						<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Sign In to console</button>

						<!-- Modal -->
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">
								
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header" style="padding:35px 50px;">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4> Sign In</h4>
									</div>
        <!--
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h1 class="modal-title">Sign In</h1>
        </div>
    -->
    <div class="modal-body">
    	<form class="form-inline" role="form" method="post" action="">
    		<div class="form-group">
    			<input type="text" class="form-control" name="username" placeholder="Username" required>
    		</div>
    		<div class="form-group">
    			<input type="password" class="form-control" name="pwd" placeholder="Password" required>
    		</div>
    		<button type="submit" class="btn btn-default" name="submit">Sign in</button>
    	</form>
    	Note: This console is only accessible to Cryosoft Personel.
    </div>
    <div class="modal-footer">
    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>

</div>
</div>


</div>
</div>
<div class="col-sm-3"></div>
</div>
<div class="row">
	<div class="col-sm-12">
		
		<footer style="color:#FF0000"><strong>&copy; <?php echo date("Y")?> Cryosoft corporation. <br>
			This console is only accessible to Cryosoft personel.</strong></footer>
		</div>
	</div>
</div>
</div>
</center>


</body>
</html>
<script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
</script> 