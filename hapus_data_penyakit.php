<?php
    include "database.php";

    // Tangkap parameter id dari URL
    $id = $_GET['id'];

    // Lakukan query DELETE untuk menghapus data penyakit
    $query = "DELETE FROM penyakit WHERE id_penyakit='$id'";
    $hapus_data = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dijalankan
    if($hapus_data) {
        // Redirect kembali ke halaman data_penyakit.php jika berhasil
        header("location: penyakit.php");
    } else {
        // Tampilkan pesan jika terjadi kesalahan
        echo "Gagal menghapus data.";
    }
?>
