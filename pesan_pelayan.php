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
    <link rel="stylesheet" href="pelayan.css"> 

    <title>Koki | Waras</title>

    <?php
    include_once("koneksi.php");

    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $result = mysqli_query($koneksi, "SELECT no_order, jumlah, status, nama_menu FROM pesanan, menu WHERE pesanan.no_menu=menu.no_menu AND no_order like'%" . $cari . "%'");
    } else {
        $result = mysqli_query($koneksi, "SELECT no_order, jumlah, status, nama_menu FROM pesanan, menu WHERE pesanan.no_menu=menu.no_menu ORDER BY no_order ASC");
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
                  <a href = "#pesan_pelayan" class="btn btn-psnplyn" style="width: 15rem">PESANAN</a>
                </div>
            </div>
            <div class="judul-1">Selamat Datang Di</div>
            <div class="login">
        </div>
            <div class="judul-2">Waras</div>
            
          </div>
          
      
      <!-- tabel pemesanan -->
      <div class="container" id="pesan_pelayan">
      <h1 class="mt-5" id="menu">Pesanan</h1>

      <table class="table table-bordered">
        <tr>
          <th colspan="7">Tabel Pesanan</th>
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
                          <a href="tambahadatapesanan.php" class="btn btn-success"> Pesan</a>
                        </div>
                    </div>
                </form>
                </div>
              </div>

              <br />
              <br />
              <br />

              <tr style="text-align:center">
                <th>No Order</th>
                <th>jumlah</th>
                <th>status</th>
                <th>Nama Menu</th>
              </tr>
              <?php
                    $no = 1;
                    while ($user_data = mysqli_fetch_array($result)) {
                    ?>
              <tr style="text-align:center">
                <td><?php echo $user_data['no_order']; ?></td>
                <td><?php echo $user_data['jumlah']; ?></td>
                <td><?php echo $user_data['status']; ?></td>
                <td><?php echo $user_data['nama_menu']; ?></td>
                
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
      <br><br>

      <!-- Footer -->
      <footer class="text-center text-dark mt-3 bt-2 pb-2"  style="background-color: white">
          Copyright © 2022 Catalyze Team    
        </footer> 
      <!-- Footer -->

      </div>
      <!-- jumbotron -->



      <script src="./js/bootstrap.bundle.min.js"></script>

</body>
</html>