<?php
    include "database.php";

    // Tangkap parameter id dari URL
    $id = $_GET['id'];

    // Lakukan query DELETE untuk menghapus data pasien
    $query = "DELETE FROM pasien WHERE id_pasien='$id'";
    $hapus_data = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dijalankan
    if($hapus_data) {
        // Redirect kembali ke halaman data_pasien.php jika berhasil
        header("location: data_pasien.php");
    } else {
        // Tampilkan pesan jika terjadi kesalahan
        echo "Gagal menghapus data.";
    }
?>
