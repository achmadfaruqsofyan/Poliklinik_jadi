<?php
    include "database.php";

    // Tangkap parameter id dari URL
    $id = $_GET['id'];

    // Lakukan query DELETE untuk menghapus data obat
    $query = "DELETE FROM obat WHERE id_obat='$id'";
    $hapus_data = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dijalankan
    if($hapus_data) {
        // Redirect kembali ke halaman data_obat.php jika berhasil
        header("location: data_obat.php");
    } else {
        // Tampilkan pesan jika terjadi kesalahan
        echo "Gagal menghapus data.";
    }
?>
