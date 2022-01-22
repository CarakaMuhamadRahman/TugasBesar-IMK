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
        $dataMenu = mysqli_fetch_assoc($result);
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
    <div class="container-md mt-5">
      <div class="card bg-dark text-white">
        <img src="./img/img-admin.png" class="card-img" alt="..." />
        <div class="card-img-overlay mt-5">
          <h5 class="card-title text-center">Selamat Datang Di</h5>
          <h1 class="card-text text-center">
            Waras
          </h1>
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-around mb-3">
        <div class="card border-2 border-dark" style="width: 15rem">
          <div class="card-body text-center">
            <h5 class="card-title">Total Pegawai</h5>
            <h1><?php echo $dataPengguna['total']; ?></h1>
          </div>
        </div>
        <div class="card border-2 border-dark" style="width: 15rem">
          <div class="card-body text-center">
            <h5 class="card-title">Total Pesanan</h5>
            <h1><?php echo $dataMenu['total']; ?></h1>
          </div>
        </div>
        <div class="card border-2 border-dark" style="width: 15rem">
          <div class="card-body text-center">
            <h5 class="card-title">Total Pemasukan</h5>
            <h1>1</h1>
          </div>
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-around mb-3">
        <a href="keloladatapengguna.php">
        <button src style="width: 15rem;">Kelola Data Pengguna</button>
        </a>
        <a href="keloladatamenu.php">
        <button style="width: 15rem">Kelola Data Menu</button>
        </a>
        <a href="keloladatakategori.php">
        <button style="width: 15rem">Kelola Data Kategori Menu</button>
        </a>
      </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
