<?php
include 'koneksi.php';

$id       = $_POST['id'];
$nama     = $_POST['nama_barang'];
$jumlah   = $_POST['jumlah'];
$kondisi  = $_POST['kondisi'];
$tanggal  = $_POST['tanggal_input'];


if(!preg_match("/^[a-zA-Z\s]+$/", $nama)){
    echo "<script>
    alert('Nama barang hanya boleh huruf');
    window.history.back();
    </script>";
    exit;
}


$stmt = $conn->prepare("SELECT foto FROM inventaris WHERE id=?");
$stmt->execute([$id]);
$dataLama = $stmt->fetch(PDO::FETCH_ASSOC);

$fotoLama = $dataLama['foto'];
$path = $fotoLama;


if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){

    $namaFile = $_FILES['foto']['name'];
    $tmp      = $_FILES['foto']['tmp_name'];

    $allowed = ['jpg','jpeg','png'];
    $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    
    if(!in_array($ext, $allowed)){
        die("Format file tidak didukung");
    }

    
    $folder = "inventaris/";

    
    $namaBaru = time() . "_" . $namaFile;
    $path = $folder . $namaBaru;

    
    if(move_uploaded_file($tmp, $path)){

        
        if(!empty($fotoLama) && file_exists($fotoLama)){
            unlink($fotoLama);
        }

    } else {
        die("Upload gagal");
    }
}

$stmt = $conn->prepare("
UPDATE inventaris 
SET 
    nama_barang = ?, 
    jumlah = ?, 
    kondisi = ?, 
    tanggal_input = ?, 
    foto = ?
WHERE id = ?
");

$stmt->execute([$nama,$jumlah,$kondisi,$tanggal,$path,$id]);

header("Location: index.php?update=1");
exit;
?>