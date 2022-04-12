<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

<body>
    <?php
    $barang_id = $_GET['barang_id'];

    $query = mysqli_query($koneksi, "SELECT * from barang where status ='on' and barang_id='$barang_id'");
    $row = mysqli_fetch_assoc($query);

    echo "<div class='container py-5'>
            <div class='row py-5'>
                <div class='container-fluid'>
                    <div class='row'>
                      <div class='col-lg-4'>
                        <form action='" . BASE_URL . "index.php'>
                          <button class='btn-detail'><i class='bi bi-arrow-left-circle'></i>Back</button>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
            <div class='row pt-5'>
                <div class='card mb-3'>
                    <div class='row g-0'>
                        <div class='col-md-4'>
                            <img src='" . BASE_URL . "image/barang/$row[gambar]' class='img-fluid rounded-start' alt='...'>
                        </div>
                        <div class='col-md-8'>
                            <div class='card-body'>
                                <h5 class='card-title'>$row[nama_barang]</h5>
                                <table class='table'>
                                    <tbody>
                                        <tr>
                                            <th scope='row'>Product Name</th>
                                            <td>:</td>
                                            <td>$row[nama_barang]</td>
                                        </tr>
                                        <tr>
                                            <th scope='row'>Size</th>
                                            <td>:</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <th scope='row'>Price</th>
                                            <td>:</td>
                                            <td>" . rupiah($row['harga']) . "</td>
                                        </tr>
                                        <tr>
                                        <th scope='row'>Details</th>
                                        <td>:</td>
                                        <td>
                                            $row[spesifikasi]
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>