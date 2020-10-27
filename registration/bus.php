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
  <th>Bus Id</th> 
  <th>Name</th>
  <th>Route Id</th>
  <th>Supervisor Id</th>
  <th>Driver Id</th>
 </tr>
 <?php
$conn = mysqli_connect("localhost", "root", "", "bus_route_system");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT BUS_ID,NAME,ROUTE_ID,SUVP_ID,DRIVER_ID FROM bus";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["BUS_ID"]. "</td><td>" . $row["NAME"]. "</td><td>" . $row["ROUTE_ID"]. "</td><td>" . $row["SUVP_ID"] . "</td><td>"
. $row["DRIVER_ID"]. "</td></tr>";
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