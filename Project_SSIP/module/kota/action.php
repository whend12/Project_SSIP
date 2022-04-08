<?php

include_once("../../function/helper.php");
include_once("../../function/koneksi.php");

$kota = $_POST['kota'];
$tarif = $_POST['tarif'];
$status = $_POST['status'];
$button = $_POST['button'];
if ($button == "Add") {
    mysqli_query($koneksi, "INSERT into kota(kota,tarif,status) values('$kota','$tarif','$status')");
} else if ($button == "Update") {
    $kota_id = $_GET['kota_id'];

    mysqli_query($koneksi, "UPDATE kota set kota ='$kota',tarif = '$tarif',status = '$status' where kota_id='$kota_id'");
}

header("location:" . BASE_URL . "index.php?page=my_profile&module=kota&action=list");
