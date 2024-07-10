<?php
 include "header.php";
 $id = $_GET['id'];
 $ambil_data = mysqli_query($conn,"SELECT * FROM penyakit Where id_penyakit='$id'");
 $data = mysqli_fetch_array($ambil_data);



?>

<div class="container">
	<div class="row">
		<div class="col-lg-12 mt-2" style="min-height: 500px">
			<div class="card">
				  <div class="card-header">
					Jenis penyakit
				  </div>
					<div class="card-body">
						<div class="row">
							<div class="col">
                            <form name = "edit" method="POST">
									<div class="form-group">
									<label for="">Jenis Penyakit</label>
									<input type="text" class="form-control" placeholder="nama_penyakit_baru" name="nama" value="<?php echo $data['nama_penyakit']; ?>">
									</div>
									<a href="penyakit.php"><input class="btn btn-danger" value ="batal"></a>
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
		$nama_penyakit = $_POST['nama'];


		mysqli_query($conn, "UPDATE penyakit SET nama_penyakit='$nama_penyakit' WHERE id_penyakit ='$id'");
		
		header("location:penyakit.php");
	}



?>