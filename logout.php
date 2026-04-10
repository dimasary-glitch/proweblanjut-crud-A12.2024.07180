<?php
/*session_start();
session_destroy();

header("Location: login.php");
exit;

echo "<script>
alert('Anda berhasil logout');
window.location='login.php';
</script>";
?>


session_start();
session_destroy();

setcookie("username", "", time() - 3600, "/");

header("Location: login.php?logout=1");
exit;
?>*/


session_start();
session_destroy();

setcookie("username", "", time() - 3600, "/");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<script>
Swal.fire({
    title: 'Berhasil Logout',
    text: 'Anda telah keluar dari sistem',
    icon: 'success',
    showConfirmButton: false,
    timer: 2000,
    background: '#ffffff',
    color: '#333',
    backdrop: `
        rgba(0,0,0,0.4)
    `
}).then(() => {
    window.location.href = "login.php";
});
</script>

</body>
</html>