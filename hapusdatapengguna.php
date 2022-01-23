<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_pengguna'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pengguna where id_pengguna='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:keloladatapengguna.php");
 
?>