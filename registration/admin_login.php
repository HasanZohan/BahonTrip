<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Admin Login</h2>
  </div>
	 
  <form method="post" action="admin_login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Admin Name</label>
  		<input type="text" name="admin_name" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="admin_password">
  	</div>
	
	<div class="input-group">
  		<label>ID</label>
  		<input type="ID" name="admin_ID">
  	</div>
	
	
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_admin">Login</button>
		
  	</div>
	
		<p>
  		If You Are Not A Admin.  <a href="login.php">Click Here!</a>
  	</p>
  	
  </form>
</body>
</html>