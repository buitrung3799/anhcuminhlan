<?php 
$servername = "localhost";
$database = "thcs";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    die("Could not connect to database" . mysqli_connect_error());
}
echo "Connected successfully";
?>