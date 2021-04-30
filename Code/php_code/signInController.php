<?php
include 'functions.php';
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
$email = cleanString($_POST['email']);
$password = cleanString($_POST['password']);
echo $email;

$s = "SELECT * from users where email='$email'";
echo $s;
$result = $conn->query($s);
$row = $result->fetch_row();
if ($result->num_rows > 0) {
  if ($password != $row[5]) {
    echo phpAlert("Incorrect Password", "signIn.php");
  }
  else {
    $_SESSION['firstName'] = $row[1];
    $_SESSION['lastName'] = $row[2];
    $_SESSION['phone'] = $row[3];
    $_SESSION['email'] = $row[4];
    $_SESSION['password'] = $row[5];
    $_SESSION['streetAddress'] = $row[6];
    $_SESSION['zip'] = $row[7];
    $_SESSION['city'] = $row[8];
    $_SESSION['state'] = $row[9];
    $_SESSION['licenseNumber'] = $row[10];
    $_SESSION['licensePicture'] = $row[11];
    $_SESSION['profilePicture'] = $row[12];
    header('location:main.php');
  }
  // output data of each row
  /*
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["Email"]."<br>";
  }
  */
}
else {
  echo phpAlert("Unrecognized Email", "signIn.php");
}
$conn->close();
?>