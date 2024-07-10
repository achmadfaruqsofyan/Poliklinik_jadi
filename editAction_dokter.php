<?php

   require_once "database.php";

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$namadokter = mysqli_real_escape_string($conn, $_POST['nama_dokter']);
	$alamatdokter = mysqli_real_escape_string($conn, $_POST['alamat_dokter']);
	$no_hpdokter = mysqli_real_escape_string($conn, $_POST['no_hp_dokter']);	
	// Check for empty fields
	if (empty($name) || empty($age) || empty($email)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($conn, "UPDATE dokter SET `namadokter` = '$nama_dokter', `alamatdokter` = '$alamatdokter', `no_hpdokter` = '$nohpdokter' WHERE `iddokter` = $id");
		
		// Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}