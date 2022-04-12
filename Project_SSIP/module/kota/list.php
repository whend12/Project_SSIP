<?php
$search = isset($_GET['search']) ? $_GET['search'] : false;

$where = "";
$search_url = "";
if ($search) {
    $search_url = "&search=$search";
    $where = "WHERE kota.kota LIKE '%$search%'";
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
        <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=kota&action=form"; ?>" class="tombol-action">+ Tambah Kota</a>
    </div>
</div>

<?php
$pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
$data_per_halaman = 3;
$mulai_dari = ($pagination - 1) * $data_per_halaman;

$queryKota = mysqli_query($koneksi, "SELECT * from kota $where limit $mulai_dari,$data_per_halaman");

if (mysqli_num_rows($queryKota) == 0) {
    echo "<h5>Saat ini belum ada nama kota di dalam database</h5>";
} else {
    echo "<table class='table-list'>";

    echo "<tr class='baris-title'>
            <th class='kiri'>No</th>
            <th class='tengah'>Kota</th>
            <th class='tengah'>Tarif</th>
            <th class='tengah'>Status</th>
            <th class='tengah'>Action</th>
    </tr>";

    $no = 1 + $mulai_dari;
    while ($row = mysqli_fetch_assoc($queryKota)) {
        echo "<tr>
                <td class='kiri'>$no</td>
                <td class='tengah'>$row[kota]</td>
                <td class='tengah'>$row[tarif]</td>
                <td class='tengah'>$row[status]</td>
                <td class='tengah'>
                    <a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=kota&action=form&kota_id=$row[kota_id]'>Edit</a>
                    <a class='tombol-action' href='" . BASE_URL . "module/kota/action.php?button=Delete&kota_id=$row[kota_id]'>Delete</a>    
                </td>
        </tr>";
        $no++;
    }
    echo "</table>";

    $queryHitungKota = mysqli_query($koneksi, "SELECT * from kota $where");
    $url = "index.php?page=my_profile&module=kota&action=list$search_url";
    pagination($queryHitungKota, $data_per_halaman, $pagination, $url);
}
?>