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
        $result = mysqli_query($koneksi, "SELECT * FROM menu_kategori where nama_kategori like'%" . $cari . "%'");
    } else {
        $result = mysqli_query($koneksi, "SELECT * FROM menu_kategori ORDER BY nama_kategori ASC");
    }
    ?>
  </head>
  <body>
    <nav class="navbar navbar-dark nav-admin">
      <div class="container-fluid" height="40">
        <a class="navbar-brand" href="keloladatakategori.php">
          <img
            src="./img/logo_waras.png"
            alt=""
            width="40"
            height="40"
            class="d-inline-block align-text-button"
          />
          ꦮꦫꦱ
        </a>
        <div style="color: white;"><?php echo $_SESSION['nama_pengguna'] ?></div>
      </div>
    </nav>
    <div class="container mt-5">
      <h3>Tambah Data Kategori</h3>
    </div>
    <?php 
                if(isset($_POST['tombol']))
                {
                    $id_kategori = $_POST['id_kategori'];
                    $nama_kategori = $_POST['nama_kategori'];
                    mysqli_query($koneksi,"insert into menu_kategori (id_kategori,nama_kategori) values ('$id_kategori','$nama_kategori')");
                    header("location:keloladatakategori.php");
                  }                   
            ?>
    <div class="container border border-1 mt-4">
      <form method="POST">
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">No Kategori</label>
          <div class="col-sm-10">
          <input type="text" class="form-control"  name="id_kategori" />
          </div>
        </div>
        <div class="mt-3 mb-3 row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Nama Kategori</label>
          <div class="col-sm-10">
              <input type="text" class="form-control"  name="nama_kategori" />
          </div>
        </div>
        <style>
            .btn-success {
              width: 300px;
            }
            </style>
        <center>
        <td><input class="btn btn-success mb-3" type="submit" name="tombol" value="Tambah"></td>
        </center>
      </form>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
