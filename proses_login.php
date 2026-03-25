<?php
/*include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$data = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($data);

if($cek > 0){
    $user = mysqli_fetch_assoc($data);
    $_SESSION['id'] = $user['id'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['role'] = $user['role'];

    header("location:index.php");
}else{
    echo "<script>alert('Login gagal!'); window.location='login.php';</script>";
}*/

/*include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->execute([$username, $password]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['role'] = $user['role'];

    header("location:index.php");
}else{
    echo "<script>alert('Login gagal, coba lagi'); window.location='login.php';</script>";
}
?>

session_start();
include 'koneksi.php';

$username = trim($_POST['username']);
$password = md5($_POST['password']); // jika masih pakai md5

if(empty($username) || empty($_POST['password'])){
    echo "<script>
            alert('Username dan password wajib diisi');
            window.location='login.php';
          </script>";
    exit;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->execute([$username, $password]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if($user){

    $_SESSION['id']   = $user['id'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['role'] = $user['role'];

    header("Location: index.php");
    exit;

}else{

    echo "<script>
            alert('Login gagal, username atau password salah');
            window.location='login.php';
          </script>";
    exit;
}
?>*/

session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->execute([$username, $password]);

echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script>
Swal.fire({
    icon: 'success',
    title: 'Login Berhasil',
    showConfirmButton: false,
    timer: 1500
}).then(() => {
    window.location='index.php';
});
</script>";

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if($user){

    
    $_SESSION['id']   = $user['id'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['role'] = $user['role'];

    
    if(isset($_POST['remember'])){
        setcookie("username", $username, time() + (86400 * 7), "/"); // 7 hari
    }else{
        setcookie("username", "", time() - 3600, "/");
    }

    header("Location: index.php");
    exit;

}else{

    header("Location: login.php?error=1");
    exit;
}
?>