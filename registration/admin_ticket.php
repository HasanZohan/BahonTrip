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
  <th>Ticket Id</th> 
  <th>DATE</th>
  <th>TIME</th>
  <th>Destination</th>
  <th>Normal Price</th>
  <th>Final Price</th>
 </tr>
 <?php
$conn = mysqli_connect("localhost", "root", "", "bus_route_system");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT ID,DATE,TIME,destination,NORMAL_PRICE,FINAL_PRICE FROM ticket";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["DATE"] . "</td><td>"
. $row["TIME"]. "</td><td>" . $row["destination"]. "</td><td>" . $row["NORMAL_PRICE"]. "</td><td>" . $row["FINAL_PRICE"]. "</td></tr>";
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