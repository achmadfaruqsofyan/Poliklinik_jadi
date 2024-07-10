<?php
include "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_obat = $_POST['id_obat'];
    $nama_obat = $_POST['nama_obat'];
    $id_penyakit = $_POST['id_penyakit'];
    $harga = $_POST['harga'];

    // Handle file upload
    $foto = $_FILES['foto']['name'];
    $temp = $_FILES['foto']['tmp_name'];
    $folder = "assets/img/";

    // Move uploaded file to specified folder
    if (move_uploaded_file($temp, $folder.$foto)) {
        // Query untuk menyimpan data ke database
        $query = "INSERT INTO obat (id_obat, nama_obat, id_penyakit, harga, foto) VALUES ('$id_obat', '$nama_obat', '$id_penyakit', '$harga', '$foto')";
        if (mysqli_query($conn, $query)) {
            header("location: data_obat.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload image.";
    }

    mysqli_close($conn);
}
?>
