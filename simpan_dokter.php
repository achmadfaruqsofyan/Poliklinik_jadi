<?php
    include "database.php";

    // Ambil data dari form
    $id_dokter = $_POST['id_dokter'];
    $nama_dokter = $_POST['nama_dokter'];
    $alamat_dokter = $_POST['alamat_dokter'];
    $no_hp_dokter = $_POST['no_hp_dokter'];

    // Query untuk memeriksa apakah id_dokter sudah ada
    $check_query = "SELECT * FROM dokter WHERE id_dokter = '$id_dokter'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Jika id_dokter sudah ada, tampilkan pesan popup menggunakan JavaScript
?>
        <script>
            alert("ID Dokter sudah ada. Silakan masukkan ID Dokter yang lain.");
            window.history.back(); // Kembali ke halaman sebelumnya
        </script>
<?php
    } else {
        // Jika id_dokter belum ada, lakukan insert ke database
        $query = "INSERT INTO dokter (id_dokter, nama_dokter, alamat_dokter, no_hp_dokter) 
                  VALUES ('$id_dokter', '$nama_dokter', '$alamat_dokter', '$no_hp_dokter')";

        // Eksekusi query
        if (mysqli_query($conn, $query)) {
            // Jika berhasil disimpan, redirect ke halaman data_dokter.php
            header("location:data_dokter.php");
        } else {
            // Jika gagal, tampilkan pesan error
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?>
