<?php

$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "Diary";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = $_POST['password'];


$sql = "SELECT Password FROM Diary WHERE Username = '$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    $stored_password = $row['Password']; 
    if (password_verify($pass, $stored_password)) {   
        header("Location: homepage.html");
        exit();
    } else {
        echo "Incorrect password!";
    }
} else {
    echo "Username not found!";
}

$conn->close();
?>
