<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$pass = md5($_POST['pass']);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from pengguna where pengguna.username='$username' and pengguna.pass='$pass'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['jabatan']=="Admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = "Admin";
		$_SESSION["nama_pengguna"] = $data["nama_pengguna"];
		// alihkan ke halaman dashboard admin
		header("location:dashboard_admin.php");
 
	// cek jika user login sebagai pelayan
	}else if($data['jabatan']=="Pelayan"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = "Pelayan";
		$_SESSION["nama_pengguna"] = $data["nama_pengguna"];
		// alihkan ke halaman dashboard pengguna
		header("location:dashboard_pelayan.php");
 
	// cek jika user login sebagai koki
	}else if($data['jabatan']=="Koki"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = "Koki";
		$_SESSION["nama_pengguna"] = $data["nama_pengguna"];
		// alihkan ke halaman dashboard koki
		header("location:dashboard_koki.php");
 
      // cek jika user login sebagai kasir
	}
	else if($data['jabatan']=="Kasir"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = "Kasir";
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