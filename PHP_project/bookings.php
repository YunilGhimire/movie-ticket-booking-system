<?php

session_start();

$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'ticketbooking';

$conn = mysqli_connect($host, $username, $password, $database);

if (isset($_SESSION['id'])) {
  $user_id = $_SESSION['id'];

  $sql = "SELECT bookings.*, movies.title, movies.showtime
          FROM bookings
          INNER JOIN movies ON bookings.movie_id = movies.id
          WHERE user_id = $user_id";
  $result = mysqli_query($conn, $sql);
  $bookings = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.html">Home</a>
        <a class="navbar-brand" href="login.html">Login</a>
        <a class="navbar-brand" href="register.html"> Register</a>
        <a class="navbar-brand" href="movies.php">All Movies</a>
        <a class="navbar-brand" href="bookings.php">My Bookings</a>




    </div>
</nav>
  <h1>My Bookings</h1>
  <?php if(isset($bookings) && !empty($bookings)): ?>
      <table class="table">
      <thead>
        <tr>
          <th>Movie</th>
          <th>Showtime</th>
          <th>Seats</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($bookings as $booking): ?>
          <tr>
            <td><?php echo $booking['title']; ?></td>
            <td><?php echo $booking['showtime']; ?></td>
            <td><?php echo $booking['seats']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No bookings found.</p>
  <?php endif; ?>
</body>
</html>