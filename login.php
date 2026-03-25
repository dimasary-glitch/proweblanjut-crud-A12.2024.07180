<?php 
/*include 'koneksi.php'; 

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
 
include 'koneksi.php';


if(isset($_SESSION['id'])){
    header("Location: index.php");
    exit;
}
?>

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
    </style>
</head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(isset($_GET['error'])){ ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Login Gagal',
    text: 'Username atau password salah',
    confirmButtonColor: '#d33'
});
</script>
<?php } ?>

<body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(isset($_GET['logout'])){ ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Logout Berhasil',
    text: 'Anda telah keluar dari sistem',
    timer: 1500,
    showConfirmButton: false,
    timerProgressBar: true
});
</script>
<?php } ?>

<div class="card login-card p-4">

    <h4 class="text-center mb-3 text-primary">Login Sistem</h4>

    <!-- Notifikasi -->
    <?php if(isset($_GET['error'])){ ?>
        <div class="alert alert-danger text-center">
            Username atau password salah
        </div>
    <?php } ?>

    <form method="POST" action="proses_login.php">

        <div class="mb-3">
            <label>Username</label>
            <input type="text" 
                   name="username" 
                   class="form-control"
                   value="<?= isset($_COOKIE['username']) ? $_COOKIE['username'] : '' ?>"
                   required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" 
                   name="password" 
                   class="form-control"
                   required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="remember" class="form-check-input">
            <label class="form-check-label">Ingat saya</label>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>

    </form>

</div>

</body>
</html>*/


session_start();
include 'koneksi.php';

/* Jika sudah login */
if(isset($_SESSION['id'])){
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Sistem Inventaris Laundry</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    </style>
</head>

<body>

<!-- NOTIFIKASI LOGIN GAGAL -->
<?php if(isset($_GET['error'])){ ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Login Gagal',
    text: 'Username atau password salah',
    confirmButtonColor: '#d33'
});
</script>
<?php } ?>

<!-- NOTIFIKASI LOGOUT -->
<?php if(isset($_GET['logout'])){ ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Logout Berhasil',
    text: 'Anda telah keluar dari sistem',
    timer: 1500,
    showConfirmButton: false,
    timerProgressBar: true
});
</script>
<?php } ?>

<div class="card login-card p-4">

    <h4 class="text-center mb-3 text-primary">Login Sistem</h4>

    <form method="POST" action="proses_login.php">

        <div class="mb-3">
            <label>Username</label>
            <input type="text" 
                   name="username" 
                   class="form-control"
                   value="<?= isset($_COOKIE['username']) ? $_COOKIE['username'] : '' ?>"
                   required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" 
                   name="password" 
                   class="form-control"
                   required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="remember" class="form-check-input">
            <label class="form-check-label">Ingat saya</label>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>

    </form>

</div>

</body>
</html>