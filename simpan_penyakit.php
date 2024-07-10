<?php
    include "database.php";

    // Ambil data dari form
    $id_penyakit = $_POST['id_penyakit'];
    $nama_penyakit = $_POST['nama_penyakit'];

    // Query untuk memeriksa apakah id_penyakit sudah ada
    $check_query = "SELECT * FROM penyakit WHERE id_penyakit = '$id_penyakit'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Jika id_penyakit sudah ada, tampilkan pesan popup menggunakan JavaScript
?>
        <script>
            alert("ID penyakit sudah ada. Silakan masukkan ID penyakit yang lain.");
            window.history.back(); // Kembali ke halaman sebelumnya
        </script>
<?php
    } else {
        // Jika id_penyakit belum ada, lakukan insert ke database
        $query = "INSERT INTO penyakit (id_penyakit, nama_penyakit) 
                  VALUES ('$id_penyakit', '$nama_penyakit')";

        // Eksekusi query
        if (mysqli_query($conn, $query)) {
            // Jika berhasil disimpan, redirect ke halaman data_penyakit.php
            header("location:penyakit.php");
        } else {
            // Jika gagal, tampilkan pesan error
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?>
