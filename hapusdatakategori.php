<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id_kategori'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from menu_kategori where id_kategori='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:keloladatakategori.php");
 
?>