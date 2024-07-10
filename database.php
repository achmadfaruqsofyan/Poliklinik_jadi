<?php 
    $conn = mysqli_connect('localhost','root','','poliklinik1') or die ('Selamat anda Gagal Terhubung');
    
    $obat_result = mysqli_query($conn, "SELECT * FROM obat");
    $obat_data = [];
    while ($data_obat = mysqli_fetch_assoc($obat_result)) {
        $obat_data[] = $data_obat;
    }