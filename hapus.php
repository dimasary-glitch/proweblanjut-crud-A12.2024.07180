<?php
include 'koneksi.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM inventaris WHERE id = ?");
$stmt->execute([$id]);

echo "<script>
        alert('Data berhasil dihapus');
        window.location='index.php';
      </script>";
?>