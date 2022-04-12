<?php

include_once("function/helper.php");
include_once("function/koneksi.php");

session_start();

$nama_penerima = $_POST['nama_penerima'];
$email_penerima = $_POST['email_penerima'];
$nomor_telepon = $_POST['nomor_telepon'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota_penerima'];

$user_id = $_SESSION['user_id'];
$waktu_saat_ini = date("Y-m-d H:i:s");

$query = mysqli_query($koneksi, "INSERT INTO pesanan (nama_penerima,user_id,email_penerima,nomor_telepon,alamat,kota_id,tanggal_pemesanan,status) 
                                values('$nama_penerima','$user_id','$email_penerima','$nomor_telepon','$alamat','$kota','$waktu_saat_ini',0)");
if ($query) {
    $last_pesanan_id = mysqli_insert_id($koneksi);

    $keranjang = $_SESSION["keranjang"];

    foreach ($keranjang as $key => $value) {
        $barang_id = $key;
        $quantity = $value['quantity'];
        $harga = $value['harga'];

        mysqli_query($koneksi, "INSERT into pesanan_detail(pesanan_id,barang_id,quantity,harga)
                                            values('$last_pesanan_id','$barang_id','$quantity','$harga')");
    }
    unset($_SESSION["keranjang"]);

    header("location:" . BASE_URL . "index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$last_pesanan_id");
}
