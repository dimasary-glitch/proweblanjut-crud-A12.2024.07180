<?php
include 'koneksi.php';

$nama = htmlspecialchars($_POST['nama_barang']);
$jumlah = $_POST['jumlah'];
$kondisi = htmlspecialchars($_POST['kondisi']);
$tanggal = $_POST['tanggal_input'];

$sql = "INSERT INTO inventaris 
        (nama_barang, jumlah, kondisi, tanggal_input) 
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->execute([$nama, $jumlah, $kondisi, $tanggal]);

header("location:index.php");
if(!preg_match("/^[a-zA-Z\s]+$/", $nama)){
    echo "Nama barang hanya boleh huruf.";
    exit;
}
?>