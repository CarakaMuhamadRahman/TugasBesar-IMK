<?php 
include_once("koneksi.php");

	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if (!isset($_SESSION['nama_pengguna'])) {
        header('location:login.php?pesan=gagal');
    }
	?>
<?php 
        // get count Pengguna
        $result = mysqli_query($koneksi, "SELECT SUM(total_harga) AS jumlah FROM view_total;");
        $data_total = mysqli_fetch_assoc($result);        
        
        $result = mysqli_query($koneksi, "SELECT COUNT(*) as `pembeli` FROM `pesanan` where status='Selesai' ");
        $data_pembeli = mysqli_fetch_assoc($result);
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Waras | Pencatatan</title>

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
        $result = mysqli_query($koneksi, "SELECT pembayaran.*,pesanan.jumlah,pesanan.status,pesanan.no_menu,view_total.total_harga,menu.nama_menu FROM pembayaran,pesanan,view_total,menu where pembayaran.id_order=pesanan.id_order and pesanan.no_menu=menu.no_menu and pembayaran.no_nota=view_total.no_nota ORDER BY no_nota ASC");
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
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <div style="color: black; font-size: 20px">
              <div class="dropdown mr-5">
                <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['nama_pengguna'] ?>
                </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
            </div>
      </div>
              </div>
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
        <div >
          <div class="mb-5" style="position: absolute; bottom: 0; left: 24%">
            <a href="dashboard_kasir.php" class="btn btn-dsh" style="width: 15rem"
              >Dashboard</a
            >
            <a href="#menu" class="btn btn-dsh" style="width: 15rem"
              >Pencatatan</a
            >
            <a href="pembayarankasir.php" class="btn btn-dsh" style="width: 15rem"
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
        <h1 class="mt-5" id="menu">Pencatatan</h1>

        <table class="table table-bordered">
          <tr>
            <th colspan="7">Tabel Pencatatan</th>
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

                        </div>
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
                  <th>Memesan</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                  <th>Total Harga</th>
                </tr>
                <?php
                    $no = 1;
                    while ($user_data = mysqli_fetch_array($result)) {
                    ?>
                    
                <tr style="text-align: center">
                  <td><?php echo $user_data['no_nota']; ?></td>
                  <td><?php echo $user_data['nama_menu']; ?></td>
                  <td><?php echo $user_data['jumlah']; ?></td>
                  <td><?php echo $user_data['status']; ?></td>
                  <td><?php echo $user_data['tanggal']; ?></td>
                  <td><?php echo $user_data['total_harga']; ?></td>
                </tr>
                <?php
                    }
                    ?>
                    <td colspan="5" style="background-color: burlywood; text-align: center;">Jumlah Pemasukan</td>
                    <td style="text-align: center;background-color: coral;"><?php echo $data_total['jumlah']; ?> / <?php echo $data_pembeli['pembeli']; ?> Pemesan</td>
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
