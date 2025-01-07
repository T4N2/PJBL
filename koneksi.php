<?php
$hostname = "localhost"; // Ganti dengan alamat server MySQL Anda
$username = "root";  // Ganti dengan nama pengguna MySQL Anda
$password = "";  // Ganti dengan kata sandi MySQL Anda
$database = "bidan_suci";    // Ganti dengan nama database MySQL Anda

$conn = new mysqli($hostname, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
?>