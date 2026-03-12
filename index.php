<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id'])){
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Inventaris Laundry</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container">

<span class="navbar-brand">Sistem Inventaris Laundry</span>

<div class="d-flex">

<span class="text-white me-3">
Selamat Datang, <?= $_SESSION['nama']; ?> (<?= $_SESSION['role']; ?>)
</span>

<a href="logout.php"
class="btn btn-danger btn-sm"
onclick="return confirm('Apakah Anda yakin ingin logout?');">
Logout
</a>

</div>

</div>
</nav>

<div class="container mt-4">


<div class="card shadow mb-4">

<div class="card-body">

<h4 class="card-title">Data Inventaris Laundry</h4>

<a href="tambah.php" class="btn btn-success mb-3">
+ Tambah Barang
</a>

<div class="table-responsive">

<table class="table table-bordered table-striped table-hover">

<thead class="table-primary">

<tr>
<th>No</th>
<th>Nama Barang</th>
<th>Jumlah</th>
<th>Kondisi</th>
<th>Tanggal Input</th>
<th>Aksi</th>
</tr>

</thead>

<tbody>

<?php
$no = 1;

$stmt = $conn->prepare("SELECT * FROM inventaris");
$stmt->execute();

while($d = $stmt->fetch(PDO::FETCH_ASSOC)){
?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['nama_barang']; ?></td>

<td><?= $d['jumlah']; ?></td>

<td><?= $d['kondisi']; ?></td>

<td>
<?= !empty($d['tanggal_input']) 
? date('d-m-Y', strtotime($d['tanggal_input'])) 
: '-'; ?>
</td>

<td>

<a href="edit.php?id=<?= $d['id']; ?>" 
class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus.php?id=<?= $d['id']; ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
Hapus
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>