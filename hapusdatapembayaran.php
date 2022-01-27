<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['no_nota'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pembayaran where no_nota='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:pembayarankasir.php");
 
?>