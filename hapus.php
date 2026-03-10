<?php
/*include 'koneksi.php';

$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM inventaris WHERE id='$id'");

header("location:index.php");*/

include 'koneksi.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM inventaris WHERE id=?");
$stmt->execute([$id]);

header("location:index.php");
?>