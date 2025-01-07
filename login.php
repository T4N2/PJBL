<?php
include "koneksi.php"; // Pastikan file ini berisi koneksi database yang aman

// Ambil data dari form
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Query menggunakan prepared statements
$stmt = $conn->prepare("SELECT * FROM tb_user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Periksa hasil query
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verifikasi password jika menggunakan hash
    if (password_verify($password, $user['password'])) {
        echo "Selamat Anda Berhasil Memasukki Aplikasi";
    } else {
        echo "Maaf, password Anda salah.";
    }
} else {
    echo "Maaf, akun Anda tidak tersedia.";
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
