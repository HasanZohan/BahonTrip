<!DOCTYPE html>
<html>
<head>
 <title>Table with database</title>
 <style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
     } 
  th {
   background-color: #588c7e;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
</head>
<body>
 <table>
 <tr>
  <th>Bookings Id</th> 
  <th>Customer Name</th>
  <th>Date</th>
  <th>Time</th>
  <th>Ticket Amount</th>
  <th>Customer ID</th>
  <th>Route ID</th>
  <th>Destination</th>
 </tr>
 <?php
$conn = mysqli_connect("localhost", "root", "", "bus_route_system");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT Book_ID,NAME,DATE,TIME,AMOUNT,CUS_ID,ROUTE_ID,FromToDestination FROM bookings";
  $result = $conn->query($sql);
 
   // output data of each row
   
   if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Book_ID"]. "</td><td>" . $row["NAME"]. "</td><td>" . $row["DATE"]. "</td><td>" . $row["TIME"]. "</td><td>" . $row["AMOUNT"] . "</td><td>"
. $row["CUS_ID"]. "</td><td>" . $row["ROUTE_ID"]. "</td><td>" . $row["FromToDestination"]. "</td></tr>";
   }
echo "</table>";
} else { echo "0 results"; }
   
    
 
$conn->close();


?>
</table>

<p>
  		 <a href="admin.php">Back</a>
  	</p>
</body>
</html>