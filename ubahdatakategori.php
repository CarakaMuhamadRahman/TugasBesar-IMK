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
$id_kategori = $_GET['id_kategori'];
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM menu_kategori WHERE id_kategori='$id_kategori'");

while ($user_data = mysqli_fetch_array($result)) {

    $nama_kategori = $user_data['nama_kategori'];
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
  </head>
  <body>
    <nav class="navbar navbar-dark nav-admin">
      <div class="container-fluid" height="40">
        <a class="navbar-brand" href="keloladatakategori.php">
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
      <h3>Ubah Data Kategori</h3>
    </div>
    <div class="container border border-1 mt-4">
    <form method="post" action="">
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">No Kategori</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" name="id_kategori" value="<?php echo $id_kategori; ?>" disabled>
          </div>
        </div>
        <div class="mt-3 row">
            <label for="inputNP" class="col-sm-2 col-form-label">Nama Kategori Menu</label>
            <div class="col-sm-10">
            <input type="text" class="form-control"   name="nama_kategori" value="<?php echo $nama_kategori; ?>" />
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
                                    $nama_kategori = $_POST['nama_kategori'];

                                    // update user data
                                    $result = mysqli_query($koneksi, "UPDATE `menu_kategori` SET `id_kategori`='$id_kategori',`nama_kategori`='$nama_kategori' WHERE `id_kategori`='$id_kategori'");

                                    // Redirect to homepage to display updated user in list
                                    header("Location: keloladatakategori.php");
                                }                   
                                
                            ?>
      </form>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
