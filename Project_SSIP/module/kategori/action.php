<?php

include_once("../../function/helper.php");
include_once("../../function/koneksi.php");

$kategori = $_POST['kategori'];
$button = $_POST['button'];
if ($button == "Add") {
    mysqli_query($koneksi, "INSERT into kategori(kategori) values('$kategori')");
} else if ($button == "Update") {
    $kategori_id = $_GET['kategori_id'];

    mysqli_query($koneksi, "UPDATE kategori set kategori ='$kategori' where kategori_id='$kategori_id'");
}

header("location:" . BASE_URL . "index.php?page=my_profile&module=kategori&action=list");
