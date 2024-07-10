<?php 
    include  "database.php";

// Proses menyimpan data periksa jika form disubmit
    
    $id_pasien = $_POST['id_pasien'];
    $id_dokter = $_POST['id_dokter'];
    $tgl_periksa = $_POST['tgl_periksa'];
    $id_penyakit = $_POST['id_obat'];
    $id_obat = $_POST['id_obat'];
    $id_harga = $_POST['id_obat'];

    // Lakukan validasi atau simpan data ke database sesuai kebutuhan
    $query = "INSERT INTO periksa (id_pasien, id_dokter, tgl_periksa, id_penyakit, id_obat, id_harga) 
              VALUES ('$id_pasien', '$id_dokter', '$tgl_periksa', '$id_penyakit', '$id_obat', '$id_harga')";
    if (mysqli_query($conn, $query)) {
        header('Location: data_periksa.php');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

