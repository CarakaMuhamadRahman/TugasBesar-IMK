<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelayan</title>

    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- custom css -->
    <link rel="stylesheet" href="style.css"> 

</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid custom-navbar">
          <a class="navbar-brand judul-logo" href="#">
            <img src="./img/logo_waras.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
            ꦮꦫꦱ
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active menu-1" aria-current="page" href="aboutus.html">about us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link menu-2" href="login.html">Login</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <!-- navbar -->

      <!-- jumbotron -->
      <div id="jumbotron">
          <div class="col-sm-12">
            <img src="./img/dashboard_pelayan.png" class="img-fluid dashboard-pelayan" alt="...">
            <div class="judul1">Selamat Datang Di</div>
            <div class="judul2">Waras</div>
          </div>
      </div>
      <!-- jumbotron -->

      <!-- tabel pemesanan -->
      <div class="container-fluid">
        <div class="col-sm-12">
          <h5 class="judul3">Pemesanan</h5>
          <button type="button" class="btn btn-primary btn-pesan">Pesan</button>
          <table class="table table-bordered t-pemesanan">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Menu</th>
                <th scope="col">Gambar</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
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