<?php 
	include "header.php";
	if (isset($_GET['id'])) {
		$id_periksa = $_GET['id'];
		$query = mysqli_query($conn, "SELECT p.*, ps.nama_pasien, d.nama_dokter, o.id_penyakit, o.nama_obat, o.harga
			FROM periksa p
			INNER JOIN pasien ps ON p.id_pasien = ps.id_pasien
			INNER JOIN dokter d ON p.id_dokter = d.id_dokter
			INNER JOIN obat o ON p.id_obat = o.id_obat
		");
	}
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12 mt-2" style="min-height: 500px">
			<div class="card">
				  <div class="card-header">
					Data Pasien
				  </div>
				  <div class="card-body">
					<div class ="row">
						<div class="col">
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
							  Tambah Data
							</button>
						</div>
						<div class="col">
							<form action="" class="form-inline" method="GET">
								<input type="text" class="form-control" name="keyword">
								<input type="submit" class="btn btn-primary" name="cari" value="cari">
							</form>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col">
							<table class="table table-bordered table-striped">
							<tr>
								<th>No</th>
								<th>Id_Pasien</th>
								<th>Nama_Pasien</th>
								<th>Alamat Pasien</th>
								<th>Nomor HP Pasien</th>
							</tr>
							<?php
							if(isset($_GET['cari'])){
								$keyword=$_GET['keyword'];
								$query=mysqli_query($conn,"SELECT * FROM pasien WHERE nama_pasien like '%$keyword%'");
							}else {
									$query = mysqli_query($conn,"SELECT * FROM pasien");
							}
							$no=1;
								while ($ambil_data=mysqli_fetch_array($query)){
							?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $ambil_data['id_pasien'];?></td>
								<td><?php echo $ambil_data['nama_pasien'];?></td>
								<td><?php echo $ambil_data['alamat_pasien'];?></td>
								<td><?php echo $ambil_data['no_hp_pasien'];?></td>
								<td><a href="edit_pasien.php?id=<?php echo $ambil_data['id_pasien']?>" class="btn btn-warning">Edit<a> ||  <a href="hapus_data_pasien.php?id=<?php echo $ambil_data['id_pasien']?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ini ?')">Hapus<a>
							</tr>
								<?php
								}
								?>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Input Data Pasien</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<form action="simpan_pasien.php" method="POST">
									<div class="form-group">
        							<label for="id_pasien">ID Pasien</label>
        							<input type="text" class="form-control" id="id_dokter" placeholder="ID Dokter" name="id_dokter" required>
    								</div>
									<div class="form-group">
									<label for="">Nama</label>
									<input type="text" class="form-control"  name="nama_pasien">
									</div>
									<div class="form-group">
									<label for="">Alamat</label>
									<input type="text" class="form-control" placeholder="alamat" name="alamat_pasien">
									</div>
									<div class="form-group">
									<label for="">No HP</label>
									<input type="text" class="form-control"  name="no_hp_pasien">
									</div>
									<br>
									<input type="submit" class="btn btn-primary" value="simpan">
								</form>
							</div>
						</div>
					</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>