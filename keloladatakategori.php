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
        handrian
      </div>
    </nav>
    <div class="container">
      <h1 class="mt-5">Kelola Data Kategori</h1>

      <table class="table table-bordered">
        <tr>
          <th colspan="7">Tabel Data Kategori</th>
        </tr>
        <tr>
          <td>
            <table class="table table-bordered">
              <br />
              <div class="position-relative">
                <a href="tambahdatakategori.php">
                  <button class="btn btn-success position-absolute top-0 start-0">
                    Tambah Kategori
                  </button>
                </a>
                <div class="input-group-sm position-absolute top-0 end-0">
                  <button
                    class="btn btn-success"
                    type="button"
                    id="button-addon1"
                  >
                    Cari
                  </button>

                  <input
                    type="text"
                    name="cari"
                    id="cari"
                    placeholder="masukan"
                  />
                </div>
              </div>

              <br />
              <br />
              <br />

              <tr>
                <th>No Menu</th>
                <th>Nama Menu</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
              </tr>
              <tr>
                <td>01</td>
                <td>nasgor</td>
                <td>makanan</td>
                <td></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
