<!DOCTYPE html>
<html>
<head>
    <title>Tambah Inventaris</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Tambah Barang</h2>

<form method="POST" action="simpan.php" enctype="multipart/form-data">
<form name="formBarang" method="POST" action="simpan.php" onsubmit="return validasiForm()">

<label>Nama Barang</label>
<input type="text" name="nama_barang">

<label>Jumlah</label>
<input type="number" name="jumlah" required>

<label>Kondisi</label>
<select name="kondisi">
    <option>Baik</option>
    <option>Rusak Ringan</option>
    <option>Rusak Berat</option>
</select>

<label>Tanggal</label>
<input type="date" name="tanggal_input" required>

<label>Foto</label>
<input type="file" name="foto" accept="image/*">

<button type="submit">Simpan</button>

</form>

<script>
function validasiForm() {

    var nama = document.forms["formBarang"]["nama_barang"].value;

    var huruf = /^[A-Za-z\s]+$/;

    if(!nama.match(huruf)){
        alert("Nama barang hanya boleh berisi huruf.");
        return false;
    }

    <?php if(isset($_GET['error'])){ ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
    icon: 'error',
    title: 'Gagal',
    text: 'Format file harus JPG/PNG'
});
</script>
<?php } ?>
}
</script>   
</form>

</body>
</html>