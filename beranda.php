<?php
include "database.php";
$data = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM periksa"));
$data1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pasien"));
$data2 =mysqli_num_rows(mysqli_query($conn, "SELECT * FROM dokter"));
?>

<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poliklinik</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="container-fluid">
                <a class="navbar-brand" >Poliklinik</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Data Master
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="data_dokter.php">Dokter</a></li>
                                <li><a class="dropdown-item" href="data_pasien.php">Pasien</a></li>
                                <li><a class="dropdown-item" href="data_periksa.php">Jadwal Periksa</a></li>
                                <li><a class="dropdown-item" href="Penyakit.php">Penyakit</a></li>
                                <li><a class="dropdown-item" href="data_obat.php">Obat</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!--Akhir NavBar-->
    <!--Content-->

    <div class="container">
        <!--header-->
        <div class="row">
            <div class="col-lg-12 mt-2">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Selamat Datang Di Poliklinik Udinus</h1>
                        <p class="lead">Semoga lekas sembuh dan lancar dalam segala hal</p>
                    </div>
                </div>
            </div>
            <!--Content 1-->
            <div class="row">
                <div class="col mt-2">
                    <div class="card">
                        <div class="card-body">
                            <img src="assets/img/kalender.jpg" class="card-img-top" alt="...">
                            <h5 class="card-title">Jadwal periksa</h5>
                            <p class="card-text">silahkan klik disini jika ingin periksa</p>
                            <p> <?php echo $data ?> </p></br>
                            <a href="data_periksa.php" class="btn btn-primary">Data Pemeriksaan</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-2">
                    <div class="card">
                        <div class="card-body">
                            <img src="assets/img/pasien.jpg" class="card-img-top" alt="...">
                            <h5 class="card-title">Pasien</h5>
                            <p class="card-text">jikalau belum sempat untuk daftar silahkan disini</p>
                            <p> <?php echo $data1 ?> </p>
                            <a href="data_pasien.php" class="btn btn-primary">Data Pasien</a>
                        </div>
                    </div>
                </div>
                <div class="col mt-2">
                    <div class="card">
                        <div class="card-body">
                            <img src="assets/img/dokter.jpg" class="card-img-top" alt="...">
                            <h5 class="card-title">Dokter</h5>
                            <p class="card-text">Silahkan pilih dokter di jam yang kamu mau</p>
                            <p> <?php echo $data2 ?> </p></br>
                            <a href="data_dokter.php" class="btn btn-primary">Data dokter</a>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
        <!--content 2-->
    </div>

    <!--akhirContent-->
    <!--Footer-->
    <footer class="mt-2 bg-dark p-3 text-center" style="color:white">
        <p> Poliklinik Udinus &copy; 2024</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>