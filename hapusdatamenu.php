<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['no_menu'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from menu where no_menu='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:keloladatamenu.php");
 
?>