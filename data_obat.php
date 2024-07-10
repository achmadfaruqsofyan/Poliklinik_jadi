<?php 
	include "header.php";
	$query = mysqli_query($conn,"SELECT * FROM obat");
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12 mt-2" style="min-height: 500px">
			<div class="card">
				  <div class="card-header">
					Jenis obat
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
                                    <th>Foto</th>
                                    <th>ID Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Kegunaan</th>
                                    <th>Harga</th>
                                </tr>
                                <?php
                                    if(isset($_GET['cari'])){
                                        $keyword=$_GET['keyword'];
                                        $query=mysqli_query($conn,"SELECT * FROM obat WHERE nama_obat like '%$keyword%'");
                                    }else {
                                            $query = mysqli_query($conn,"SELECT * FROM obat");
                                    }
                                    $no=1;
                                        while ($ambil_data=mysqli_fetch_array($query)){
                                    ?>
                                <tr>
                                    <td>
                                        <?php echo $no++ ?></td>

                                        <td><img src="assets/img/<?php echo $ambil_data['foto']; ?>" width="100"></td>
                                        <td><?php echo $ambil_data['id_obat']; ?></td>
                                        <td style="word-break: break-word;"><?php echo $ambil_data['nama_obat']; ?></td>
                                        <td style="word-break: break-word;"><?php echo $ambil_data['id_penyakit']; ?></td>
                                        <td><?php echo $ambil_data['harga']; ?></td>
                                        <td>
                                        <td><a href="edit_obat.php?id=<?php echo $ambil_data['id_obat']?>" class="btn btn-warning">Edit<a> ||  <a href="hapus_data_obat.php?id=<?php echo $ambil_data['id_obat']?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ini ?')">Hapus<a>
                                        </tr>
                                        </td>
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Input Data Obat</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<form action="simpan_obat.php" method="POST" enctype="multipart/form-data">
								
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file" class="form-control" name="foto">
                                    </div>
    								<div class="form-group">
        							<label for="id_obat">ID Obat</label>
        							<input type="text" class="form-control" id="id_obat" placeholder="ID obat" name="id_obat" required>
    								</div>
									<div class="form-group">
									<label for="">Nama Obat</label>
									<input type="text" class="form-control" placeholder="Nama" name="nama_obat">
									</div>
                                    <div class="form-group">
                                        <label for="penyakit">Kegunaan</label>
                                        <select class="form-control" id="id_penyakit" name="id_penyakit">
                                            <option value="">Pilih penyakit</option>
                                            <?php
                                                // Query untuk mengambil data penyakit
                                                $query_penyakit = mysqli_query($conn, "SELECT * FROM penyakit");
                                                while ($data_penyakit = mysqli_fetch_array($query_penyakit)) {
                                                    echo "<option value='" . $data_penyakit['nama_penyakit'] . "'>" . $data_penyakit['nama_penyakit'] . "</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <div class="input-group">
                                            <span class="input-group-text">RP</span>
                                            <input type="text" class="form-control" name="harga" required>
                                        </div>
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
