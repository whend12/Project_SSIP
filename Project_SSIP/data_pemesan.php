<?php
if ($user_id == false) {
    $_SESSION["proses_pesanan"] = true;

    header("location:" . BASE_URL . "login.html");
    exit;
}
?>
<div class="container py-5">
    <div id="frame-data-pengiriman">
        <h3 class="label-data-pengiriman">Detail Order</h3>

        <div id="frame-detail-order">

            <table class="table-list">
                <tr>
                    <th class='kiri'>Nama Barang</th>
                    <th class='tengah'>Qty</th>
                    <th class='kanan'>Total</th>
                </tr>

                <?php
                $subtotal = 0;
                foreach ($keranjang as $key => $value) {

                    $barang_id = $key;

                    $nama_barang = $value['nama_barang'];
                    $harga = $value['harga'];
                    $quantity = $value['quantity'];

                    $total = $quantity * $harga;
                    $subtotal = $subtotal + $total;

                    echo "<tr>
							<td class='kiri'>$nama_barang</td>
							<td class='tengah'>$quantity</td>
							<td class='kanan'>" . rupiah($total) . "</td>
						</tr>";
                }
                echo "<tr>
						<td colspan='2' class='kanan'><b>Sub Total</b></td>
						<td class='kanan'><b>" . rupiah($subtotal) . "</b></td>
					 </tr>";

                ?>

            </table>

        </div>

    </div>

    <div id="frame-data-detail">
        <h3 class="label-data-pengiriman">Alamat Pengiriman Barang</h3>

        <div id="frame-form-pengiriman">

            <form action="<?php echo BASE_URL . "proses_pesanan.php"; ?>" method="POST">

                <div class="form-login">
                    <label class="form-label">Nama Penerima</label>
                    <span><input class="form-control" type="text" name="nama_penerima" /></span>
                </div>

                <div class="form-login">
                    <label class="form-label">Email Penerima</label>
                    <span><input class="form-control" type="text" name="email_penerima" /></span>
                </div>

                <div class="form-login">
                    <label class="form-label">Nomor Telepon</label>
                    <span><input class="form-control" type="text" name="nomor_telepon" /></span>
                </div>

                <div class="form-login">
                    <label class="form-label">Alamat Pengiriman</label>
                    <span><textarea class="form-control" name="alamat"></textarea></span>
                </div>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM kota");
                ?>
                <div class="form-login">
                    <label class="form-label">Kota</label>
                    <select class="form-control" name="kota_penerima">
                        <?php
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo "<option value='$row[kota_id]'>$row[kota] (" . rupiah($row['tarif']) . ")</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>
                <div class="form-login">
                    <span><input class="btn btn-primary" type="submit" value="submit" /></span>
                </div>

            </form>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>