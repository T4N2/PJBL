<?php
include 'koneksi.php';

// Pastikan semua input tersedia sebelum mengaksesnya untuk menghindari kesalahan
if (
    isset($_POST["norm"]) && isset($_POST["nama_pas"]) && isset($_POST["nik"]) &&
    isset($_POST["pembiayaan"]) && isset($_POST["no_jkn"]) && isset($_POST["gol_darah"]) &&
    isset($_POST["ttl"]) && isset($_POST["alamat"]) && isset($_POST["telepon"])
) {
    $norm = $_POST["norm"];
    $nama_pas = $_POST["nama_pas"];
    $nik = $_POST["nik"];
    $pembiayaan = $_POST["pembiayaan"];
    $no_jkn = $_POST["no_jkn"];
    $gol_darah = $_POST["gol_darah"];
    $ttl = $_POST["ttl"];
    $alamat = $_POST["alamat"];
    $telepon = $_POST["telepon"];

    // Periksa apakah data dengan NORM tersebut sudah ada sebelumnya
    $cek_data = mysqli_query($conn, "SELECT * FROM daftar_pasien WHERE norm='$norm'");
    $cek = mysqli_num_rows($cek_data);

    if ($cek > 0) {
        // Lakukan pembaruan data yang sesuai
        $update = mysqli_query($conn, "
            UPDATE daftar_pasien SET 
                nama_pas='$nama_pas', 
                nik='$nik', 
                pembiayaan='$pembiayaan', 
                no_jkn='$no_jkn', 
                gol_darah='$gol_darah', 
                ttl='$ttl', 
                alamat='$alamat', 
                telepon='$telepon' 
            WHERE norm='$norm'
        ");
        
        if ($update) {
            echo "Data berhasil diperbarui";
        } else {
            echo "Terjadi kesalahan saat memperbarui data";
        }
    } else {
        echo "Maaf, data tidak ditemukan untuk diperbarui";
    }
} else {
    echo "Data tidak lengkap. Harap lengkapi semua informasi.";
}
?>
