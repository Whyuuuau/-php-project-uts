<?php
    require "config.php";
    if (!isset($_GET['id']) || $_GET['id'] == null) header("location:index.php");

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id']) && $_GET['id'] != null) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM sulaiman WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $alamat = $_POST['address'];
        $phone_number = $_POST['phone_number'];
        $date = $_POST['date'];
        $item_type = $_POST['item_type'];
        $item_name = $_POST['item_name'];
        $item_number = $_POST['item_number'];
        $item_price = $_POST['item_price'];

        $sql = "UPDATE sulaiman SET 
                nama = '$name',
                alamat = '$alamat',
                hp = '$phone_number',
                tgl_transaksi = '$date',
                jenis_barang = '$item_type',
                nama_barang = '$item_name',
                jumlah = '$item_number',
                harga = '$item_price'
                WHERE ID = '$id'";
        $query = mysqli_query($conn, $sql);

        if ($query) header("location:index.php");

        echo "Something Went Wrong On The Update";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            .input-group-append {
                cursor: pointer;
            }
        </style>
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
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </nav>

        <!-- Begin page content -->
        <main class="flex-shrink-0">
            <div class="container">
                <h1 class="mt-5">Update Transaction Detail - Nama Pembeli</h1>
                <p class="lead">Transaction Detail</p>
                <div class="row pt-5">
                    <div class="col-12">
                        <form method="POST" action="update.php">
                            <?php while ($data = mysqli_fetch_array($query)) { ?>
                                <input type="hidden" name="id" value="<?= $data['id'] ?>" />
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" 
                                            name="name" readonly
                                            value="<?= $data['nama'] ?>"
                                            >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address" ><?= $data['alamat'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="number" class="form-control" 
                                            name="phone_number" 
                                            value="<?= $data['hp'] ?>"
                                            >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Transaction Date</label>
                                    <input type="date" class="form-control" name="date" value="<?= $data['tgl_transaksi'] ?>" >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Type of Item</label>
                                    <input type="text" name="item_type" class="form-control" value="<?= $data['jenis_barang'] ?>" >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Name of Item</label>
                                    <input type="text" name="item_name" class="form-control" value="<?= $data['nama_barang'] ?>" >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Number of Item</label>
                                    <input type="number" class="form-control" 
                                            name="item_number" 
                                            value="<?= $data['jumlah'] ?>"
                                            >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Price of Item</label>
                                    <input type="number" class="form-control" 
                                            name="item_price" 
                                            value="<?= $data['harga'] ?>"
                                            >
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" onclick="confirm('Are You Sure to Update?')" value="Update">
                                    <a href="index.php" class="btn btn-danger">Cancel</a>
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>