<?php
$kota_id = isset($_GET['kota_id']) ? $_GET['kota_id'] : false;

$kota = "";
$tarif = "";
$status = "";
$button = "Add";

if ($kota_id) {
    $queryKota = mysqli_query($koneksi, "SELECT * from kota where kota_id='$kota_id'");
    $row = mysqli_fetch_assoc($queryKota);

    $kota = $row['kota'];
    $tarif = $row['tarif'];
    $status = $row['status'];
    $button = "Update";
}
?>
<form action="<?php echo BASE_URL . "module/kota/action.php?kota_id=$kota_id"; ?>" method="POST">

    <div class="form-login">
        <label class="form-label">Kota</label>
        <input type="text" required name="kota" value="<?php echo $kota; ?>" class="form-control">
    </div>
    <div class="form-login">
        <label class="form-label">Tarif</label>
        <input type="text" required name="tarif" value="<?php echo $tarif; ?>" class="form-control">
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
    <br>
    <input type="submit" name="button" value="<?php echo $button; ?>" class="btn btn-primary">
</form>