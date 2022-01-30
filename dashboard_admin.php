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
        $result = mysqli_query($koneksi, "SELECT COUNT(*) as `total` FROM `pengguna`");
        $dataPengguna = mysqli_fetch_assoc($result);
        //
        $result = mysqli_query($koneksi, "SELECT COUNT(*) as `total` FROM `menu`");
        $dataMenu = mysqli_fetch_assoc($result);     
        //
        $result = mysqli_query($koneksi, "SELECT COUNT(*) as `total` FROM `menu_kategori`");
        $dataKategori = mysqli_fetch_assoc($result);
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


    <!-- custom css -->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="koki.css" />

    <title>Admin | Waras</title>
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
    <div class="container-md mt-5" style="border-radius: 36px;">
      <div class="card  text-white" style="border-radius: 36px;">
        <img src="./img/img-admin.png" class="card-img" alt="..." style="border-radius: 36px;"/>
        <div class="card-img-overlay mt-5">
          <h5 class="card-title text-center">Selamat Datang Di</h5>
          <h1 class="card-text text-center">
            Waras
          </h1>
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-around mb-3">
      <div class="card border-3 " style="width: 15rem; border-radius: 34px;">
          <div class="card-body text-center">
            <h5 class="card-title">Total Pegawai</h5>
            <h1><?php echo $dataPengguna['total']; ?></h1>
          </div>
        </div>
          <div class="card border-3 " style="width: 15rem; border-radius: 34px;">
          <div class="card-body text-center">
            <h5 class="card-title">Total Menu</h5>
            <h1><?php echo $dataMenu['total']; ?></h1>
          </div>
        </div>
        <div class="card border-3 " style="width: 15rem; border-radius: 34px;">
          <div class="card-body text-center">
            <h5 class="card-title">Total Menu Kategori</h5>
            <h1><?php echo $dataKategori['total']; ?></h1>
          </div>
        </div>
      </div>
      
      <div class="mt-4 d-flex justify-content-around mb-3">
      <div class="button1">
            <center><a href="keloladatapengguna.php" class="btn1 btn-lg btn-block" style="text-decoration: none;">Kelola data pengguna</a></center>
              </div>
              <div class="button1">
            <center><a href="keloladatamenu.php" class="btn1 btn-lg btn-block" style="text-decoration: none;">Kelola data menu</a></center>
              </div>
              <div class="button1">
            <center><a href="keloladatakategori.php" class="btn1 btn-lg btn-block" style="text-decoration: none;">Kelola data kategori</a></center>
              </div>
      </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
