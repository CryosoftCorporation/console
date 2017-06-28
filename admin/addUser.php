<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../resources/css/custom.css">
	<script type="text/javascript" src="../resources/js/jquery.min.js"></script>
	<script type="text/javascript" src="../resources/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		$conn=new mysqli("localhost","root","","cryosoft");
		if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
		}
      	if (isset($_POST['add'])) {
      	$username = $_POST['username'];
      	$fullname = $_POST['fullname'];
      	$password = $_POST['password'];
      	$confirm_pass = $_POST['confirm_pass'];
      	$hash=md5($confirm_pass);
      	$theme_pref = $_POST['theme_pref'];
      	$pic='<img src=\"personel/gender_neutral_user-48.png\" width=\"96px\" height=\"96px\">';
      	$sql="INSERT INTO users (username, password, theme_preferences, full_name, image, image_name) VALUES ('$username','$hash','$theme_pref','$fullname','$pic','gender_neutral_user-48.png');";
      	if ($conn->query($sql) === TRUE) {
   		 echo "New user added successfully";
		} else {
   		 echo "Error: " . $sql . "<br>" . $conn->error;
		}
      	}
      	?>
      	<h4>Add new user</h4>
        <form action="" method="POST" onsubmit="return validateForm()" name="new_user">
            <input type="text" name="username" placeholder="Username" class="form-control" required><br><div id="name"></div>
        	<input type="text" name="fullname" placeholder="Full Name" class="form-control" required><br>
        	<div id="passwordError"></div>
        	<input type="password" name="password" placeholder="Password" class="form-control" required oninput="passwordCheck()"><br>
        	<div id="passwordError2"></div>
        	<input type="password" name="confirm_pass" placeholder=" Confirm Password" class="form-control" oninput="confirmPassword()" required><br>
        	<label>Theme Preference</label><br>
        		<select class="form-control" required name="theme_pref">
        			<option value="light">Light</option>
        			<option value="dark">Dark</option>
        		</select>
        
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" name="add" value="Add user"></form>
        <script type="text/javascript">
function validateForm() {
  var a = document.forms["new_user"]["password"].value;
  var b = document.forms["new_user"]["confirm_pass"].value;
  if (!(a===b)) {
    document.getElementById("passwordError").innerHTML = "Passwords do not match";
    document.getElementById("passwordError").style.color = "red";
    return false;
  }
}
function passwordCheck(){
 var a = document.forms["new_user"]["password"].value;
 if(a.length==0){
 		document.getElementById("passwordError").innerHTML = "";
 }
 if(a.length>0 && a.length<5){
 	document.getElementById("passwordError").innerHTML = "Weak Password";
    document.getElementById("passwordError").style.color = "red";
 }
 if(a.length>5 && a.length<9){
 	document.getElementById("passwordError").innerHTML = "Medium Strength password";
    document.getElementById("passwordError").style.color = "orange";
 }
 if(a.length>10 && a.length<15){
 	document.getElementById("passwordError").innerHTML = "Strong password";
    document.getElementById("passwordError").style.color = "green";
 }
 if(a.length>15){
 	document.getElementById("passwordError").innerHTML = "Very Strong password";
    document.getElementById("passwordError").style.color = "#3CE611";
 }
}
function confirmPassword(){
var a = document.forms["new_user"]["password"].value;
  var b = document.forms["new_user"]["confirm_pass"].value;
  if (!(a===b)) {
    document.getElementById("passwordError2").innerHTML = "Passwords do not match";
    document.getElementById("passwordError2").style.color = "red";
}
if(a===b){
		document.getElementById("passwordError2").innerHTML = "Passwords match";
		document.getElementById("passwordError2").style.color = "green";
}
if(b==""){
		document.getElementById("passwordError2").innerHTML = "";
}
}

</script>
</body>
</html>