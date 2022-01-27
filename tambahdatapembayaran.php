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
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet" />

    <!-- custom css -->
    <link rel="stylesheet" href="style.css" />

    <title>Admin | Waras</title>
    <?php
    include_once("koneksi.php");

    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $result = mysqli_query($koneksi, "SELECT * FROM pembayaran where no_nota like'%" . $cari . "%'");
    } else {
        $result = mysqli_query($koneksi, "SELECT * FROM pembayaran ORDER BY no_nota ASC");
    }
    ?>
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
    <div class="container mt-5">
      <h3>Tambah data pengguna</h3>
    </div>
    <?php 
                if(isset($_POST['tombol']))
                {
                    $no_nota = $_POST['no_nota'];
                    $tanggal = $_POST['tanggal'];
                    $tanggal = date('d F Y', strtotime($tanggal));
                    
                    $id_order = $_POST['id_order'];
                    mysqli_query($koneksi,"insert into pembayaran (no_nota,tanggal,id_order) values ('$no_nota','$tanggal','$id_order')");
                    header("location:pembayarankasir.php");
                  }                   
                
            ?>
    <div class="container border border-1 mt-4">
      <form method="POST">
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">no Nota</label>
          <div class="col-sm-10">
            <input type="text" class="form-control"  name="no_nota" />
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">tanggal</label>
          <div class="col-sm-10">
            <input type="text" class="form-control"  name="tanggal" />
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Id Order</label>
          <div class="col-sm-10">
          <select name="id_order" >
                <option disabled selected> Pilih </option>
              <?php 
                $sql=mysqli_query($koneksi, "SELECT * FROM pesanan ");

                while ($data=mysqli_fetch_array($sql)) {
              ?>
                <option value="<?=$data['id_order']?>"><?=$data['id_order']?> - <?=$data['status']?></option> 
              <?php
                }
              ?>
                </select>
          </div>
        </div>
        
        <td><input class="btn-outline-warning" type="submit" name="tombol" value="Tambah"></td>
        <!-- <button type="submit" class="btn btn-success mb-3">Simpan</button> -->
      </form>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
