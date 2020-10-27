<?php 
  session_start(); 
if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: admin_login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: admin_login.php");
  }
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Admin</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		
		<div class="input-group">
		<br><br>
		 <a href="show_bookings.php"> <button  class="btn" >BOOKINGS</button> </a>
		</div>
		<div class="input-group">
		<a href="admin_route.php"> <button class="btn">ROUTE</button> </a>
		</div>
		<div class="input-group">
		<a href="admin_ticket.php"> <button class="btn">TICKETS</button> </a>
			
		</div>
		<div class="input-group">
		<a href="users.php"> <button class="btn">User</button> </a>
		</div>	
		<div class="input-group">
		
		 <a href="bus.php"> <button  class="btn" >Bus</button> </a>
		</div>
		
		<div class="input-group">
		<a href="driver.php"> <button class="btn">Driver</button> </a>
		</div>
		<div class="input-group">
		<a href="company.php"> <button class="btn">Company</button> </a>
		</div>
		<div class="input-group">
		<a href="supervisor.php"> <button class="btn">Supervisor</button> </a>
		</div>
		
		
		<p> <a href="admin_login.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>