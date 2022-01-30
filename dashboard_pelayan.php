<?php 
include_once("koneksi.php");

	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if (!isset($_SESSION['nama_pengguna'])) {
        header('location:login.php?pesan=gagal');
    }
	?>
    <?php 
        // get Stok Menu Ayam Betutu 
        $result = mysqli_query($koneksi, "SELECT stok as `stokAyamBetutu` FROM `menu` WHERE nama_menu='Ayam Betutu Rebus'");
        $dataStokAyamBetutu = mysqli_fetch_assoc($result);
        // get Harga Ayam Betutu
        $result = mysqli_query($koneksi, "SELECT harga as `hargaAyamBetutu` FROM `menu` WHERE nama_menu='Ayam Betutu Rebus'");
        $dataHargaAyamBetutu = mysqli_fetch_assoc($result); 

        // get Stok Menu Ayam Goreng Kalasan 
        $result = mysqli_query($koneksi, "SELECT stok as `stokAyamKalasan` FROM `menu` WHERE nama_menu='Ayam Goreng Kalasan'");
        $dataStokAyamKalasan = mysqli_fetch_assoc($result);
        // get Harga Ayam Goreng Kalasan
        $result = mysqli_query($koneksi, "SELECT harga as `hargaAyamKalasan` FROM `menu` WHERE nama_menu='Ayam Goreng Kalasan'");
        $dataHargaAyamKalasan = mysqli_fetch_assoc($result);

        // get Stok Menu Ayam Bakar 
        $result = mysqli_query($koneksi, "SELECT stok as `stokAyamBakar` FROM `menu` WHERE nama_menu='Ayam Bakar'");
        $dataStokAyamBakar = mysqli_fetch_assoc($result);
        // get Harga Ayam Bakar
        $result = mysqli_query($koneksi, "SELECT harga as `hargaAyamBakar` FROM `menu` WHERE nama_menu='Ayam Bakar'");
        $dataHargaAyamBakar = mysqli_fetch_assoc($result);

        // get Stok Menu Ricebox Ayam Saus Woku 
        $result = mysqli_query($koneksi, "SELECT stok as `stokRiceboxSausWoku` FROM `menu` WHERE nama_menu='RiceBox Ayam Saus Woku'");
        $dataStokRiceboxSausWoku = mysqli_fetch_assoc($result);
        // get Harga Ricebox Ayam Saus Woku
        $result = mysqli_query($koneksi, "SELECT harga as `hargaRiceboxSausWoku` FROM `menu` WHERE nama_menu='RiceBox Ayam Saus Woku'");
        $dataHargaRiceboxSausWoku = mysqli_fetch_assoc($result);

        // get Stok Menu Ricebox Ayam Saus Nanas 
        $result = mysqli_query($koneksi, "SELECT stok as `stokRiceboxSausNanas` FROM `menu` WHERE nama_menu='RiceBox Ayam Saus Nanas'");
        $dataStokRiceboxSausNanas = mysqli_fetch_assoc($result);
        // get Harga Ricebox Ayam Saus Nanas
        $result = mysqli_query($koneksi, "SELECT harga as `hargaRiceboxSausNanas` FROM `menu` WHERE nama_menu='RiceBox Ayam Saus Nanas'");
        $dataHargaRiceboxSausNanas = mysqli_fetch_assoc($result);

        // get Stok Menu Ricebox Ayam Sambal Matah
        $result = mysqli_query($koneksi, "SELECT stok as `stokRiceboxSambalMatah` FROM `menu` WHERE nama_menu='RiceBox Ayam Sambal Matah'");
        $dataStokRiceboxSambalMatah = mysqli_fetch_assoc($result);
        // get Harga Ricebox Ayam Sambal Matah
        $result = mysqli_query($koneksi, "SELECT harga as `hargaRiceboxSambalMatah` FROM `menu` WHERE nama_menu='RiceBox Ayam Sambal Matah'");
        $dataHargaRiceboxSambalMatah = mysqli_fetch_assoc($result);

        // get Stok Menu Ricebox Nasi Goreng Tongkol
        $result = mysqli_query($koneksi, "SELECT stok as `stokRiceboxTongkol` FROM `menu` WHERE nama_menu='RiceBox Nasi Goreng Tongkol'");
        $dataStokRiceboxTongkol = mysqli_fetch_assoc($result);
        // get Harga Ricebox Nasi Goreng Tongkol
        $result = mysqli_query($koneksi, "SELECT harga as `hargaRiceboxTongkol` FROM `menu` WHERE nama_menu='RiceBox Nasi Goreng Tongkol'");
        $dataHargaRiceboxTongkol = mysqli_fetch_assoc($result);

        // get Stok Menu Ricebox Tongkol Suwir Temurui
        $result = mysqli_query($koneksi, "SELECT stok as `stokRiceboxTongkolSuwir` FROM `menu` WHERE nama_menu='RiceBox Tongkol Suwir Temurui'");
        $dataStokRiceboxTongkolSuwir = mysqli_fetch_assoc($result);
        // get Harga Ricebox Tongkol Suwir Temurui
        $result = mysqli_query($koneksi, "SELECT harga as `hargaRiceboxTongkolSuwir` FROM `menu` WHERE nama_menu='RiceBox Tongkol Suwir Temurui'");
        $dataHargaRiceboxTongkolSuwir = mysqli_fetch_assoc($result);

        // get Stok Menu Minuman Kunyit Citrus
        $result = mysqli_query($koneksi, "SELECT stok as `stokMinumanSitrus` FROM `menu` WHERE nama_menu='Minuman Kunyit Sitrus'");
        $dataStokMinumanSitrus = mysqli_fetch_assoc($result);
        // get Harga Minuman Kunyit Sitrus
        $result = mysqli_query($koneksi, "SELECT harga as `hargaMinumanSitrus` FROM `menu` WHERE nama_menu='Minuman Kunyit Sitrus'");
        $dataHargaMinumanSitrus = mysqli_fetch_assoc($result);

        // get Stok Menu Minuman Kurma Rempah
        $result = mysqli_query($koneksi, "SELECT stok as `stokMinumanKurma` FROM `menu` WHERE nama_menu='Minuman Kurma Rempah'");
        $dataStokMinumanKurma = mysqli_fetch_assoc($result);
        // get Harga Minuman Kurma Rempah
        $result = mysqli_query($koneksi, "SELECT harga as `hargaMinumanKurma` FROM `menu` WHERE nama_menu='Minuman Kurma Rempah'");
        $dataHargaMinumanKurma = mysqli_fetch_assoc($result);

        // get Stok Menu Minuman Secang Riang
        $result = mysqli_query($koneksi, "SELECT stok as `stokMinumanSecang` FROM `menu` WHERE nama_menu='Minuman Secang Riang'");
        $dataStokMinumanSecang = mysqli_fetch_assoc($result);
        // get Harga Minuman Secang Riang
        $result = mysqli_query($koneksi, "SELECT harga as `hargaMinumanSecang` FROM `menu` WHERE nama_menu='Minuman Secang Riang'");
        $dataHargaMinumanSecang = mysqli_fetch_assoc($result);

        // get Stok Menu Minuman Telang Sejuk
        $result = mysqli_query($koneksi, "SELECT stok as `stokMinumanSejuk` FROM `menu` WHERE nama_menu='Minuman Telang Sejuk'");
        $dataStokMinumanSejuk = mysqli_fetch_assoc($result);
        // get Harga Minuman Telang Sejuk
        $result = mysqli_query($koneksi, "SELECT harga as `hargaMinumanSejuk` FROM `menu` WHERE nama_menu='Minuman Telang Sejuk'");
        $dataHargaMinumanSejuk = mysqli_fetch_assoc($result);
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
    <link rel="stylesheet" href="pelayan.css"> 

    <title>Koki | Waras</title>
</head>
  <body>
    
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="padding-top: 0;">
        <div class="container-fluid custom-navbar1">
          <a class="navbar-brand judul-icon" href="#">
            <img src="img/logoo 1.png" alt="" width="55" height="55">
            <font color = "white">ꦮꦫꦱ</font>
          </a>
              <!-- Drop Down -->
              <div class="dropdown mr-10">
                <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
                       <?php echo $_SESSION['nama_pengguna'] ?>
               </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="logout.php">Logout</a></li>
              </div>
              </div>
              <!-- Drop Down -->
            </ul>
          </div>
        </div>
    </nav>
    <!-- navbar -->

    <!-- jumbotron -->
      <div id="jumbotron">
          <div class="col-sm-12">
            <img src="./img/pelayan_Image.png" class="img-fluid dashboard-pelayan" alt="..." width="100%">
              <div class="" style="position: relative">
               <div class="mb-5" style="position: absolute; bottom: 0; left: 35%;">
                  <a href = "dashboard_Pelayan.php" class="btn btn-dshplyn" style="width: 15rem">DASHBOARD</a>
                </div>
             </div>
             <div class="" style="position: relative">
                <div class="mb-5" style="position: absolute; bottom: 0; left: 52%;">
                  <a href = "pesan_pelayan.php" class="btn btn-psnplyn" style="width: 15rem">PESANAN</a>
                </div>
            </div>
            <div class="judul-1">Selamat Datang Di</div>
            <div class="login">
        </div>
            <div class="judul-2">Waras</div>
          </div>
          <br><br>

          <!-- Menu -->

          <!-- Row Pertama -->
          <div class="container">
            <h1>MENU</h1><br><br>
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
    <div class="card h-100">
      <img src="img/AyamBetutu_RebusdanGoreng.jpeg" class="card-img-top" alt="..." style="border-radius: 36px">
      <div class="card-body">
        <h5 class="card-title">Ayam Betutu Rebus dan Goreng</h5>
        <h8 class="card-text">Stok  : <?php echo $dataStokAyamBetutu['stokAyamBetutu']; ?></h8><br><br>
        <h8 class="card-text" style="font-weight: bold">Harga : Rp.<?php echo $dataHargaAyamBetutu['hargaAyamBetutu']; ?></h8>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="img/AyamGoreng_Kalasan.jpeg" class="card-img-top" alt="..." style="border-radius: 36px">
      <div class="card-body">
        <h5 class="card-title">Ayam Goreng Kalasan</h5>
        <h8 class="card-text">Stok  : <?php echo $dataStokAyamKalasan['stokAyamKalasan']; ?></h8><br><br>
        <h8 class="card-text" style="font-weight: bold">Harga : Rp.<?php echo $dataHargaAyamKalasan['hargaAyamKalasan']; ?></h8>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="img/Ayam_Bakar.jpeg" class="card-img-top" alt="..." style="border-radius: 36px">
      <div class="card-body">
        <h5 class="card-title">Ayam Bakar</h5>
        <h8 class="card-text">Stok  : <?php echo $dataStokAyamBakar['stokAyamBakar']; ?></h8><br><br>
        <h8 class="card-text" style="font-weight: bold">Harga : Rp.<?php echo $dataHargaAyamBakar['hargaAyamBakar']; ?></h8>
      </div>
    </div>
  </div>

  <!-- Row Kedua -->
  <div class="col">
    <div class="card h-100">
      <img src="img/ricebox_ayam_saus_woku.jpeg" class="card-img-top" alt="..." style="border-radius: 36px">
      <div class="card-body">
        <h5 class="card-title">Ricebox Ayam Saus Woku</h5>
        <h8 class="card-text">Stok  : <?php echo $dataStokRiceboxSausWoku['stokRiceboxSausWoku']; ?></h8><br><br>
        <h8 class="card-text" style="font-weight: bold">Harga : Rp.<?php echo $dataHargaRiceboxSausWoku['hargaRiceboxSausWoku']; ?></h8>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="img/ricebox_ayam_saus_nanas.jpeg" class="card-img-top" alt="..." style="border-radius: 36px">
      <div class="card-body">
        <h5 class="card-title">Ricebox Ayam Saus Nanas</h5>
        <h8 class="card-text">Stok  : <?php echo $dataStokRiceboxSausNanas['stokRiceboxSausNanas']; ?></h8><br><br>
        <h8 class="card-text" style="font-weight: bold">Harga : Rp.<?php echo $dataHargaRiceboxSausNanas['hargaRiceboxSausNanas']; ?></h8>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="img/ricebox_ayam_sambal_matah.jpeg" class="card-img-top" alt="..." style="border-radius: 36px">
      <div class="card-body">
        <h5 class="card-title">Ricebox Ayam Sambal Matah</h5>
        <h8 class="card-text">Stok  : <?php echo $dataStokRiceboxSambalMatah['stokRiceboxSambalMatah']; ?></h8><br><br>
        <h8 class="card-text" style="font-weight: bold">Harga : Rp.<?php echo $dataHargaRiceboxSambalMatah['hargaRiceboxSambalMatah']; ?></h8>
      </div>
    </div>
  </div>

  <!-- Row Ketiga -->
  <div class="col">
    <div class="card h-100">
      <img src="img/ricebox_nasi_goreng_tongkoll.jpeg" class="card-img-top" alt="..." style="border-radius: 36px">
      <div class="card-body">
        <h5 class="card-title">Ricebox Nasi Goreng Tongkol</h5>
        <h8 class="card-text">Stok  : <?php echo $dataStokRiceboxTongkol['stokRiceboxTongkol']; ?></h8><br><br>
        <h8 class="card-text" style="font-weight: bold">Harga : Rp.<?php echo $dataHargaRiceboxTongkol['hargaRiceboxTongkol']; ?></h8>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="img/ricebox_tongkol_suwir_temurui.jpeg" class="card-img-top" alt="..." style="border-radius: 36px">
      <div class="card-body">
        <h5 class="card-title">Ricebox Tongkol Suwir Temurui</h5>
        <h8 class="card-text">Stok  : <?php echo $dataStokRiceboxTongkolSuwir['stokRiceboxTongkolSuwir']; ?></h8><br><br>
        <h8 class="card-text" style="font-weight: bold">Harga : Rp.<?php echo $dataHargaRiceboxTongkolSuwir['hargaRiceboxTongkolSuwir']; ?></h8>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="img/minuman_kunyit_citrus.jpeg" class="card-img-top" alt="..." style="border-radius: 36px">
      <div class="card-body">
        <h5 class="card-title">Minuman Kunyit Citrus</h5>
        <h8 class="card-text">Stok  : <?php echo $dataStokMinumanSitrus['stokMinumanSitrus']; ?></h8><br><br>
        <h8 class="card-text" style="font-weight: bold">Harga : Rp.<?php echo $dataHargaMinumanSitrus['hargaMinumanSitrus']; ?></h8>
      </div>
    </div>
  </div>

  <!-- Row Keempat -->
  <div class="col">
    <div class="card h-100">
      <img src="img/kurma_rempah.jpeg" class="card-img-top" alt="..." style="border-radius: 36px">
      <div class="card-body">
        <h5 class="card-title">Minuman Kurma Rempah</h5>
        <h8 class="card-text">Stok  : <?php echo $dataStokMinumanKurma['stokMinumanKurma']; ?></h8><br><br>
        <h8 class="card-text" style="font-weight: bold">Harga : Rp.<?php echo $dataHargaMinumanKurma['hargaMinumanKurma']; ?></h8>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="img/secang_riang.jpeg" class="card-img-top" alt="..." style="border-radius: 36px">
      <div class="card-body">
        <h5 class="card-title">Minuman Secang Riang</h5>
        <h8 class="card-text">Stok  : <?php echo $dataStokMinumanSecang['stokMinumanSecang']; ?></h8><br><br>
        <h8 class="card-text" style="font-weight: bold">Harga : Rp.<?php echo $dataHargaMinumanSecang['hargaMinumanSecang']; ?></h8>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="img/Telang_sejuk.jpeg" class="card-img-top" alt="..." style="border-radius: 36px">
      <div class="card-body">
        <h5 class="card-title">Minuman Telang Sejuk</h5>
        <h8 class="card-text">Stok  : <?php echo $dataStokMinumanSejuk['stokMinumanSejuk']; ?></h8><br><br>
        <h8 class="card-text" style="font-weight: bold">Harga : Rp.<?php echo $dataHargaMinumanSejuk['hargaMinumanSejuk']; ?></h8>
      </div>
    </div>
  </div>
</div>
<br>
<!-- Menu -->

      <!-- Footer -->
        <footer class="text-center text-dark mt-3 bt-2 pb-2"  style="background-color: white">
          Copyright © 2022 Catalyze Team    
        </footer> 
      <!-- Footer -->
      
     


      <script src="./js/bootstrap.bundle.min.js"></script>

</body>
</html>