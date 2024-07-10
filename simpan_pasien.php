<?php
    include "database.php";

    // Ambil data dari form
    $id_pasien = $_POST['id_pasien'];
    $nama_pasien = $_POST['nama_pasien'];
    $alamat_pasien = $_POST['alamat_pasien'];
    $no_hp_pasien = $_POST['no_hp_pasien'];

    // Query untuk memeriksa apakah id_pasien sudah ada
    $check_query = "SELECT * FROM pasien WHERE id_pasien = '$id_pasien'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Jika id_pasien sudah ada, tampilkan pesan popup menggunakan JavaScript
?>
        <script>
            alert("ID pasien sudah ada. Silakan masukkan ID pasien yang lain.");
            window.history.back(); // Kembali ke halaman sebelumnya
        </script>
<?php
    } else {
        // Jika id_pasien belum ada, lakukan insert ke database
        $query = "INSERT INTO pasien (id_pasien, nama_pasien, alamat_pasien, no_hp_pasien) 
                  VALUES ('$id_pasien', '$nama_pasien', '$alamat_pasien', '$no_hp_pasien')";

        // Eksekusi query
        if (mysqli_query($conn, $query)) {
            // Jika berhasil disimpan, redirect ke halaman data_pasien.php
            header("location:data_pasien.php");
        } else {
            // Jika gagal, tampilkan pesan error
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?>
