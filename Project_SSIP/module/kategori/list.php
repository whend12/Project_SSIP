<?php
$search = isset($_GET['search']) ? $_GET['search'] : false;

$where = "";
$search_url = "";
if ($search) {
    $search_url = "&search=$search";
    $where = "WHERE kategori.kategori LIKE '%$search%'";
}
?>
<div id="frame-tambah">
    <div class="float-start py-2">
        <form action="<?php echo BASE_URL . "index.php"; ?>" method="GET">
            <input type="hidden" name="page" value="<?php echo $_GET["page"]; ?>" />
            <input type="hidden" name="module" value="<?php echo $_GET["module"]; ?>" />
            <input type="hidden" name="action" value="<?php echo $_GET["action"]; ?>" />
            <input type="text" name="search" value="<?php echo $search; ?>" />
            <input type="submit" value="Search">
        </form>
    </div>
    <div class="float-end">
        <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=kategori&action=form"; ?>" class="tombol-action">+ Tambah Kategori</a>
    </div>
</div>
<?php

$pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
$data_per_halaman = 3;
$mulai_dari = ($pagination - 1) * $data_per_halaman;

$queryKategori = mysqli_query($koneksi, "SELECT * from kategori $where limit $mulai_dari,$data_per_halaman");

if (mysqli_num_rows($queryKategori) == 0) {
    echo "<h5>Saat ini belum ada nama kategori di dalam database</h5>";
} else {
    echo "<table class='table-list'>";

    echo "<tr class='baris-title'>
            <th class='kiri'>No</th>
            <th class='tengah'>Kategori</th>
            <th class='tengah'>Status</th>
            <th class='tengah'>Action</th>
    </tr>";

    $no = 1 + $mulai_dari;
    while ($row = mysqli_fetch_assoc($queryKategori)) {
        echo "<tr>
                <td class='kiri'>$no</td>
                <td class='tengah'>$row[kategori]</td>
                <td class='tengah'>$row[status]</td>
                <td class='tengah'>
                    <a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=kategori&action=form&kategori_id=$row[kategori_id]'>Edit</a>
                    <a class='tombol-action' href='" . BASE_URL . "module/kategori/action.php?button=Delete&kategori_id=$row[kategori_id]'>Delete</a>
                </td>
        </tr>";
        $no++;
    }
    echo "</table>";

    $queryHitungKategori = mysqli_query($koneksi, "SELECT * from kategori $where");
    $url = "index.php?page=my_profile&module=kategori&action=list$search_url";
    pagination($queryHitungKategori, $data_per_halaman, $pagination, $url);
}
