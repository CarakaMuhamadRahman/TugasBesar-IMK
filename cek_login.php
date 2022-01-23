<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$pass = md5($_POST['pass']);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from jabatan,pengguna where pengguna.username='$username' and pengguna.pass='$pass' and pengguna.id_jabatan=jabatan.id_jabatan");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['nama_jabatan']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama_jabatan'] = "admin";
		$_SESSION["nama_pengguna"] = $data["nama_pengguna"];
		// alihkan ke halaman dashboard admin
		header("location:dashboard_admin.php");
 
	// cek jika user login sebagai pelayan
	}else if($data['nama_jabatan']=="pelayan"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama_jabatan'] = "pelayan";
		$_SESSION["nama_pengguna"] = $data["nama_pengguna"];
		// alihkan ke halaman dashboard pengguna
		header("location:dashboard_pelayan.php");
 
	// cek jika user login sebagai koki
	}else if($data['nama_jabatan']=="koki"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama_jabatan'] = "koki";
		$_SESSION["nama_pengguna"] = $data["nama_pengguna"];
		// alihkan ke halaman dashboard koki
		header("location:dashboard_koki.php");
 
      // cek jika user login sebagai kasir
	}
	else if($data['nama_jabatan']=="kasir"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['nama_jabatan'] = "kasir";
		$_SESSION["nama_pengguna"] = $data["nama_pengguna"];
		// alihkan ke halaman dashboard kasir
		header("location:dashboard_kasir.php");
 
	}else{
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}
 
?>