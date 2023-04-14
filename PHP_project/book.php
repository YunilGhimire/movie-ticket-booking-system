<?php
session_start();

$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'ticketbooking';

$conn = mysqli_connect($host, $username, $password, $database);

$id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "SELECT * FROM movies WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$movie = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];
    } else {
        die("Error: User ID not set.");
    }

    $movie_id = mysqli_real_escape_string($conn, $movie['id']);
    $seats = mysqli_real_escape_string($conn, $_POST['seats']);

    if ($seats > $movie['seats']) {
        $error = "Sorry, only " . $movie['seats'] . " seats are available.";
    } else {
        $insert_sql = "INSERT INTO bookings (user_id, movie_id, seats) VALUES ('$user_id', '$movie_id', '$seats')";
        $update_sql = "UPDATE movies SET seats=seats-'$seats' WHERE id='$movie_id'";

        if (!mysqli_query($conn, $insert_sql)) {
            die("Error: " . mysqli_error($conn));
        }

        if (!mysqli_query($conn, $update_sql)) {
            die("Error: " . mysqli_error($conn));
        }

        echo "Movie booked successfully";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
<h2>Book Ticket for <?php echo $movie['title']; ?></h2>
<?php if (isset($error)): ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>
<form method="POST">
    <label for="seats">Number of Seats:</label>
    <input type="number" name="seats" id="seats" min="1" max="<?php echo $movie['seats']; ?>" required>
    <button type="submit">Book Now</button>
</form>
</body>
</html>