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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Waras | Pembayaran</title>

    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet" />

    <!-- custom css -->
    <link rel="stylesheet" href="koki.css" />

    <title>Koki | Waras</title>

    <?php
    include_once("koneksi.php");

    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $result = mysqli_query($koneksi, "SELECT pembayaran.* FROM pembayaran,pesanan where no_nota like'%" . $cari . "%'");
    } else {
        $result = mysqli_query($koneksi, "SELECT pembayaran.*,pesanan.status,pesanan.jumlah,pesanan.no_menu,view_total.total_harga,menu.nama_menu FROM pembayaran,pesanan,view_total,menu where pembayaran.id_order=pesanan.id_order and pesanan.no_menu=menu.no_menu and pembayaran.no_nota=view_total.no_nota ORDER BY no_nota ASC");
      }
    ?>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="padding-top: 0">
      <div class="container-fluid custom-navbar1">
        <a class="navbar-brand judul-icon" href="dashboard_kasir.php">
          <img src="img/logoo 1.png" alt="" width="55" height="55" />
          <font color="white">ꦮꦫꦱ</font>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="dropdown mr-5">
                <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['nama_pengguna'] ?>
                </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
            </div>
      </div>
    </nav>
    <!-- navbar -->

    <!-- jumbotron -->
    <div id="jumbotron">
      <div class="col-sm-12">
        <img
          src="./img/pkasir2.png"
          class="img-fluid dashboard-pelayan"
          alt="..."
          width="100%"
        />
        <div>
          <div class="mb-5" style="position: absolute; bottom: 0; left: 24%">
            <a href="dashboard_kasir.php" class="btn btn-dsh" style="width: 15rem"
              >Dashboard</a
            >
            <a href="pencatatankasir.php" class="btn btn-dsh" style="width: 15rem"
              >Pencatatan</a
            >
            <a href="#menu" class="btn btn-dsh" style="width: 15rem"
              >Pembayaran</a
            >
          </div>
        </div>
        <div class="judul-1">Selamat Datang Di</div>
        <div class="login"></div>
        <div class="judul-2">Waras</div>
      </div>

      <!-- tabel pemesanan -->
      <div class="container">
        <h1 class="mt-5" id="menu">Pembayaran</h1>

        <table class="table table-bordered">
          <tr>
            <th colspan="7">Tabel Pembayaran</th>
          </tr>
          <tr>
            <td>
              <table class="table table-bordered">
                <br />
                <div class="position-relative">
                <a href="tambahdatapembayaran.php">

                  <button class="btn btn-success position-absolute top-0 start-0">
                    Tambah Data
                  </button>
                </a>
                <div class="input-group-sm position-absolute top-0 end-0">
                <form class="form-inline method='GET'">
                    <div class="row">
                    <div class="col-8">   
                            <input class="form-control" name="cari"  type="search" placeholder="Cari Menu" aria-label="Search">
                        </div>
                        <div class="col">
                            <button class="btn btn-success type="submit" action="">Cari</button>
                        </div>
                </form>
                </div>
              </div>

                <br />
                <br />
                <br />

                <tr style="text-align: center">
                  <th>No Nota</th>
                  <th>Nama Menu</th>
                  <th>Jumlah</th>
                  <th>Total Harga</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
                <?php
                    $no = 1;
                    while ($user_data = mysqli_fetch_array($result)) {
                    ?>
                    
                <tr style="text-align: center">
                  <td><?php echo $user_data['no_nota']; ?></td>
                  <td><?php echo $user_data['nama_menu']; ?></td>
                  <td><?php echo $user_data['jumlah']; ?></td>
                  <td><?php echo $user_data['total_harga']; ?></td>
                  <td><?php echo $user_data['status']; ?></td>
                  <td><?php echo $user_data['tanggal']; ?></td>
                  <td><a class='btn btn-danger' href='hapusdatapembayaran.php?no_nota=<?= $user_data['no_nota']; ?>' onclick="return confirm('anda yakin ingin menghapus data?')">Delete</a></td>
                </tr>
                <?php
                    }
                    ?>
              </table>
            </td>
          </tr>
        </table>
      </div>
      <!-- tabel pemesanan -->
    </div>
    <!-- jumbotron -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
