<?php
include 'koneksi.php';

if(!isset($_SESSION['id'])){
    header("location:login.php");
}

session_start();
session_destroy();

echo "<script>
alert('Anda berhasil logout');
window.location='login.php';
</script>";
?>