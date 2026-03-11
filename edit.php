<?php
/*include 'koneksi.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM inventaris WHERE id = ?");
$stmt->execute([$id]);

$d = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
    <link rel="stylesheet" href="style.css">

<script>
function validasiEdit(){

    var nama = document.getElementById("nama_barang").value;
    var huruf = /^[A-Za-z\s]+$/;

    if(!nama.match(huruf)){
        alert("Nama barang hanya boleh berisi huruf.");
        return false;
    }

}
</script>

</head>

<body>

<h2>Edit Barang</h2>

<form method="POST" action="update.php" onsubmit="return validasiEdit()">

<input type="hidden" name="id" value="<?= $d['id']; ?>">

<label>Nama Barang</label>
<input 
type="text" 
name="nama_barang" 
id="nama_barang"
value="<?= $d['nama_barang']; ?>" 
pattern="[A-Za-z\s]+" 
title="Nama barang hanya boleh huruf"
required>

<label>Jumlah</label>
<input 
type="number" 
name="jumlah" 
value="<?= $d['jumlah']; ?>" 
min="1"
required>

<label>Kondisi</label>
<select name="kondisi">

<option value="Baik" <?= $d['kondisi']=="Baik"?"selected":""; ?>>
Baik
</option>

<option value="Rusak Ringan" <?= $d['kondisi']=="Rusak Ringan"?"selected":""; ?>>
Rusak Ringan
</option>

<option value="Rusak Berat" <?= $d['kondisi']=="Rusak Berat"?"selected":""; ?>>
Rusak Berat
</option>

</select>

<button type="submit">Update</button>

</form>
</body>
</html>*/


include 'koneksi.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM inventaris WHERE id = ?");
$stmt->execute([$id]);

$d = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Barang</title>
<link rel="stylesheet" href="style.css">

<script>
function validasiEdit(){

    var nama = document.getElementById("nama_barang").value;
    var huruf = /^[A-Za-z\s]+$/;

    if(!nama.match(huruf)){
        alert("Nama barang hanya boleh huruf bubub.");
        return false;
    }

    return true;
}
</script>

</head>

<body>

<h2>Edit Barang</h2>

<form method="POST" action="update.php" onsubmit="return validasiEdit();">

<input type="hidden" name="id" value="<?= $d['id']; ?>">

<label>Nama Barang</label>
<input type="text"
       name="nama_barang"
       id="nama_barang"
       value="<?= $d['nama_barang']; ?>"
       required>

<label>Jumlah</label>
<input type="number"
       name="jumlah"
       value="<?= $d['jumlah']; ?>"
       min="1"
       required>

<label>Kondisi</label>
<select name="kondisi">

<option value="Baik" <?= $d['kondisi']=="Baik"?"selected":""; ?>>
Baik
</option>

<option value="Rusak Ringan" <?= $d['kondisi']=="Rusak Ringan"?"selected":""; ?>>
Rusak Ringan
</option>

<option value="Rusak Berat" <?= $d['kondisi']=="Rusak Berat"?"selected":""; ?>>
Rusak Berat
</option>

</select>

<label>Tanggal Input</label>
<input type="date"
       name="tanggal_input"
       value="<?= $d['tanggal_input']; ?>"
       required>

<button type="submit">Update</button>

</form>

</body>
</html>