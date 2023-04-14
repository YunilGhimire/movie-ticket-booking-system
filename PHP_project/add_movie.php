<?php

$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'ticketbooking';

$conn = mysqli_connect($host, $username, $password, $database);

$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$hall = mysqli_real_escape_string($conn, $_POST['hall']);
$seats = mysqli_real_escape_string($conn, $_POST['seats']);
$showtime = mysqli_real_escape_string($conn, $_POST['showtime']);

$sql = "INSERT INTO movies (title, description, hall, seats, showtime) 
        VALUES ('$title', '$description', '$hall', $seats, '$showtime')";

if(mysqli_query($conn, $sql)) {
  echo "Movie added successfully.";
} else {
  echo "Error adding movie: " . mysqli_error($conn);
}

mysqli_close($conn);
?>