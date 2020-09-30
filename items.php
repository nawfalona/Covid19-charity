<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "covid19";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




$sql = "SELECT items.id, name, description, image, users.address, users.phone  FROM items INNER JOIN users ON items.userid=users.id;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  echo "<table>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td><img height='100' src='".$row["image"]."'></td><th>" . $row["name"]. "</th><td> " . $row["description"]. " </td><td>" . $row["address"]. "</td>". " </td><td><a href='tel:" . $row["phone"]. "'><img height='25' width='25' src='images/call.png'></a></td>";
  }
} else {
  echo "0 results";
}
  echo "</table>";

$conn->close();
?>