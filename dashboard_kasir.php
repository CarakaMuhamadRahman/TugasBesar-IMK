<?php 
include_once("koneksi.php");

	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if (!isset($_SESSION['nama_pengguna'])) {
        header('location:login.php?pesan=gagal');
    }
	?>

<?php 
        // get count Menu
        $result = mysqli_query($koneksi, "SELECT COUNT(*) as `totalPembayaran` FROM `pembayaran`");
        $dataMenu = mysqli_fetch_assoc($result);
        // // get count Pesanan
        // $result = mysqli_query($koneksi, "SELECT COUNT(*) as `totalPencatatan` FROM `pembayaran`");
        // $dataPesanan = mysqli_fetch_assoc($result);     
    ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="kasir.css">  

    <title>WARAS | Kasir</title>
  </head>
  <body>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: rgb(69, 98, 76);">
            <div class="container-fluid">
              <a class="navbar-brand" href="dashboard_kasir.php">
                <img src="img/logoo 1.png" alt="" width="55" height="55">
                ꦮꦫꦱ
              </a>
              <div class="dropdown mr-2">
                <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['nama_pengguna'] ?>
                </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
            </div>
            </div>
          </nav>
          <br><br><br><br><br>

          <!-- Jumbotron -->
          <div class="container">
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <p class="lead">Selamat Datang Di</p>
              <h1 class="display-4">WARAS</h1>
            </div>
          </div>
        </div>
        <br>
        <!-- Jumbotron -->

        <!-- Card -->
        <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Pencatatan</h5>
                <center><h3><?php echo $dataMenu['totalPembayaran']; ?></h3></center>

              </div>
            </div>
            <br><br>
            <div class="button1">
            <center><a href="pencatatankasir.php" class="btn1 btn-lg btn-block" style="text-decoration: none;">Lihat Pencatatan</a></center>
              </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Pembayaran</h5>
                                <center><h3><?php echo $dataMenu['totalPembayaran']; ?></h3></center>

              </div>
            </div>
            <br><br>
            <div class="button2">
            <center><a href="pembayarankasir.php" class="btn2 btn-lg btn-block" style="text-decoration: none;">Lihat Pembayaran</a></center>
          </div>
          </div>
        </div>
      </div>
      <br><br><br>
        <!-- Card -->

      <!-- Footer -->
      <footer class="text-center text-dark mt-3 bt-2 pb-2"  style="background-color: white">
          Copyright © 2022 Catalyze Team    
      </footer> 
      <!-- Footer -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>
