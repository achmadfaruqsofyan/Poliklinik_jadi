<?php 
	include "header.php";
	$query = mysqli_query($conn,"SELECT * FROM dokter");
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12 mt-2" style="min-height: 500px">
			<div class="card">
				  <div class="card-header">
					Jenis Penyakit
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
                                    <th>Id Penyakit</th>
                                    <th>Jenis Penyakit</th>
                                    
                                </tr>
                                <?php
							if(isset($_GET['cari'])){
								$keyword=$_GET['keyword'];
								$query=mysqli_query($conn,"SELECT * FROM penyakit WHERE nama_penyakit like '%$keyword%'");
							}else {
									$query = mysqli_query($conn,"SELECT * FROM penyakit");
							}
							$no=1;
								while ($ambil_data=mysqli_fetch_array($query)){
							?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $ambil_data['id_penyakit'];?></td>
                                <td><?php echo $ambil_data['nama_penyakit'];?></td>
								
								<td><a href="edit_penyakit.php?id=<?php echo $ambil_data['id_penyakit']?>" class="btn btn-warning">Edit<a> ||  <a href="hapus_data_penyakit.php?id=<?php echo $ambil_data['id_penyakit']?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ini ?')">Hapus<a>
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Input Data penyakit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<form action="simpan_penyakit.php" method="POST">
								<form action="simpan_penyakit.php" method="POST">
    								<div class="form-group">
        							<label for="id_penyakit">ID penyakit</label>
        							<input type="text" class="form-control" id="id_penyakit" placeholder="ID penyakit" name="id_penyakit" required>
    								</div>
									<div class="form-group">
									<label for="">Jenis Penyakit</label>
									<input type="text" class="form-control" placeholder="Nama" name="nama_penyakit">
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