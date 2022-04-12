<?php

$pesanan_id = $_GET['pesanan_id'];

?>

<table class="table-list">
    <form action="<?php echo BASE_URL . "module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST">
        <div class="form-login">
            <label class="form-label">Nomor Rekening</label>
            <span><input class="form-control" type="text" name="nomor_rekening" /></span>
        </div>
        <div class="form-login">
            <label class="form-label">Nama Account</label>
            <span><input class="form-control" type="text" name="nama_account" /></span>
        </div>
        <div class="form-login">
            <label class="form-label">Tanggal Transfer (Format : yyyy-mm-dd)</label>
            <span><input class="form-control" type="text" name="tanggal_transfer" /></span>
        </div>
        <br>
        <div class="form-login">
            <span><input type="submit" class="btn btn-primary" value="Konfirmasi" name="button" /></span>
        </div>
    </form>
</table>