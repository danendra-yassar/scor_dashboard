<?php

$servername = "localhost";
$database = "db_scor_cdk";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Connection CURD
$koneksi = mysqli_connect("localhost","root","","db_scor_cdk");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo " ";

mysqli_close($conn);
?>