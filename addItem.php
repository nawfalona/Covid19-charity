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



$name = $_POST['nm'];
$desc = $_POST['ds'];
$img = $_POST['img'];
$uid = $_POST['userid'];

$sql = "INSERT INTO items (name, description, image, userid) VALUES ('$name', '$desc', '$img', '$uid')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  $url = $_SERVER['HTTP_REFERER'];
  header("location: $url");
  die();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>