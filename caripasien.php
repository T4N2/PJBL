<?php
include "koneksi.php";
$norm = $_POST['norm']; // Ambil parameter norm dari POST

// Log untuk memverifikasi input
file_put_contents('debug.txt', "Norm: $norm\n", FILE_APPEND);

$data = mysqli_query($conn, "SELECT * FROM daftar_pasien WHERE norm='$norm'");

if (!$data) {
    echo json_encode(['status' => 'error', 'message' => 'Query error: ' . mysqli_error($conn)]);
    exit;
}

$result = mysqli_fetch_assoc($data);

if ($result) {
    echo json_encode([
        'status' => 'success',
        'nama_pas' => $result['nama_pas'], // Ambil nama_pas langsung
        'nik' => $result['nik'], // Ambil nama_pas langsung
        'pembiayaan' => $result['pembiayaan'], // Ambil nama_pas langsung
        'no_jkn' => $result['no_jkn'], // Ambil nama_pas langsung
        'gol_darah' => $result['gol_darah'], // Ambil nama_pas langsung
        'ttl' => $result['ttl'], // Ambil nama_pas langsung
        'alamat' => $result['alamat'], // Ambil nama_pas langsung
        'telepon' => $result['telepon'], // Ambil nama_pas langsung
        'data' => $result
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Data tidak ditemukan'
    ]);
}
?>
