 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
 <div class="py-5">
     <?php
        if ($totalBarang == 0) {
            echo "<h3>Saat ini belum ada data di dalam keranjang belanja anda</h3>";
        } else {

            $no = 1;

            echo "<table class='table-list'>
				<tr class='baris-title'>
					<th class='tengah'>No</th>
					<th class='kiri'>Image</th>
					<th class='kiri'>Nama Barang</th>
					<th class='tengah'>Qty</th>
					<th class='kanan'>Harga Satuan</th>
					<th class='kanan'>Total</th>
					<th class='kanan'>Action</th>
				</tr>";

            $subtotal = 0;
            foreach ($keranjang as $key => $value) {
                $barang_id = $key;

                $nama_barang = $value["nama_barang"];
                $quantity = $value["quantity"];
                $gambar = $value["gambar"];
                $harga = $value["harga"];

                $total = $quantity * $harga;
                $subtotal = $subtotal + $total;

                echo "<tr>
					<td class='tengah'>$no</td>
					<td class='kiri'><img src='" . BASE_URL . "image/barang/$gambar' height='100px' /></td>
					<td class='kiri'>$nama_barang</td>
					<td class='tengah'><input type='text' name='$barang_id' value='$quantity' class='update-quantity' /></td>
					<td class='kanan'>" . rupiah($harga) . "</td>
					<td class='kanan'>" . rupiah($total) . "</td>
					<td class='kanan hapus_item'><a href='" . BASE_URL . "hapus_item.php?barang_id=$barang_id'>DELETE</a></td>
				</tr>";

                $no++;
            }

            echo "<tr>
				<td colspan='5' class='kanan'><b>Sub Total</b></td>
				<td class='kanan'><b>" . rupiah($subtotal) . "</b></td>
			  </tr>";

            echo "</table>";

            echo "<div id='frame-button-keranjang'>
				<a id='lanjut-belanja' href='" . BASE_URL . "index.php'>< Lanjut Belanja</a>
				<a id='lanjut-pemesanan' href='" . BASE_URL . "data_pemesan.html'>Lanjut Pemesanan ></a>
			  </div>";
        }

        ?>
     <script>
         $(".update-quantity").on("input", function(e) {
             var barang_id = $(this).attr("name");
             var value = $(this).val();

             $.ajax({
                     method: "POST",
                     url: "update_keranjang.php",
                     data: "barang_id=" + barang_id + "&value=" + value
                 })
                 .done(function(data) {
                     var json = $.parseJSON(data);
                     if (json.status == true) {
                         location.reload();
                     } else {
                         alert(json.pesan);
                         location.reload();
                     }
                 })
         });
     </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>