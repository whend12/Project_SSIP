<?php

include_once("../../function/helper.php");
include_once("../../function/koneksi.php");

admin_only("kota", $level);
$button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
$kota_id = isset($_GET['kota_id']) ? $_GET['kota_id'] : "";

$kota = isset($_POST['kota']) ? $_POST['kota'] : "";
$tarif = isset($_POST['tarif']) ? $_POST['tarif'] : "";
$status = isset($_POST['status']) ? $_POST['status'] : "";

if ($button == "Add") {
    mysqli_query($koneksi, "INSERT into kota(kota,tarif,status) values('$kota','$tarif','$status')");
} else if ($button == "Update") {
    mysqli_query($koneksi, "UPDATE kota set kota ='$kota',tarif = '$tarif',status = '$status' where kota_id='$kota_id'");
} else if ($button == "Delete") {
    mysqli_query($koneksi, "DELETE from kota where kota_id='$kota_id'");
}

header("location:" . BASE_URL . "index.php?page=my_profile&module=kota&action=list");
