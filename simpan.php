<?php
/*include 'koneksi.php';

$nama = $_POST['nama_barang'];
$jumlah = $_POST['jumlah'];
$kondisi = $_POST['kondisi'];

mysqli_query($conn,"INSERT INTO inventaris VALUES('', '$nama', '$jumlah', '$kondisi')");

header("location:index.php");*/

include 'koneksi.php';

$nama = $_POST['nama_barang'];
$jumlah = $_POST['jumlah'];
$kondisi = $_POST['kondisi'];

$sql = "INSERT INTO inventaris (nama_barang, jumlah, kondisi) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->execute([$nama, $jumlah, $kondisi]);

header("Location: index.php");
exit;
?>