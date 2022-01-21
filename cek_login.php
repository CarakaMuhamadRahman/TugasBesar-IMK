<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$id_pegawai = $_POST['id_pegawai'];
$pass = md5($_POST['pass']);
 
 
// menyeleksi data user dengan id_pegawai dan password yang sesuai
$login = mysqli_query($koneksi,"select * from pegawai where id_pegawai='$id_pegawai' and pass='$pass'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah id_pegawai dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['jabatan']=="admin"){
 
		// buat session login dan id_pegawai
		$_SESSION['id_pegawai'] = $id_pegawai;
		$_SESSION['jabatan'] = "admin";
		$_SESSION["nama_pegawai"] = $data["nama_pegawai"];
		$_SESSION["jenis_kelamin"] = $data["jenis_kelamin"];
		// alihkan ke halaman dashboard admin
		header("location:admin.php");
 
	// cek jika user login sebagai pelayan
	}else if($data['jabatan']=="pelayan"){
		// buat session login dan id_pegawai
		$_SESSION['id_pegawai'] = $id_pegawai;
		$_SESSION['jabatan'] = "pelayan";
		$_SESSION["nama_pegawai"] = $data["nama_pegawai"];
		$_SESSION["dashboard_pelayan"] = $data["jenis_kelamin"];
		// alihkan ke halaman dashboard pegawai
		header("location:main_page.php");
 
	// cek jika user login sebagai koki
	}else if($data['jabatan']=="koki"){
		// buat session login dan id_pegawai
		$_SESSION['id_pegawai'] = $id_pegawai;
		$_SESSION['jabatan'] = "koki";
		$_SESSION["nama_pegawai"] = $data["nama_pegawai"];
		$_SESSION["jenis_kelamin"] = $data["jenis_kelamin"];
		// alihkan ke halaman dashboard koki
		header("location:koki_dashboard.php");
 
      // cek jika user login sebagai kasir
	}
	else if($data['jabatan']=="kasir"){
		// buat session login dan id_pegawai
		$_SESSION['id_pegawai'] = $id_pegawai;
		$_SESSION['jabatan'] = "kasir";
		$_SESSION["nama_pegawai"] = $data["nama_pegawai"];
		$_SESSION["jenis_kelamin"] = $data["jenis_kelamin"];
		// alihkan ke halaman dashboard kasir
		header("location:kasir_dashboard.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}
 
?>