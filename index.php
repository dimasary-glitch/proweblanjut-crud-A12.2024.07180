<?php
include 'koneksi.php';

if(!isset($_SESSION['id'])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventaris Laundry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h3>Selamat Datang, <?= $_SESSION['nama']; ?> (<?= $_SESSION['role']; ?>)</h3>
<a href="logout.php" class="hapus">Logout</a>

<div class="card">
    <!-- isi tabel dan tombol di sini -->
<h2>Data Inventaris Laundry</h2>
<a href="tambah.php" class="btn">+ Tambah Barang</a>
</div>


<table>
<tr>
    <th>No</th>
    <th>Nama Barang</th>
    <th>Jumlah</th>
    <th>Kondisi</th>
    <th>Tanggal Input</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;
/*$data = mysqli_query($conn, "SELECT * FROM inventaris");
while($d = mysqli_fetch_array($data)){*/
$stmt = $conn->prepare("SELECT * FROM inventaris");
$stmt->execute();

while($d = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['nama_barang']; ?></td>
    <td><?= $d['jumlah']; ?></td>
    <td><?= $d['kondisi']; ?></td>

    <td class="tanggal">
<?php
if($d['tanggal_input'] != NULL){
    echo date('d-m-Y', strtotime($d['tanggal_input']));
}else{
    echo "-";
}
?>
</td>

    <td class="aksi">
        <a href="edit.php?id=<?= $d['id']; ?>" class="edit">Edit</a>
        <a href="hapus.php?id=<?= $d['id']; ?>" class="hapus">Hapus</a>
    </td>
    </a>
    </td>
</tr>
<?php } ?>

</table>
</body>
</html>