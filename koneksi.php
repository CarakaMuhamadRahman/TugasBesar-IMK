<?php 
	$host = "localhost"; // Nama hostnya
	$user = "root"; // Username
	$pass = ""; // Password (Isi jika menggunakan password)
	$db = "imk2"; // Database (Isikan dengan nama database yang kamu buat)

	$koneksi = mysqli_connect($host, $user, $pass, $db); // Koneksi ke MySQL

	// Check connection
	if (mysqli_connect_errno()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}

?>
