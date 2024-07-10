<?php
include "database.php";
include "header.php";

if (isset($_GET['id'])) {
    $id_periksa = $_GET['id'];
    $query = mysqli_query($conn, "SELECT p.*, ps.nama_pasien, d.nama_dokter, o.id_penyakit, o.nama_obat, o.harga
        FROM periksa p
        INNER JOIN pasien ps ON p.id_pasien = ps.id_pasien
        INNER JOIN dokter d ON p.id_dokter = d.id_dokter
        INNER JOIN obat o ON p.id_obat = o.id_obat
        WHERE id_periksa = $id_periksa
    ");
   
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $tgl_periksa_format = date("d-m-Y", strtotime($data['tgl_periksa']));
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>NOTA</title>
                <style>
                    table {
                        border-collapse: collapse;
                        width: 80%;
                    }
                    th, td {
                        text-align: left;
                        padding: 8px 12px 8px 12px; 
                        border: 1px solid #dddddd;
                    }

                    th {
                        background-color: #f2f2f2;
                    }
                    tr:nth-child(even) {
                        background-color: #f2f2f2;
                    }
                    
                    @media print {
                        .noprint {
                            display: none;
                        }
                        table {
                            background-color: #ffffff;
                        }
                        th, td {
                            color: #000000;
                        }
                        img {
                            filter: none;
                        }
        
                    }
                </style>
            </head>
        <body>
            <div class="container parentprintarea">
                <h2 class="text-center">NOTA</h2>
                <table class="table table-bordered printarea">
                    <tr>
                        <th>Nama Pasien</th>
                        <td><?php echo $data['nama_pasien']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Dokter</th>
                        <td><?php echo $data['nama_dokter']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Obat</th>
                        <td><?php echo $data['nama_obat']; ?></td>
                    </tr>
                    <tr>
                        <th> Tanggal </th>
                        <td><?php echo $tgl_periksa_format ;?></td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td><?php echo $data['harga']; ?></td>
                </tr>
                </table>
                <br>
                <button onclick="printAndRedirect()" class="btn btn-primary noprint">Cetak</button>
            </div>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script>
                function printAndRedirect() {
                    window.print();
                    setTimeout(function() {
                        window.location.href = 'data_periksa.php';
                    }, 1000);
                }
            </script>
        </body>
        </html>
        <?php
    } else {
        echo "Data peminjaman tidak ditemukan.";
    }
} else {
    echo "ID peminjaman tidak diberikan.";
}
?>
