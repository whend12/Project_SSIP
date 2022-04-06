<?php

include_once("function/koneksi.php");
include_once("function/helper.php");

$level = "customer";
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];

unset($_POST["password"]);
$dataForm = http_build_query($_POST);

$query = mysqli_query($koneksi, "SELECT * from user where email ='$email'");

if (empty($nama_lengkap) || empty($email) || empty($alamat) || empty($phone) || empty($password)) {
    header("location: " . BASE_URL . "index.php?page=register&notif=require&$dataForm");
} elseif (mysqli_num_rows($query) == 1) {
    header("location: " . BASE_URL . "index.php?page=register&notif=email&$dataForm");
} else {
    $password = md5($password);
    mysqli_query($koneksi, "INSERT INTO user (level, nama, email, alamat, phone, password)
										VALUES ('$level', '$nama_lengkap', '$email', '$alamat', '$phone', '$password')");
    header("location: " . BASE_URL . "index.php?page=login");
}
