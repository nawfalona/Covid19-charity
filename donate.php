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



$fname = $_POST['fname'];
$lname = $_POST['lname'];
$org = $_POST['org'];
$phone = $_POST['phone'];
$amount = $_POST['amount'];
$address = $_POST['address'];
$addlist = $_POST['addlist'];


$sql = "INSERT INTO donation (fname, lname, organization, phone, amount, address, addToList) VALUES ('$fname', '$lname', '$org', '$phone', '$amount', '$address', '$addlist')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  $url = "https://bitpay.com/cart/add?itemId=P8xpSUUxineXHgD6G8fNGt";
  header("location: $url");
  die();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>