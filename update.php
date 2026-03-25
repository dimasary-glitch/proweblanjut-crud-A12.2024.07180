<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_barang'];
$jumlah = $_POST['jumlah'];
$kondisi = $_POST['kondisi'];
$tanggal = $_POST['tanggal_input'];

if(!preg_match("/^[a-zA-Z\s]+$/", $nama)){
    echo "<script>
    alert('Nama barang hanya boleh huruf');
    window.history.back();
    </script>";
    exit;
}

$stmt = $conn->prepare("
UPDATE inventaris 
SET 
    nama_barang = ?, 
    jumlah = ?, 
    kondisi = ?, 
    tanggal_input = ?
WHERE id = ?
");

$stmt->execute([$nama,$jumlah,$kondisi,$tanggal,$id]);

header("Location: index.php");
exit;
?>