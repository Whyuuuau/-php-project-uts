<?php
  require "config.php";

  // METHOD GET
  $pagination = 5;
  $page = (isset($_GET['page'])) ? $page = $_GET['page'] : 1;
  $position = ($page == 1) ? 0 : ($page - 1) * $pagination;

  $dmlNoPagination = "SELECT id, nama, hp, nama_barang, harga, jumlah*harga as total_bayar FROM sulaiman";
  $queryNoPagination = mysqli_query($conn, $dmlNoPagination);
  $rows = mysqli_num_rows($queryNoPagination);
  $pages = ceil($rows/$pagination);

  $dmlDefault = "SELECT id, nama, hp, nama_barang, harga, jumlah*harga as total_bayar FROM sulaiman LIMIT $position, $pagination";
  $queryDefault = mysqli_query($conn, $dmlDefault);

  if (isset($_GET['searchBtn'])) {
    $field = $_GET['attribute'];
    $search = $_GET['search'];
    
    $dmlSearch = "SELECT id, nama, hp, nama_barang, harga, jumlah*harga as total_bayar FROM sulaiman WHERE $field LIKE '%$search%'";
    $querySearch = mysqli_query($conn, $dmlSearch);
    $rows = mysqli_num_rows($querySearch);
    $pages = ceil($rows/$pagination);
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css"> 
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">Home</a>
              <a class="nav-link" href="create.php">Create</a>
              <form class="d-flex" method="get" action="index.php">
                <select name="attribute" id="attribute" class="form-control me-2">
                  <option value="id" selected>ID</option>
                  <option value="nama">Nama</option>
                </select>
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit" name="searchBtn">Search</button>
              </form>
            </div>
          </nav>

          <!-- Page Content -->
          <div class="container">
            <br><br><br>
              <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Telpon</th>
                        <th>Barang</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Detail</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                  <?php while ($data = (isset($_GET['searchBtn'])) ? mysqli_fetch_array($querySearch) : mysqli_fetch_array($queryDefault)) { ?>
                    <form>
                        <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['hp'] ?></td>
                            <td><?= $data['nama_barang'] ?></td>
                            <td><?= $data['harga'] ?></td>
                            <td><?= $data['total_bayar'] ?></td>
                            <td><a href="show.php?id=<?= $data['id'] ?>" class="btn btn-success">Detail</a></td>
                            <td><a href="update.php?id=<?= $data['id'] ?>" class="btn btn-primary">Update</a></td>
                            <td><a href="delete.php?id=<?= $data['id'] ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    </form>
                  <?php } ?>
                </tbody>
              </table>
              <br>
              <ul class="pagination">
                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                  <li class="page-item"><a class="page-link" href="<?php echo ($i != $page) ? "index.php?page=" . $i : "#" ?>"><?= $i ?></a></li>
                <?php } ?>
              </ul>
          </div>
    </body>
</html>