<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="resources/css/custom.css">
	<script type="text/javascript" src="resources/js/jquery.min.js"></script>
	<script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
	<style type="text/css">
  iframe{
    margin-top: 30% 
  }
	</style>
</head>
<body>

<div class="container-fluid">
<div class="row">
	<div class="col-sm-1 header-color header">Admin</div>
	<div class="col-sm-7">
	<div class="padding-header"><span class="settings-header">Accounts</span> <input type="search" placeholder="Search accounts" class="float"></div>
	<hr>
	<span class="titles">Usernames</span> 
	<div class="content-show">Be able to monitor closely the users on the console. The usernames that are being currently used are as follows:<br><br>
	<!--The code that gets the user names of users-->
	<?php
	$conn=new mysqli("localhost","root","","cryosoft");
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	else{
		$sql="SELECT * from users";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		echo "<table><tr><th>Username</th><th>Full name</th></tr>";
			    while($row = $result->fetch_assoc()) {
		echo "<tr><td>".$row["username"]."</td><td>" . $row["full_name"]."</td></tr>";
           													 }
        echo "</table>";
									} else {
    										echo "0 results";
											}
	$conn->close();
	}
	?>
	<div class="button-spacing"><a href="#add_user"><button type="button" onclick="addNew()">Add new user</button></a> <button type="button" data-toggle="modal" data-target="#remove-user">Remove user</button> </div>
	</div>
  <script type="text/javascript">
  function addNew(){
  document.getElementById('add_user').innerHTML = '<iframe src="admin/addUser.php" width="100%" height="500px" style="border:none;"></iframe>';
}
</script>
	<br>
	<span class="titles">Progress</span>
	<?php
	$conn=new mysqli("localhost","root","","cryosoft");
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	else{
		$sql="SELECT * from deadlines WHERE status ='1' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$number = $result->num_rows;
			$sql="SELECT * from deadlines WHERE status ='0' ";
			$result2 = $conn->query($sql);
			$number2 = $result2->num_rows;
			$total = $number + $number2;
			$percentage=($number/$total)*100;
			if($total==1){
				$pluraltotal = "Project";
			}
			else{
				$pluraltotal = "Projects";
			}
			if($number==1){
				$pluralcurrent = "Project";
			}
			else{
				$pluralcurrent = "Projects";
			}
			if($number2==1){
				$pluralunderway = "Project";
			}
			else{
				$pluralunderway = "Projects";
			}
		echo "<br><div class='content-show'>Complete Projects=$number $pluralcurrent<br>Projects Underway= $number2 $pluralunderway<br><strong>Total projects= $total $pluraltotal</strong><br><br><div class='progress'>
  <div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='$percentage'
  aria-valuemin='0' aria-valuemax='100' style='width:$percentage%'>
    $percentage % Complete
  </div>
</div></div>";
									}
		 else {
		 	$sql="SELECT * from deadlines WHERE status ='0' ";
		 	$result3 = $conn->query($sql);
		 	if ($result3->num_rows < 1) {

		 		echo "<div class='content-show'><br>Current status:<br><strong>No Projects yet</strong></div>";

		 	}
		 	else{
		 		$incomplete = $result3->num_rows;
		 		if($incomplete==1){
				$pluralunderway = "Project";
			}
			else{
				$pluralunderway = "Projects";
			}
    			echo "<br><br><div class='content-show'>Complete projects = 0 Projects <br>Projects Underway=$incomplete $pluralunderway <br><strong>Total Projects = $incomplete $pluralunderway<strong>
    			<br><div class='progress'>
  <div class='progress-bar progress-bar-danger' role='progressbar' aria-valuenow='100'
  aria-valuemin='0' aria-valuemax='100' style='width:100%'>
    100% Incomplete
  </div>
</div></div>";
}
											}
	$conn->close();
	}
	?>
	
	</div>
  <div class="col-sm-4" id="add_user">

  </div>
</div>
</div>

</body>
</html>