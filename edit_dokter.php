<?php
 include "header.php";
 $id = $_GET['id'];
 $ambil_data = mysqli_query($conn,"SELECT * FROM dokter Where id_dokter='$id'");
 $data = mysqli_fetch_array($ambil_data);



?>

<div class="container">
	<div class="row">
		<div class="col-lg-12 mt-2" style="min-height: 500px">
			<div class="card">
				  <div class="card-header">
					Data Dokter
				  </div>
					<div class="card-body">
						<div class="row">
							<div class="col">
                            <form name = "edit" method="POST">
									<div class="form-group">
									<label for="">Nama</label>
									<input type="text" class="form-control" placeholder="nama_dokter_baru" name="nama" value="<?php echo $data['nama_dokter']; ?>">
									</div>
									<div class="form-group">
									<label for="">Alamat</label>
									<input type="text" class="form-control" placeholder="alamat_baru" name="alamat"value="<?php echo $data['alamat_dokter']; ?>">
									</div>
									<div class="form-group">
									<label for="">No HP</label>
									<input type="text" class="form-control" placeholder="Nomor Hp Baru"  name="no_hp" value="<?php echo $data['no_hp_dokter']; ?>">
									</div>
									<br>
									<a href="data_dokter.php"><input class="btn btn-danger" value ="batal"></a>
									<input type="submit" class="btn btn-primary" name="simpan" value="Simpan" >
								</form>
							</div>
						</div>
					</div>
				  </div>
			</div>
		</div>
	</div>
</div>

<?php

	include "database.php";

	if(isset($_POST['simpan']))
	{
		$nama_dokter = $_POST['nama'];
		$alamat_dokter = $_POST['alamat'];
		$no_hp_dokter = $_POST['no_hp'];

		mysqli_query($conn, "UPDATE dokter SET nama_dokter='$nama_dokter', alamat_dokter='$alamat_dokter', no_hp_dokter= '$no_hp_dokter' WHERE id_dokter ='$id'");
		
		header("location:data_dokter.php");
	}



?>