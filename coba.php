<?php
include "header.php";
include "database.php";

// Proses menyimpan data periksa jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
}

// Ambil data obat untuk dropdown
$obat_result = mysqli_query($conn, "SELECT * FROM obat");
$obat_data = [];
while ($data_obat = mysqli_fetch_assoc($obat_result)) {
    $obat_data[] = $data_obat;
}
?>

<div class="container mt-5">
    <h2>Data Periksa</h2>
    <form name="periksa" action="data_periksa.php" method="POST">
        <div class="form-group">
            <label for="inputpasien">Pasien</label>
            <select class="form-control" name="id_pasien">
                <?php
                $pasien_result = mysqli_query($conn, "SELECT * FROM pasien");
                while ($data_pasien = mysqli_fetch_array($pasien_result)) {
                    echo '<option value="' . $data_pasien['id_pasien'] . '">' . $data_pasien['nama_pasien'] . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="inputDokter">Dokter</label>
            <select class="form-control" name="id_dokter">
                <?php
                $dokter_result = mysqli_query($conn, "SELECT * FROM dokter");
                while ($data_dokter = mysqli_fetch_array($dokter_result)) {
                    echo '<option value="' . $data_dokter['id_dokter'] . '">' . $data_dokter['nama_dokter'] . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="tgl">Tanggal Periksa</label>
            <input type="date" name="tgl_periksa" id="tgl" value="<?= date('Y-m-d') ?>" class="form-control" required autofocus>
        </div>

        <div class="form-group">
            <label for="inputObat">Obat</label>
            <select class="form-control" name="id_obat" id="inputObat" onchange="updateFields()">
                <option value="">Pilih Obat</option>
                <?php
                foreach ($obat_data as $data_obat) {
                    echo '<option value="' . $data_obat['id_obat'] . '" data-penyakit="' . $data_obat['id_penyakit'] . '" data-harga="' . $data_obat['harga'] . '">' . $data_obat['nama_obat'] . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="inputPenyakit">Penyakit</label>
            <input type="text" class="form-control" name="id_penyakit" id="inputPenyakit" readonly>
        </div>

        <div class="form-group">
            <label for="inputHarga">Harga</label>
            <input type="text" class="form-control" name="id_harga" id="inputHarga" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>

    <h2>Daftar Data Periksa</h2>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Tanggal Periksa</th>
                <th>Nama Penyakit</th>
                <th>Nama Obat</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT p.*, ps.nama_pasien, d.nama_dokter, o.id_penyakit, o.nama_obat, o.harga
                                          FROM periksa p
                                          INNER JOIN pasien ps ON p.id_pasien = ps.id_pasien
                                          INNER JOIN dokter d ON p.id_dokter = d.id_dokter
                                          INNER JOIN obat o ON p.id_obat = o.id_obat");
            $no = 1;
            while ($ambil_data = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $ambil_data['nama_pasien'] ?></td>
                    <td><?php echo $ambil_data['nama_dokter'] ?></td>
                    <td><?php echo $ambil_data['tgl_periksa'] ?></td>
                    <td><?php echo $ambil_data['id_penyakit'] ?></td>
                    <td><?php echo $ambil_data['nama_obat'] ?></td>
                    <td><?php echo $ambil_data['harga'] ?></td>
                    <td>
                        <a href="edit_dokter.php?id=<?php echo $ambil_data['id_dokter']?>" class="btn btn-warning">Edit</a>
                        <a href="hapus_data_dokter.php?id=<?php echo $ambil_data['id_dokter']?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ini ?')">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script>
function updateFields() {
    var obatSelect = document.getElementById('inputObat');
    var selectedOption = obatSelect.options[obatSelect.selectedIndex];
    var penyakitField = document.getElementById('inputPenyakit');
    var hargaField = document.getElementById('inputHarga');

    penyakitField.value = selectedOption.getAttribute('data-penyakit');
    hargaField.value = selectedOption.getAttribute('data-harga');
}
</script>
