<!DOCTYPE html>
<html>
<head>
    <title>Tambah Inventaris</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Tambah Barang</h2>

<form method="POST" action="simpan.php">

<label>Nama Barang</label>
<input type="text" name="nama_barang">

<label>Jumlah</label>
<input type="number" name="jumlah">

<label>Kondisi</label>
<select name="kondisi">
<option>Baik</option>
<option>Rusak Ringan</option>
<option>Rusak Berat</option>
</select>

<button type="submit">Simpan</button>

</form>

</body>
</html>