<?php

$host = '127.0.0.1';
$username = 'root';
$password = '';
$database = 'ticketbooking';

$conn = mysqli_connect($host, $username, $password, $database);

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>All Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
  <h1>All Users</h1>
  <?php if(!empty($users)): ?>
      <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach($users as $user): ?>
          <tr>
            <td><?php echo $user['name']; ?></td>

              <td><?php echo $user['email']; ?></td>

          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No users found.</p>
  <?php endif; ?>
</body>
</html>