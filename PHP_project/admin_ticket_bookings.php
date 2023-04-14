<?php

$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'ticketbooking';

$conn = mysqli_connect($host, $username, $password, $database);

$sql = "SELECT bookings.*, users.name AS user_name, movies.title AS movie_title
        FROM bookings
        INNER JOIN users ON bookings.user_id = users.id
        INNER JOIN movies ON bookings.movie_id = movies.id";

$result = mysqli_query($conn, $sql);
$bookings = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="admin.html">Home</a>
        <a class="navbar-brand" href="add_movie.html">Add Movie</a>
        <a class="navbar-brand" href="admin_ticket_bookings.php">See all bookings</a>
        <a class="navbar-brand" href="users.php">All Users</a>



    </div>
</nav>
  <h1>Bookings</h1>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>User Name</th>
        <th>Movie Title</th>
        <th>Seats</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach($bookings as $booking): ?>
      <tr>
        <td><?php echo $booking['id']; ?></td>
        <td><?php echo $booking['user_name']; ?></td>
        <td><?php echo $booking['movie_title']; ?></td>
        <td><?php echo $booking['seats']; ?></td>

      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>