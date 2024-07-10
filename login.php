<?php 
session_start();
include 'koneksi.php';

$username = $_POST['user'];
$pass = $_POST['pass'];

// Mengamankan input pengguna
$username = mysqli_real_escape_string($koneksi, $username);
$pass = mysqli_real_escape_string($koneksi, $pass);

// cek user
$result = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'");
if (!$result) {
    die("Query failed: " . mysqli_error($koneksi));
}

$row = mysqli_fetch_assoc($result);

if ($row) {
    $user = $row['username'];
    $ps = $row['password'];
    if (password_verify($pass, $ps)) {
        $_SESSION['id'] = $row['id_admin']; // Menyimpan ID admin dalam session
        $_SESSION["admin"] = true;
        header('Location: beranda.php');
        exit();
    } else {
        echo "
        <script>
        alert('USERNAME/PASSWORD SALAH');
        window.location = 'index.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
    alert('USERNAME/PASSWORD SALAH');
    window.location = 'index.php';
    </script>
    ";
}

// Menutup koneksi
$koneksi->close();
?>
