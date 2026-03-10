<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Sistem Inventaris Laundry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-container">
    <form method="POST" action="proses_login.php">
        <h2>Login Sistem</h2>

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>