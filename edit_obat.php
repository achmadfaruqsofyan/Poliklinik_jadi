<?php
 include "header.php";
 $id = $_GET['id'];
 $ambil_data = mysqli_query($conn,"SELECT * FROM obat Where id_obat='$id'");
 $data = mysqli_fetch_array($ambil_data);



?>

<div class="container">
	<div class="row">
		<div class="col-lg-12 mt-2" style="min-height: 500px">
			<div class="card">
				  <div class="card-header">
					Data Obat
				  </div>
					<div class="card-body">
						<div class="row">
							<div class="col">
                            <form name = "edit" method="POST">
									<div class="form-group">
									<label for="">Nama Obat</label>
									<input type="text" class="form-control" placeholder="nama_obat_baru" name="nama" value="<?php echo $data['nama_obat']; ?>">
									</div>
									<div class="form-group">
                                        <label for="harga">Harga</label>
                                        <div class="input-group">
                                            <span class="input-group-text">RP</span>
                                            <input type="text" class="form-control" placeholder="harga_baru" name="harga" value="<?php echo $data['harga']; ?>">
                                        </div>
                                    </div>
									
									<a href="data_obat.php"><input class="btn btn-danger" value ="batal"></a>
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
		$nama_obat = $_POST['nama'];
		$harga = $_POST['harga'];


		mysqli_query($conn, "UPDATE obat SET nama_obat='$nama_obat', harga = '$harga' WHERE id_obat ='$id'");
		
		header("location:data_obat.php");
	}



?>