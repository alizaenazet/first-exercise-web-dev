<?php include_once('menu_resto.php')?>
<?php
  session_start();
  $isSessionNotEmpety = isset($_SESSION['listOfMenu']) && is_array($_SESSION['listOfMenu']) && count($_SESSION['listOfMenu']) > 0;
  $listOfMenus = $isSessionNotEmpety == 1 ? $_SESSION['listOfMenu'] : false;

  if (isset($_GET['delete'])) {
    $deletedMenu = $_GET['delete'];
    switch ($deletedMenu) {
      case 'all':
        session_unset();
        header("Location: dashboard.php");
        break;
      
      default:
        hapusMenu($deletedMenu);
        header("Location: dashboard.php");
        break;
    }
  }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">
    <div>
    <h1>Dashboard page</h1>
      <a href="http://localhost:8080/form_menu.php">
      <button type="button" class="btn btn-success">Add new menu</button>
      </a>
      <a href='?delete=all'>
      <button type='button' class='btn btn-danger'>Delete all menu</button>
      </a> 
    </div>
    <div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col"><h3>menu</h3></th>
      <th scope="col"><h3>harga</h3></th>
      <th scope="col"><h3>deskripsi</h3></th>
      <th scope="col">   </th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  <?php
      if ($listOfMenus === false) {
        echo "<tr>";
        echo "<h3>Menu tidak tersedia </h3>";
        echo "</tr>";
      }else{
         foreach($listOfMenus as $tempMenu){
    $tempNama = $tempMenu->getName();
    $tempHarga = $tempMenu->getHarga();
    $tempDeskripsi = $tempMenu->getDeskripsi();
  echo "<tr>
  <th scope='row'>$tempNama</th>
  <td>$tempHarga</td>
  <td>$tempDeskripsi</td>
  <td><a href='?delete=$tempNama'>
  <button type='button' class='btn btn-danger'>Success</button>
  </a></td>
  </tr>";
  }
      }
      
    ?>  
  </tbody>
</table>
  </div>
</html>