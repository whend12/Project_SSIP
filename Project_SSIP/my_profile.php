<?php

if ($user_id) {
    $module = isset($_GET['module']) ? $_GET['module'] : false;
    $action = isset($_GET['action']) ? $_GET['action'] : false;
    $mode = isset($_GET['mode']) ? $_GET['mode'] : false;
} else {
    header("location: " . BASE_URL . "index.php?page=login");
}

admin_only($module, $level);

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

<div id="bg-page-profile" class="container py-5 px-2">

    <div id="menu-profile">

        <ul>
            <?php
            if ($level == "admin") {
                ?>
                <li>
                    <a <?php if ($module == "kategori") {
                                echo "class='active'";
                            } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=kategori&action=list"; ?>">Kategori</a>
                </li>
                <li>
                    <a <?php if ($module == "barang") {
                                echo "class='active'";
                            } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=barang&action=list"; ?>">Barang</a>
                </li>
                <li>
                    <a <?php if ($module == "kota") {
                                echo "class='active'";
                            } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=kota&action=list"; ?>">Kota</a>
                </li>
                <li>
                    <a <?php if ($module == "user") {
                                echo "class='active'";
                            } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=user&action=list"; ?>">User</a>
                </li>
            <?php
            }
            ?>
            <li>
                <a <?php if ($module == "pesanan") {
                        echo "class='active'";
                    } ?> href="<?php echo BASE_URL . "index.php?page=my_profile&module=pesanan&action=list"; ?>">Pesanan</a>
            </li>
        </ul>

    </div>

    <div id="profile-content">
        <?php
        $file = "module/$module/$action.php";
        if (file_exists($file)) {
            include_once($file);
        } else {
            echo "<h3>Maaf, halaman tersebut tidak ditemukan</h3>";
        }
        ?>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>