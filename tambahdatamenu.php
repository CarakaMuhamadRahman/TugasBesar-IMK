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
        $result = mysqli_query($koneksi, "SELECT * FROM menu where nama_menu like'%" . $cari . "%'");
    } else {
        $result = mysqli_query($koneksi, "SELECT * FROM menu ORDER BY nama_menu ASC");
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
    <div class="container mt-5">
      <h3>Tambah Data Menu</h3>
    </div>
    <?php 
                if(isset($_POST['tombol']))
                {
                    $no_menu = $_POST['no_menu'];
                    $nama_menu = $_POST['nama_menu'];
                    $harga = $_POST['harga'];
                    $id_kategori = $_POST['id_kategori'];
                    mysqli_query($koneksi,"insert into menu (no_menu,nama_menu,harga,id_kategori) values ('$no_menu','$nama_menu','$harga','$id_kategori')");
                    header("location:keloladatamenu.php");
                  }                   
                
            ?>
    <div class="container border border-1 mt-4">
      <form method="POST">
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">No Menu</label>
          <div class="col-sm-10">
          <input type="text" class="form-control"  name="no_menu" />
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Nama Menu</label>
          <div class="col-sm-10">
          <input type="text" class="form-control"  name="nama_menu" />
          </div>
        </div>
        <div class="mt-3 row">
            <label for="inputNP" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
            <input type="text" class="form-control"  name="harga"/>
            </div>
          </div>
          <!-- <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Id Kategori</label>
          <div class="col-sm-10">
            <input type="text" class="form-control"  name="id_kategori"/>
          </div>
        </div> -->
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Menu Kategori</label>
          <div class="col-sm-10">
          <select name="id_kategori" >
                <option disabled selected> Pilih </option>
              <?php 
                $sql=mysqli_query($koneksi, "SELECT * FROM menu_kategori ");

                while ($data=mysqli_fetch_array($sql)) {
              ?>
                <option value="<?=$data['id_kategori']?>"><?=$data['nama_kategori']?></option> 
              <?php
                }
              ?>
                </select>
          </div>
        </div>
       
        <style>
            .btn-success {
              width: 300px;
            }
            </style>
        <center>
        <td><input class="btn btn-success mb-3" type="submit" name="tombol" value="Tambah"></td>
        </center>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
