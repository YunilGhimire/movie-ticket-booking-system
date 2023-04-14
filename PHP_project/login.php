<?php
session_start();
$host='127.0.0.1';
$username="root";
$password="";
$database="ticketbooking";

$conn=mysqli_connect($host,$username,$password,$database);


if($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST['email'];
  $password = $_POST['password'];


  $query = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $query);


  if(mysqli_num_rows($result) > 0)  {

    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $name = $row['name'];
    $pass = $row['password'];

    if($password == $pass) {

      $_SESSION['id'] = $id;
      $_SESSION['name'] = $name;

      echo "User logged in successfully";
    } else  {
      echo "Invalid email or password.";
    }

  }


}

?>

