<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Bookings</h2>
  </div>
	
  <form method="post" action="bookings.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Customer Name</label>
  	  <input type="text" name="customername" value="<?php echo $customername; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Phone Number</label>
  	  <input type="number_format" name="phonenumber" value="<?php echo $phonenumber; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Time</label>
  	  <input type="time" name="time" value="<?php echo $time; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Destination</label>
  	  <input type="text" name="destination" value="<?php echo $destination; ?>">
  	</div>
	<div class="input-group">
  	  <label>Bus ID</label>
  	  <input type="text" name="bus_ID" value="<?php echo $bus_ID; ?>">
  	</div>
	<div class="input-group">
  	  <label>Route ID</label>
  	  <input type="text" name="route_ID" value="<?php echo $route_ID; ?>">
  	</div>

	<div class="input-group">
  	  <label>Ticket Number</label>
  	  <input type="number" name="ticket_number" value="<?php echo $ticket_number; ?>">
  	</div>
	
  	<div class="input-group">
  	  <button type="submit" class="btn" name="bookings_user">Done</button>
  	</div>
  	<p>
  		 <a href="index.php">Back</a>
  	</p>
  </form>
</body>
</html>