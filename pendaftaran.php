<?php
include 'koneksi.php';

$norm = $_POST["norm"];
$nama_pas = $_POST["nama_pas"];
$nik = $_POST["nik"];
$pembiayaan = $_POST["pembiayaan"];
$no_jkn = $_POST["no_jkn"];
$gol_darah = $_POST["gol_darah"];
$ttl = $_POST["ttl"];
$alamat = $_POST["alamat"];
$telepon = $_POST["telepon"];

$cek_data = mysqli_query($conn, "SELECT * FROM daftar_pasien WHERE norm='$norm'");
$cek = mysqli_num_rows($cek_data);

if($cek > 0) {
    echo "Maaf Data Anda Sudah Tersedia";
} else {
    $input = mysqli_query($conn, "INSERT INTO daftar_pasien (norm, nama_pas, nik, pembiayaan, no_jkn, gol_darah, ttl, alamat, telepon) 
                                  VALUES ('$norm', '$nama_pas', '$nik', '$pembiayaan', '$no_jkn', '$gol_darah', '$ttl', '$alamat', '$telepon')");
    if($input) {
        echo "Data berhasil disimpan";
    } else {
        echo "Gagal menyimpan data";
    }
}
?>
