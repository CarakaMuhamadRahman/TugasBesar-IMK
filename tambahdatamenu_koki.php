<?php 
include_once("koneksi.php");

	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if (!isset($_SESSION['nama_pengguna'])) {
        header('location:login.php?pesan=gagal');
    }
	?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet" />

    <!-- custom css -->
    <link rel="stylesheet" href="style.css" />

    <title>Admin | Waras</title>
    <?php
    include_once("koneksi.php");

    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $result = mysqli_query($koneksi, "SELECT * FROM menu where nama_menu like'%" . $cari . "%'");
    } else {
        $result = mysqli_query($koneksi, "SELECT * FROM menu ORDER BY nama_menu ASC");
    }
    ?>
  </head>
  <body>
    <nav class="navbar navbar-dark nav-admin">
      <div class="container-fluid" height="40">
        <a class="navbar-brand" href="#">
          <img
            src="./img/logo_waras.png"
            alt=""
            width="40"
            height="40"
            class="d-inline-block align-text-button"
          />
          ꦮꦫꦱ
        </a>
        handrian
      </div>
    </nav>
    <div class="container mt-5">
      <h3>Tambah Data Menu</h3>
    </div>
    <?php 
                if(isset($_POST['tombol']))
                {
                    $no_menu = $_POST['no_menu'];
                    $nama_menu = $_POST['nama_menu'];
                    $harga = $_POST['harga'];
                    $stok = $_POST['stok'];
                    $id_order = $_POST['id_order'];
                    $id_kategori = $_POST['id_kategori'];
                    mysqli_query($koneksi,"insert into menu (no_menu,nama_menu,harga,stok,id_order,id_kategori) values ('$no_menu','$nama_menu','$harga','$stok','$id_order','$id_kategori')");
                    header("location:kelolaStokMenu_Koki.php");
                  }                   
                
            ?>
    <div class="container border border-1 mt-4">
      <form method="POST">
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">NO</label>
          <div class="col-sm-10">
            <input type="text" class="form-control"  name="no_menu" />
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Nama Menu</label>
          <div class="col-sm-10">
            <input type="text" class="form-control"  name="nama_menu" />
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Harga</label>
          <div class="col-sm-10">
            <input type="text" class="form-control"  name="harga"/>
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Stok</label>
          <div class="col-sm-10">
            <input type="text" class="form-control"  name="stok"/>
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Id Order</label>
          <div class="col-sm-10">
            <input type="text" class="form-control"  name="id_order"/>
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Id Kategori</label>
          <div class="col-sm-10">
            <input type="text" class="form-control"  name="id_kategori"/>
          </div>
        </div>
        <td><input class="btn-outline-warning" type="submit" name="tombol" value="Tambah"></td>
        <!-- <button type="submit" class="btn btn-success mb-3">Simpan</button> -->
      </form>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
