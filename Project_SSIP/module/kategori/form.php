<?php
$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

$kategori = "";
$status = "";
$button = "Add";

if ($kategori_id) {
    $queryKategori = mysqli_query($koneksi, "SELECT * from kategori where kategori_id='$kategori_id'");
    $row = mysqli_fetch_assoc($queryKategori);

    $kategori = $row['kategori'];
    $status = "";
    $button = "Update";
}
?>
<form action="<?php echo BASE_URL . "module/kategori/action.php?kategori_id=$kategori_id"; ?>" method="POST">

    <div class="form-login">
        <label class="form-label">Kategori</label>
        <input type="text" name="kategori" value="<?php echo $kategori; ?>" class="form-control">
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