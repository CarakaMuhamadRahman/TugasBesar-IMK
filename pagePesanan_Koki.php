<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan</title>

    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- custom css -->
    <link rel="stylesheet" href="koki.css"> 

</head>
  <body>
    
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid custom-navbar1">
          <a class="navbar-brand judul-icon" href="#">
            <img src="img/logoo 1.png" alt="" width="55" height="55">
            ꦮꦫꦱ
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active menu-1" aria-current="page" href="#">Halo, Udin Saepu</a>
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
                  <button type="button" class="btn btn-dsh" style="width: 15rem">DASHBOARD</button>
                  <button type="button" class="btn btn-stk" style="width: 15rem">STOCK MENU</button>
                  <button type="button" class="btn btn-psn" style="width: 15rem">PESANAN</button>
                </div>
             </div>
            <div class="judul-1">Selamat Datang Di</div>
            <div class="login">
        </div>
            <div class="judul-2">Waras</div>
            
          </div>
      </div>
      <!-- jumbotron -->

      <!-- tabel pemesanan -->
      <div class="container-fluid">
        <div class="col-sm-12">
          <h5 class="judul3">PESANAN</h5>
          <button type="button" class="btn btn-primary btn-pesan">Cari</button>
          <table class="table table-bordered t-pemesanan">
            <thead>
              <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Menu</th>
                <th scope="col">Gambar</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah Pembelian</th>
                <th scope="col">Jumlah</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <!-- tabel pemesanan -->

      <script src="./js/bootstrap.bundle.min.js"></script>

</body>
</html>