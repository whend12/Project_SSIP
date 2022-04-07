<?php
$kota_id = isset($_GET['kota_id']) ? $_GET['kota_id'] : false;

$kota = "";
$button = "Add";

if ($kota_id) {
    $queryKota = mysqli_query($koneksi, "SELECT * from kota where kota_id='$kota_id'");
    $row = mysqli_fetch_assoc($queryKota);

    $kota = $row['kota'];
    $button = "Update";
}
?>
<form action="<?php echo BASE_URL . "module/kota/action.php?kota_id=$kota_id"; ?>" method="POST">

    <div class="form-login">
        <label class="form-label">Kota</label>
        <input type="text" name="kota" value="<?php echo $kota; ?>" class="form-control">
    </div>
    <br>
    <input type="submit" name="button" value="<?php echo $button; ?>" class="btn btn-primary">
</form>