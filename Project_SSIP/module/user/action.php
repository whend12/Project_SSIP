<?php

include_once("../../function/koneksi.php");
include_once("../../function/helper.php");

$level = $_POST['level'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$phone = $_POST['phone'];
$status = $_POST['status'];

$user_id = $_GET['user_id'];

mysqli_query($koneksi, "UPDATE user SET 		level = '$level',
	 											nama = '$nama',
	 											email = '$email',
	 											alamat = '$alamat',
	 											phone = '$phone',
	 											status = '$status' 
												WHERE user_id = '$user_id'");

header("location:" . BASE_URL . "index.php?page=my_profile&module=user&action=list");
