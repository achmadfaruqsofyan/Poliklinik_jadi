<?php
session_start();
include "header.php";
include 'koneksi.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
} else {
    // Log session ID for debugging
    error_log("User ID in session: " . $_SESSION['id']);
}

// Mengambil data pengguna dari database
$stmt = $koneksi->prepare('SELECT username, password, nama_lengkap FROM admin WHERE id_admin = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($username, $password, $nama_lengkap);
$stmt->fetch();
$stmt->close();

// Log fetched data for debugging
error_log("Fetched username: " . $username);
error_log("Fetched nama_lengkap: " . $nama_lengkap);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Profile Admin</h3>
                </div>
                <div class="card-body">
                    <h2 class="text-center mb-4">Profile Page</h2>
                    <p class="text-center">Your account details are below:</p>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th>Username</th>
                                    <td><?= htmlspecialchars($username) ?></td>
                                </tr>
                                <tr>
                                    <th>Password</th>
                                    <td>****</td>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td><?= htmlspecialchars($nama_lengkap) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>

<style>
.container {
    margin-top: 50px;
}

.card {
    border: none;
    border-radius: 10px;
    overflow: hidden;
}

.card-header {
    font-size: 1.25rem;
    font-weight: bold;
}

.card-body {
    padding: 30px;
    background-color: #f9f9f9;
}

.table {
    margin: 0 auto;
    width: 100%;
    max-width: 600px;
    border-collapse: separate;
    border-spacing: 0;
    background-color: #fff;
}

.table th, .table td {
    padding: 15px;
    text-align: left;
    border: none;
}

.table th {
    background-color: #007bff;
    color: white;
}

.table td {
    background-color: #f1f1f1;
}

.table-hover tbody tr:hover {
    background-color: #e9ecef;
}

.text-center {
    text-align: center;
}

.mt-4 {
    margin-top: 1.5rem;
}

.btn-outline-primary {
    margin: 5px;
}
</style>
