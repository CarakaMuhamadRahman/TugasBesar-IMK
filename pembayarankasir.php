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
        $result = mysqli_query($koneksi, "SELECT pembayaran.*,pesanan.status,pesanan.no_menu,view_total.total_harga,menu.nama_menu FROM pembayaran,pesanan,view_total,menu where pembayaran.id_order=pesanan.id_order and pesanan.no_menu=menu.no_menu and pembayaran.no_nota=view_total.no_nota ORDER BY no_nota ASC");
      }
    ?>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="padding-top: 0;">
        <div class="container-fluid custom-navbar1">
          <a class="navbar-brand judul-icon" href="#">
            <img src="img/logoo 1.png" alt="" width="55" height="55">
            <font color = "white">ꦮꦫꦱ</font>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
              <!-- Drop Down -->
              <div class="dropdown mr-10">
                <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
                      <font color = "white"> <?php echo $_SESSION['nama_pengguna'] ?> </font>
               </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="logout.php">Logout</a></li>
              </div>
              </div>
              <!-- Drop Down -->
              </li>
            </ul>
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
        <div class="" style="posisition: relative">
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

                <!-- <button
                    class="btn btn-success"
                    type="button"
                    id="button-addon1"
                  >
                    cari
                  </button>-->
                <div class="position-relative">
                  <div class="input-group-sm position-absolute top-0 end-0">
                    <form class="form-inline method='GET'">
                      <div class="row">
                        <div class="col">
                          <a
                            href="#"
                            class="btn btn-success"
                          >
                            Print</a
                          >
                          <a
                            href="tambahdatapembayaran.php"
                            class="btn btn-success"
                          >
                            Tambah data</a
                          >
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <br />
                <br />
                <br />

                <tr style="text-align: center">
                  <th>no_nota</th>
                  <th>Tanggal</th>
                  <th>total_harga</th>
                  <th>nama</th>
                  <th>status</th>
                  <th>no_menu</th>
                  <th>Aksi</th>
                </tr>
                <?php
                    $no = 1;
                    while ($user_data = mysqli_fetch_array($result)) {
                    ?>
                    
                <tr style="text-align: center">
                  <td><?php echo $user_data['no_nota']; ?></td>
                  <td><?php echo $user_data['tanggal']; ?></td>
                  <td><?php echo $user_data['total_harga']; ?></td>
                  <td><?php echo $user_data['nama_menu']; ?></td>
                  <td><?php echo $user_data['status']; ?></td>
                  <td><?php echo $user_data['no_menu']; ?></td>
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
      <br><br>
      <!-- tabel pemesanan -->
      <footer class="text-center text-dark mt-3 bt-2 pb-2"  style="background-color: white">
          Copyright © 2022 Catalyze Team    
        </footer> 
    </div>
    <!-- jumbotron -->

    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
