<?php
    include "database.php";

    // Tangkap parameter id dari URL
    $id = $_GET['id'];

    // Lakukan query DELETE untuk menghapus data dokter
    $query = "DELETE FROM periksa WHERE id_periksa='$id'";
    $hapus_data = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dijalankan
    if($hapus_data) {
        // Redirect kembali ke halaman data_dokter.php jika berhasil
        header("location: data_periksa.php");
    } else {
        // Tampilkan pesan jika terjadi kesalahan
        echo "Gagal menghapus data.";
    }
?>
