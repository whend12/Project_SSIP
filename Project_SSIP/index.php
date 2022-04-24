<?php
session_start();

include_once("function/koneksi.php");
include_once("function/helper.php");

$page = isset($_GET['page']) ? $_GET['page'] : false;
$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
$totalBarang = count($keranjang);

if ($user_id) {
  $module = isset($_GET['module']) ? $_GET['module'] : false;
  $action = isset($_GET['action']) ? $_GET['action'] : false;
  $mode = isset($_GET['mode']) ? $_GET['mode'] : false;
}
// else {
//   header("location:" . BASE_URL . "index.php?page=login");
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="logo.png">
  <title>Project SSIP</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?php echo BASE_URL . "css/style1.css" ?>" />
  <link rel="stylesheet" href="<?php echo BASE_URL . "css/fontawesome-free-6.1.0-web/css/all.min.css" ?>" />
  <script src="<?php echo BASE_URL . "js/jquery-3.1.1.min.js"; ?>"></script>
  <script src="<?php echo BASE_URL . "js/Slides-SlidesJS-3/source/jquery.slides.min.js"; ?>"></script>
  <script src="<?php echo BASE_URL . "js/script.js"; ?>"></script>

  </script>

</head>

<body>
  <!--navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-color pb-3 ">
    <div class="container">
      <a class="navbar-brand" href="<?php echo BASE_URL . "index.php"; ?> "><img src="image/logo.png">Pin Shop</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
          <!--<li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  Dropdown
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Disabled</a>
              </li>-->
        </ul>
        <?php
        if ($user_id) {
          echo "Hi,<b>$nama</b>
            <ul class='navbar-nav'>
            <li class='nav-item dropdown'>
              <a
                class='nav-link'
                href='#'
                id='navbarDropdown'
                role='button'
                data-bs-toggle='dropdown'
                aria-expanded='false'
              >
              <i class='bi bi-person-fill'></i>
              </a>
              <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                <li><a class='dropdown-item' href='" . BASE_URL . "index.php?page=my_profile&module=pesanan&action=list'>My Profile</a></li>
                <li><a class='dropdown-item' href='" . BASE_URL . "logout.php'>Logout</a></li>
              </ul>
              </li>
              </ul>";
        } else {
          echo "<li class='nav-item'><a href='" . BASE_URL . "login.html'>Login</a></li>
                  <li class='nav-item'><a href='" . BASE_URL . "register.html'>Register</a></li>";
        }
        ?>
        <a href="<?php echo BASE_URL . "keranjang.html"; ?>" id='button-keranjang'>
          <span><i class='bi bi-cart-fill'></i></span>
        </a>

        <?php
        if ($totalBarang != 0) {
          echo "<span class='total-barang'>$totalBarang</span>";
        }
        ?>
      </div>
    </div>
  </nav>


  <?php

  $filename = "$page.php";
  if (file_exists($filename)) {
    include_once($filename);
  } else {
    include_once("main.php");
  }
  ?>

  <!-- Footer -->
  <div class="container-fluid pt-3 bg-color">
    <div class="row">
      <div class="col-lg-12">
        <p class="text-center pb-3 Copy">SSIP Information System</p>
      </div>
    </div>
  </div>


  <!-- Optional JavaScript-->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>
