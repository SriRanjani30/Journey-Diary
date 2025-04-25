<?php

$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "diary";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = $_POST['password'];

$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

$sql = "INSERT INTO diary (Username, Password) VALUES ('$user', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Signup successful! <a href='login.html'>Login now</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
