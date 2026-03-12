<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Sistem Inventaris Laundry</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#0d6efd,#6ea8fe);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-card{
            width: 380px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .login-title{
            font-weight: 600;
            color: #0d6efd;
        }
    </style>
</head>

<body>

<div class="card login-card p-4">

    <div class="text-center mb-3">
        <h3 class="login-title">Login Sistem</h3>
        <p class="text-muted">Inventaris Laundry</p>
    </div>

    <form method="POST" action="proses_login.php">

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">
                Login
            </button>
        </div>

    </form>

</div>

</body>
</html>