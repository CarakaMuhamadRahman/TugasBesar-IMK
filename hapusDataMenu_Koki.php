<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$no_menu = $_GET['no_menu'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from menu where no_menu='$no_menu'");
 
// mengalihkan halaman kembali ke index.php
header("location:kelolaStokMenu_Koki.php");
 
?>