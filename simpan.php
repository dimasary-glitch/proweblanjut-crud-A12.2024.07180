<?php
/*include 'koneksi.php';

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
}*/

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

$nama    = htmlspecialchars($_POST['nama_barang']);
$jumlah  = $_POST['jumlah'];
$kondisi = htmlspecialchars($_POST['kondisi']);
$tanggal = $_POST['tanggal_input'];

if(!preg_match("/^[a-zA-Z\s]+$/", $nama)){
    die("Nama barang hanya boleh huruf");
}


$path = NULL;


if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){

    $namaFile = $_FILES['foto']['name'];
    $tmp      = $_FILES['foto']['tmp_name'];

    $allowed = ['jpg','jpeg','png'];
    $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if(!in_array($ext, $allowed)){
        die("Format file tidak didukung");
    }

    $folder = "inventaris/";

    
    if(!is_dir($folder)){
        die("Folder inventaris tidak ditemukan!");
    }

    $namaBaru = time() . "_" . $namaFile;
    $path = $folder . $namaBaru;

    if(!move_uploaded_file($tmp, $path)){
        die("Upload gagal, cek permission folder!");
    }
}


$stmt = $conn->prepare("INSERT INTO inventaris 
(nama_barang, jumlah, kondisi, tanggal_input, foto) 
VALUES (?, ?, ?, ?, ?)");

if(!$stmt->execute([$nama, $jumlah, $kondisi, $tanggal, $path])){
    die("Gagal simpan ke database");
}


header("Location: index.php?success=1");
exit;
?>