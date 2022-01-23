<?php 
include_once("koneksi.php");

	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if (!isset($_SESSION['nama_pengguna'])) {
        header('location:login.php?pesan=gagal');
    }
	?>
<?php
// Display selected user data based on id
// Getting id from url
$no_menu = $_GET['no_menu'];
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM menu WHERE no_menu='$no_menu'");

while ($user_data = mysqli_fetch_array($result)) {

    $nama_menu = $user_data['nama_menu'];
    $harga = $user_data['harga'];
    $stok = $user_data['stok'];
    $id_order = $user_data['id_order'];
    $id_kategori = $user_data['id_kategori'];
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

    <title>Koki | Waras</title>
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
        <div style="color: white;"><?php echo $_SESSION['nama_pengguna'] ?></div>
      </div>
    </nav>
    <div class="container mt-5">
      <h3>Ubah Data Menu</h3>
    </div>
    <div class="container border border-1 mt-4">
      <form method="post" action="">
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">No</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="no_menu" value="<?php echo $no_menu; ?>" disabled>
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Nama Menu</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword"  name="nama_menu" value="<?php echo $nama_menu; ?>" disabled>
          </div>
        </div>
        <div class="mt-3 row">
            <label for="inputNP" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
              <input type="text" class="form-control"  name="harga" value="<?php echo $harga; ?>" disabled>
            </div>
          </div>
        <div class="mt-3 mb-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Stok</label>
          <div class="col-sm-10">
          <input type="text" class="form-control"  name="stok" value="<?php echo $stok; ?>"/>
          </div>
        </div>
        <div class="mt-3 mb-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Id Order</label>
          <div class="col-sm-10">
          <input type="text" class="form-control"  name="id_order" value="<?php echo $id_order; ?>" disabled>
          </div>
        </div>
        <div class="mt-3 mb-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Id Kategori</label>
          <div class="col-sm-10">
          <input type="text" class="form-control"  name="id_kategori" value="<?php echo $id_kategori; ?>" disabled>
          </div>
        </div>

        <style>
            .btn-success {
              width: 300px;
            }
            </style>
        <center>
        <input class="btn btn-success" type="submit" name="update" value="update"></td>
        </center>
        <?php 
                                if(isset($_POST['update']))
                                {
                                    $nama_menu = $_POST['nama_menu'];
                                    $harga = $_POST['harga'];
                                    $stok = $_POST['stok'];
                                    $id_order = $_POST['id_order'];
                                    $id_kategori = $_POST['id_kategori'];

                                    // update user data
                                    $result = mysqli_query($koneksi, "UPDATE `menu` SET `stok`='$stok' WHERE `no_menu`='$no_menu'");

                                    // Redirect to homepage to display updated user in list
                                    header("Location: kelolaStokMenu_Koki.php");
                                }                   
                                
                            ?>
      </form>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
