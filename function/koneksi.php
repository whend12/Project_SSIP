<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "project_ssip";

$koneksi = mysqli_connect($server, $username, $password, $database) or die("Koneksi ke database gagal");
