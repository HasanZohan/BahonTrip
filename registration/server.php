<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$customername = "";
$phonenumber = "";
$destination = "";
$bus_ID = "";
//$route_ID = "";
$admin_name = "";
$admin_password = "";
$admin_ID = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'bahon_trip');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// ...

// Bookings
if (isset($_POST['bookings_user'])) {
  // receive all input values from the form
  $customername = mysqli_real_escape_string($db, $_POST['customername']);
  $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);
  $time = mysqli_real_escape_string($db, $_POST['time']);
  $destination = mysqli_real_escape_string($db, $_POST['destination']);
  $bus_ID = mysqli_real_escape_string($db, $_POST['bus_ID']);
 // $route_ID = mysqli_real_escape_string($db, $_POST['route_ID']);
 // $date = mysqli_real_escape_string($db, $_POST['date']);
 // $ticket_number = mysqli_real_escape_string($db, $_POST['ticket_number']);
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($customername)) { array_push($errors, "Customername is required"); }
  if (empty($phonenumber)) { array_push($errors, "Phonenumber is required"); }
  if (empty($time)) { array_push($errors, "Time is required"); }
  if (empty($destination)) { array_push($errors, "Destination is required"); }
  if (empty($bus_ID)) { array_push($errors, "Pick Up location is required"); }
  //if (empty($route_ID)) { array_push($errors, "Route ID is required"); }
 // if (empty($date)) { array_push($errors, "Date is required"); }
//  if (empty($ticket_number)) { array_push($errors, "Ticket number is required"); }
  
 // if ($ticket_number == 0) {
//	array_push($errors, "How many tickets do you want ! Enter a number please");
 // }
//if ($ticket_number < 0) {
//	array_push($errors, "Ticket number can not be less than 0");
 // }


  
  
  
  
  
  $query1 = "INSERT INTO BOOKINGS (NAME, destination) 
  			  VALUES('$customername', '$destination')";
  
  
  mysqli_query($db, $query1);

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
 
  
}




// LOGIN USER


if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}






// LOGIN ADMIN


if (isset($_POST['login_admin'])) {
  $admin_name = mysqli_real_escape_string($db, $_POST['admin_name']);
  $admin_password = mysqli_real_escape_string($db, $_POST['admin_password']);
  $admin_ID = mysqli_real_escape_string($db, $_POST['admin_ID']);
  

  if (empty($admin_name)) {
  	array_push($errors, "Admin Name is required");
  }
  if (empty($admin_password)) {
  	array_push($errors, "Admin Password is required");
  }
  if (empty($admin_ID)) {
  	array_push($errors, "Admin ID Password is required");
  }

  
  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM admin WHERE name='$admin_name' AND password='$admin_password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $admin_name;
  	  $_SESSION['success'] = "Welcome $admin_name";
  	  header('location: admin.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }

  
}

?>