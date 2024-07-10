<?php
include "database.php";

// Mengambil id_penyakit dari request GET
$id_penyakit = $_GET['id_penyakit'];

// Query untuk mendapatkan data obat dan harga berdasarkan id_penyakit
$query = "SELECT id_obat, nama_obat, harga FROM obat WHERE id_penyakit = '$id_penyakit'";
$result = mysqli_query($conn, $query);

// Mengembalikan data dalam format JSON
if ($row = mysqli_fetch_assoc($result)) {
    echo json_encode($row);
} else {
    echo json_encode(['id_obat' => '', 'nama_obat' => 'Pilih Penyakit Terlebih Dahulu', 'harga' => '']);
}

mysqli_close($conn);
?>
