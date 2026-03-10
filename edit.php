<?php
include 'koneksi.php';
/*$id = $_GET['id'];
$data = mysqli_query($conn,"SELECT * FROM inventaris WHERE id='$id'");
$d = mysqli_fetch_array($data);*/
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
</head>
<body>

<h2>Edit Barang</h2>

<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?= $d['id']; ?>">

    <label>Nama Barang</label>
    <input type="text" name="nama_barang" value="<?= $d['nama_barang']; ?>" required>

    <label>Jumlah</label>
    <input type="number" name="jumlah" value="<?= $d['jumlah']; ?>" required>

    <label>Kondisi</label>
    <select name="kondisi">
        <option <?= $d['kondisi']=="Baik"?"selected":""; ?>>Baik</option>
        <option <?= $d['kondisi']=="Rusak Ringan"?"selected":""; ?>>Rusak Ringan</option>
        <option <?= $d['kondisi']=="Rusak Berat"?"selected":""; ?>>Rusak Berat</option>
    </select>

    <button type="submit">Update</button>
</form>

</body>
</html>