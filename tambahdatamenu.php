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
    <div class="container mt-5">
      <h3>Tambah Data Menu</h3>
    </div>
    <div class="container border border-1 mt-4">
      <form>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">No Menu</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword" />
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Nama Menu</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword" />
          </div>
        </div>
        <div class="mt-3 row">
            <label for="inputNP" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPassword" />
            </div>
          </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Id Order</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword" />
          </div>
        </div>
        <div class="mt-3 mb-3 row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Id Kategori</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword" />
          </div>
        </div>
        <style>
            .btn-success {
              width: 300px;
            }
            </style>
        <center>
        <button type="submit"  class="btn btn-success mb-3">Simpan</button>
        </center>
      </form>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
