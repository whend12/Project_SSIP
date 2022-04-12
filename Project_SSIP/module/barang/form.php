<?php

$barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

$nama_barang = "";
$kategori_id = "";
$spesifikasi = "";
$gambar = "";
$stok = "";
$harga = "";
$status = "";
$keterangan_gambar = "";
$button = "Add";

if ($barang_id) {
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");
    $row = mysqli_fetch_assoc($query);

    $nama_barang = $row['nama_barang'];
    $kategori_id = $row['kategori_id'];
    $spesifikasi = $row['spesifikasi'];
    $harga = $row['harga'];
    $stok = $row['stok'];
    $status = $row['status'];
    $button = "Update";

    $keterangan_gambar = "(Klik pilih gambar jika ingin mengganti gambar disamping)";
    $gambar = "<img src='" . BASE_URL . "image/barang/$row[gambar]' style='width: 200px;vertical-align: middle;' />";
}

?>

<script src="<?php echo BASE_URL . "js/ckeditor/ckeditor.js"; ?>"></script>

<form action="<?php echo BASE_URL . "module/barang/action.php?barang_id=$barang_id"; ?>" method="POST" enctype="multipart/form-data">

    <div class="form-login">
        <label class="form-label">Kategori</label>
        <span>

            <select name="kategori_id" class="form-control">
                <?php
                $query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
                while ($row = mysqli_fetch_assoc($query)) {
                    if ($kategori_id == $row['kategori_id']) {
                        echo "<option value='$row[kategori_id]' selected='true'>$row[kategori]</option>";
                    } else {
                        echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
                    }
                }
                ?>
            </select>

        </span>
    </div>

    <div class="form-login">
        <label class="form-label">Nama Barang</label>
        <span><input type="text" class="form-control" name="nama_barang" value="<?php echo $nama_barang; ?>" /></span>
    </div>

    <div style="margin-bottom:10px" class="form-login">
        <label style="font-weight:bold" class="form-label">Spesifikasi</label>
        <span><textarea name="spesifikasi" class="form-control" id="editor"><?php echo $spesifikasi; ?></textarea></span>
    </div>

    <div class="form-login">
        <label class="form-label">Stok</label>
        <span><input type="text" class="form-control" name="stok" value="<?php echo $stok; ?>" /></span>
    </div>

    <div class="form-login">
        <label class="form-label">Harga</label>
        <span><input type="text" class="form-control" name="harga" value="<?php echo $harga; ?>" /></span>
    </div>

    <div class="form-login">
        <label class="form-label">Gambar Produk <?php echo $keterangan_gambar; ?></label>
        <span>
            <input type="file" class="form-control" name="file" /> <?php echo $gambar; ?>
        </span>
    </div>

    <div class="form-login">
        <label class="form-label">Status</label>
        <span>
            <input type="radio" name="status" value="on" <?php if ($status == "on") {
                                                                echo "checked='true'";
                                                            } ?> /> On
            <input type="radio" name="status" value="off" <?php if ($status == "off") {
                                                                echo "checked='true'";
                                                            } ?> /> Off
        </span>
    </div>

    <div class="form-login">
        <span><input type="submit" class="btn btn-primary" name="button" value="<?php echo $button; ?>" /></span>
    </div>

</form>

<script>
    // CKEDITOR.replace("editor");

    var roxyFileman = 'js/ckeditor/fileman/index.html';
    $(function() {
        CKEDITOR.replace('editor', {
            filebrowserBrowseUrl: roxyFileman,
            filebrowserImageBrowseUrl: roxyFileman + '?type=image',
            removeDialogTabs: 'link:upload;image:upload'
        });
    });
</script>