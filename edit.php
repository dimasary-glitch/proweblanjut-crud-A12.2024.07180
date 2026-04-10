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
class="form-control"
value="<?= $d['tanggal_input']; ?>" 
required>

<button type="submit">Update</button>

</form>

</body>
</html>*/

session_start();
include 'koneksi.php';

if(!isset($_GET['id'])){
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];


$stmt = $conn->prepare("SELECT * FROM inventaris WHERE id = ?");
$stmt->execute([$id]);
$d = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$d){
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Barang</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">


<script>
function validasiEdit(){
    var nama = document.getElementById("nama_barang").value;
    var huruf = /^[A-Za-z\s]+$/;

    if(!nama.match(huruf)){
        alert("Nama barang hanya boleh huruf.");
        return false;
    }
    return true;
}
</script>

</head>

<body class="container mt-4">

<h3>Edit Barang</h3>

<form method="POST" action="proses_update.php" enctype="multipart/form-data" onsubmit="return validasiEdit();">

<input type="hidden" name="id" value="<?= $d['id']; ?>">

<div class="mb-3">
<label>Nama Barang</label>
<input type="text"
       name="nama_barang"
       id="nama_barang"
       class="form-control"
       value="<?= htmlspecialchars($d['nama_barang']); ?>"
       required>
</div>

<div class="mb-3">
<label>Jumlah</label>
<input type="number"
       name="jumlah"
       class="form-control"
       value="<?= $d['jumlah']; ?>"
       min="1"
       required>
</div>

<div class="mb-3">
<label>Kondisi</label>
<select name="kondisi" class="form-control">

<option value="Baik" <?= $d['kondisi']=="Baik"?"selected":""; ?>>Baik</option>
<option value="Rusak Ringan" <?= $d['kondisi']=="Rusak Ringan"?"selected":""; ?>>Rusak Ringan</option>
<option value="Rusak Berat" <?= $d['kondisi']=="Rusak Berat"?"selected":""; ?>>Rusak Berat</option>

</select>
</div>

<div class="mb-3">
<label>Tanggal Input</label>
<input type="date" 
name="tanggal_input" 
class="form-control"
value="<?= !empty($d['tanggal_input']) ? date('Y-m-d', strtotime($d['tanggal_input'])) : '' ?>" 
required>
</div>

<div class="mb-3">
<label>Foto Lama</label><br>
<?php if(!empty($d['foto'])){ ?>
    <img src="<?= $d['foto']; ?>" width="100" class="img-thumbnail mb-2">
<?php } else { ?>
    Tidak ada
<?php } ?>
</div>

<div class="mb-3">
<label>Ganti Foto</label>
<input type="file" name="foto" class="form-control">
</div>

<button type="submit" class="btn btn-primary">Update</button>
<a href="index.php" class="btn btn-secondary">Kembali</a>

</form>

</body>
</html>