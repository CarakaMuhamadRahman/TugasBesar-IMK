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
        $result = mysqli_query($koneksi, "SELECT * FROM menu ORDER BY no_menu ASC");
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
        <div style="color: white;"><?php echo $_SESSION['nama_pengguna'] ?></div>
      </div>
    </nav>
    <div class="container">
      <h1 class="mt-5">Kelola Data Menu</h1>

      <table class="table table-bordered">
        <tr>
          <th colspan="7">Tabel Data Menu</th>
        </tr>
        <tr>
          <td>
            <table class="table table-bordered">
              <br />
              <div class="position-relative">
                <a href="tambahdatamenu.php">

                  <button class="btn btn-success position-absolute top-0 start-0">
                    Tambah Data
                  </button>
                </a>
                <div class="position-relative">
                <div class="input-group-sm position-absolute top-0 end-0">
                  <form class="form-inline method='GET'">
                    <div class="row">
                        <div class="col-8">   
                            <input class="form-control" name="cari"  type="search" placeholder="Cari Menu" aria-label="Search">
                        </div>
                        <div class="col">
                            <button class="btn btn-success type="submit" action="">Cari</button>
                        </div>
                    </div>
                </form>
                </div>
              </div>

              <br />
              <br />
              <br />
              <tr>
              <th>No Menu</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Aksi</th>
              </tr>
              <?php
                    $no = 1;
                    while ($user_data = mysqli_fetch_array($result)) {
                    ?>
              <tr>
              <td><?php echo $user_data['no_menu']; ?></td>
                <td><?php echo $user_data['nama_menu']; ?></td>
                <td><?php echo $user_data['harga']; ?></td>
                <td>
                            <center><a class='btn btn-success' href='ubahdatamenu.php?no_menu=<?= $user_data['no_menu']; ?>'>Edit</a> |
                            <a class='btn btn-danger' href='hapusdatamenu.php?no_menu=<?= $user_data['no_menu']; ?>' onclick="return confirm('anda yakin ingin menghapus data?')">Delete</a>
                        </td>
              </tr>
              <?php
                    }
                    ?>

      </table>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
