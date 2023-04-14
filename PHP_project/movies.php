<?php

$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'ticketbooking';

$conn = mysqli_connect($host, $username, $password, $database);

$sql = "SELECT * FROM movies";
$result = mysqli_query($conn, $sql);
if ($result) {
    $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Error: " . mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Movie List</title>
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
<table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Hall</th>
        <th>Seats</th>
        <th>Showtime</th>
        <th>Book Now</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($movies as $movie): ?>
        <tr>
          <td><?php echo $movie['title']; ?></td>
          <td><?php echo $movie['description']; ?></td>
          <td><?php echo $movie['hall']; ?></td>
          <td><?php echo $movie['seats']; ?></td>
          <td><?php echo $movie['showtime']; ?></td>
          <td><a href="book.php?id=<?php echo $movie['id']; ?>">Book Now</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>