<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_barang'];
$jumlah = $_POST['jumlah'];
$kondisi = $_POST['kondisi'];

$stmt = $conn->prepare("UPDATE inventaris 
SET nama_barang=?, jumlah=?, kondisi=? 
WHERE id=?");

$stmt->execute([$nama, $jumlah, $kondisi, $id]);

header("location:index.php");
?>