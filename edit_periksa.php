<?php
include "header.php";
include "database.php";

// Ambil data obat untuk dropdown
$obat_result = mysqli_query($conn, "SELECT * FROM obat");
$obat_data = [];
while ($data_obat = mysqli_fetch_assoc($obat_result)) {
    $obat_data[] = $data_obat;
}
?>
<div class="container mt-5">
    <h2>Data Periksa</h2>
    <form name="periksa" action="data_periksa.php" method="simpan">
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
            <label for="inputObat">Keluhan</label>

                <select class="form-control" name="id_obat" id="inputObat" onchange="updateFields()">
                <option value="">Pilih Keluhan</option>
                <?php
                foreach ($obat_data as $data_obat) {
                    echo '<option value="' . $data_obat['id_obat'] . '" data-penyakit="' . $data_obat['id_penyakit'] . '" data-harga="' . $data_obat['harga'] . '">' . $data_obat['id_penyakit'] . '</option>';
                }
                ?>
            </select>
            </select>
        </div>

        <input type="hidden" name="id_penyakit" id="inputPenyakit">
        <input type="hidden" name="id_harga" id="inputHarga">
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-default">Reset</button>
        
    </form>
    <?php
    if(isset($_POST['simpan']))
	{
    $id_pasien = $_POST['id_pasien'];
    $id_dokter = $_POST['id_dokter'];
    $tgl_periksa = $_POST['tgl_periksa'];
    $id_penyakit = $_POST['id_obat'];
    $id_obat = $_POST['id_obat'];
    $id_harga = $_POST['id_obat'];

		mysqli_query($conn, "UPDATE periksa SET  (id_pasien, id_dokter, tgl_periksa, id_penyakit, id_obat, id_harga) 
              VALUES ('$id_pasien', '$id_dokter', '$tgl_periksa', '$id_penyakit', '$id_obat', '$id_harga') WHERE id_periksa ='$id'");
		
		header("location:data_pasien.php");
	}