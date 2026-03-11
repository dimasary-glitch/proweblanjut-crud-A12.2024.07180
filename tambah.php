<!DOCTYPE html>
<html>
<head>
    <title>Tambah Inventaris</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Tambah Barang</h2>

<form name="formBarang" method="POST" action="simpan.php" onsubmit="return validasiForm()">

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

<label>Tanggal Input</label>
<input type="date" name="tanggal_input" required>
<button type="submit">Simpan</button>

<script>
function validasiForm() {

    var nama = document.forms["formBarang"]["nama_barang"].value;

    var huruf = /^[A-Za-z\s]+$/;

    if(!nama.match(huruf)){
        alert("Nama barang hanya boleh berisi huruf.");
        return false;
    }

}
</script>   
</form>

</body>
</html>