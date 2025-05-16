<?php
$host = "localhost"; // sesuaikan dengan hostmu
$user = "root";      // sesuaikan dengan username MySQL
$pass = "Aku898989";          // sesuaikan dengan password MySQL
$db   = "bnc_simbada";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
