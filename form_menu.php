<?php session_start();
include'menu_resto.php';
?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="ort" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">
    


    <form method="POST">
      <h2>Tambah menu </h2><?php if(isset($_POST['addMenu'])) {
            $nama = $_POST['namaHidangan'];
            $harga = $_POST['harga'];
            $deskripsi = $_POST['deskripsi'];
          if(addMenu($nama,$harga,$deskripsi)){
            header("Location: index.php");
            exit;
          }else{
            $failAddMessage = '<p>Pastikan nama menu belum terdaftar dan tidak ada salah input <p> <br/> <br/>' ;
          }
        }?><div class="mb-3">
        <?php if (isset($failAddMessage)) {
          echo "<p>".$failAddMessage. "</p>";
        }?><label for="inputNamaHidangan" class="form-label">Nama hidangan</label>
        <input  class="form-control" id="inputNamaHidangan" name="namaHidangan"  >
        <div id="emailHelp" class="form-text">Nama hidangan tidak boleh duplikasi</div>
      </div>
      
      <div class="mb-3">
        <label for="inputHarga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="inputHarga" name="harga" >
      </div>
      
      <div class="mb-3">
        <label for="inputDeskripsi" class="form-label">Deskripsi</label>
        <input  class="form-control" id="inputDeskripsi" name="deskripsi" >
      </div>
      <button type="submit" name="addMenu" class="btn btn-primary">Tambah</button>


    </form>
    
  </body>
</html>
