<?php
/*session_start();
$conn = mysqli_connect("localhost", "root", "", "db_laundry");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}*/

session_start();

$host = "localhost";
$db   = "db_laundry";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

    // set error mode
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>