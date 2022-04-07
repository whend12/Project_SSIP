<?php

include_once("../../function/helper.php");
include_once("../../function/koneksi.php");

$kota = $_POST['kota'];
$button = $_POST['button'];
if ($button == "Add") {
    mysqli_query($koneksi, "INSERT into kota(kota) values('$kota')");
} else if ($button == "Update") {
    $kota_id = $_GET['kota_id'];

    mysqli_query($koneksi, "UPDATE kota set kota ='$kota' where kota_id='$kota_id'");
}

header("location:" . BASE_URL . "index.php?page=my_profile&module=kota&action=list");