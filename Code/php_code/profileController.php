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

$lastEmail = $_SESSION['email'];
$sql = "SELECT * from users where email='$lastEmail'";
$result = $conn->query($sql);

$email = $_POST['email'];
$password = $_POST['password'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$zip = $_POST['zip'];
$city = $_POST['city'];
$state = $_POST['state'];
$license = $_POST['license'];

if(isset($email)){
    
}

$sql = "SELECT * from users where email='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo phpAlert("Email Already In Use!", "signUp.php");
}
else{
    $status = $statusMsg = ''; 
    if(isset($_POST['submit'])){ 
        $status = 'error';
        if(!empty($_FILES["profilePicture"]["name"]) && !empty($_FILES["driversLicensePicture"]["name"])) { 
            // Get file info 
            $fileName1 = basename($_FILES["profilePicture"]["name"]); 
            $fileName2 = basename($_FILES["driversLicensePicture"]["name"]); 
    
            $fileType1 = pathinfo($fileName1, PATHINFO_EXTENSION); 
            $fileType2 = pathinfo($fileName2, PATHINFO_EXTENSION); 
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
    
            if(in_array($fileType1, $allowTypes) && in_array($fileType2, $allowTypes)){ 
                $image1 = $_FILES['profilePicture']['tmp_name']; 
                $image2 = $_FILES['driversLicensePicture']['tmp_name'];
                $imgContent1 = addslashes(file_get_contents($image1)); 
                $imgContent2 = addslashes(file_get_contents($image2));

                $_SESSION['licensePicture'] = $imgContent2;
                $_SESSION['profilePicture'] = $imgContent1;

                // Insert image content into database 
                $insert = $conn->query("INSERT INTO users VALUES (DEFAULT,'$firstName','$lastName','$phone','$email','$password','$address','$zip','$city','$state','$license','$imgContent2','$imgContent1')"); 
                $sql = "SELECT User_ID from users where email='$email'";
                $result = $conn->query($sql);
                $row = $result->fetch_row();
                $distance = $_POST['distance'];

                $_SESSION['distance'] = $distance;

                if(isset($_POST['check_list'])){
                    $sql = "INSERT into servicers values (DEFAULT,'$row[0]','$distance',0)";
                    $conn->query($sql);
                    $sql = "SELECT Servicer_ID from servicers where User_ID='$row[0]'";
                    $result = $conn->query($sql);
                    $servicer_ID = $result->fetch_row();
                    $serv = $_POST['check_list'];

                    $_SESSION['services'] = $serv;

                    for ($x = 0; $x < count($_POST['check_list']); $x++) {
                        $sql = "INSERT into providesservice values (DEFAULT,'$servicer_ID[0]','$serv[$x]')";
                        $conn->query($sql);
                      }
                }
                else{
                    $sql = "INSERT into clients values (DEFAULT,'$row[0]')";
                    $conn->query($sql);
                }
            }
        }
    } 
    echo $statusMsg; 
    header('location:main.php');
}
$conn->close();
?>