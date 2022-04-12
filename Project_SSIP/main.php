<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

<body>
    <section class="main py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6 py-5">
                    <p>April Collection</p>
                    <h1>Discover Your Style in 2022</h1>
                    <form action="#all-product">
                        <button class="btn-shop mt-3" type="submit">Shop Now</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="all-product">
        <div class="container">
            <div class="py-3 pr-3" id="kiri">

                <?php

                echo kategori($kategori_id);

                ?>

            </div>

            <div class="py-3" id="kanan">
                <div id="frame-barang">
                    <ul>
                        <?php
                        if ($kategori_id) {
                            $kategori_id = "AND barang.kategori_id = '$kategori_id'";
                        }
                        $query = mysqli_query($koneksi, "SELECT barang.*,kategori.kategori from barang join kategori on barang.kategori_id=kategori.kategori_id where barang.status='on' 
                            $kategori_id ORDER BY rand() desc limit 9");


                        $no = 1;
                        while ($row = mysqli_fetch_assoc($query)) {

                            $kategori = strtolower($row["kategori"]);
                            $nama_barang = strtolower($row["nama_barang"]);
                            $nama_barang = str_replace(" ", "-", $nama_barang);

                            $style = false;
                            if ($no == 3) {
                                $style = "style='margin-right:0px'";
                                $no = 0;
                            }
                            echo "<li $style>
							<p class='price'>" . rupiah($row['harga']) . "</p>
							<a href='" . BASE_URL . "$row[barang_id]/$kategori/$nama_barang.html'>
								<img src='" . BASE_URL . "image/barang/$row[gambar]' />
							</a>
							<div class='keterangan-gambar'>
								<p><a href='" . BASE_URL . "$row[barang_id]/$kategori/$nama_barang.html'>$row[nama_barang]</a></p>
								<span>Stok : $row[stok]</span>
							</div>
							<div class='button-add-cart'>
								<a href='" . BASE_URL . "tambah_keranjang.php?barang_id=$row[barang_id]'>+ add to cart</a>
							</div>";

                            $no++;
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>