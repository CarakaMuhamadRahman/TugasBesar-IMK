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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Menu</title>

    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- custom css -->
    <link rel="stylesheet" href="koki.css"> 

    <title>Koki | Waras</title>

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
    
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid custom-navbar1">
          <a class="navbar-brand judul-icon" href="#">
            <img src="img/logoo 1.png" alt="" width="55" height="55">
            <font color = "black">ꦮꦫꦱ</font>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
              <!-- Drop Down -->
              <div class="dropdown mr-10">
                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                       <?php echo $_SESSION['nama_pengguna'] ?>
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
            <img src="./img/pageStokKoki.png" class="img-fluid dashboard-pelayan" alt="..." width="100%">
              <div class="" style="posisition: relative">
                <div class="mb-5" style="position: absolute; bottom: 0; left: 25%;">
                  <a href = "dashboard_koki.php" class="btn btn-dsh" style="width: 15rem">DASHBOARD</a>
                  <a href = "kelolaStokMenu_Koki.php" class="btn btn-stk" style="width: 15rem">STOCK MENU</a>
                  <a href = "kelolaPesanan_Koki.php" class="btn btn-psn" style="width: 15rem">PESANAN</a>
                </div>
             </div>
            <div class="judul-1">Selamat Datang Di</div>
            <div class="login">
        </div>
            <div class="judul-2">Waras</div>
            
          </div>
      </div>
      <!-- jumbotron -->

      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <!-- tabel pemesanan -->
      <div class="container">
      <h1 class="mt-5">Kelola Stok Menu</h1>

      <table class="table table-bordered">
        <tr>
          <th colspan="7">Tabel Stok Menu</th>
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
                <a href="tambahdatamenu_koki.php">
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
                    </div>
                </form>
                </div>
              </div>

                  

              <br />
              <br />
              <br />

              <tr style="text-align:center">
                <th>No</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
              </tr>
              <?php
                    $no = 1;
                    while ($user_data = mysqli_fetch_array($result)) {
                    ?>
              <tr style="text-align:center">
                <td><?php echo $user_data['no_menu']; ?></td>
                <td><?php echo $user_data['nama_menu']; ?></td>
                <td><?php echo $user_data['harga']; ?></td>
                <td><?php echo $user_data['stok']; ?></td>
                <td>
                            <center><a class='btn btn-success' href='ubahdatamenu_koki.php?no_menu=<?= $user_data['no_menu']; ?>'>Edit</a> |
                            <a class='btn btn-danger' href='hapusDataMenu_Koki.php?no_menu=<?= $user_data['no_menu']; ?>' onclick="return confirm('anda yakin ingin menghapus data?')">Delete</a>
                        </td>
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

      <script src="./js/bootstrap.bundle.min.js"></script>

</body>
</html>