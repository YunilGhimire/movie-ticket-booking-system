<?php

$host='127.0.0.1';
$username="root";
$password="";
$database="ticketbooking";

$conn=mysqli_connect($host,$username,$password,$database);


if($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];


  $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
  $result = mysqli_query($conn, $query);

  if($result) {
    echo "User Registration Successfull";
}
}
?>