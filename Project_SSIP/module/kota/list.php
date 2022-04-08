<div id="frame-tambah">
    <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=kota&action=form"; ?>" class="tombol-action">+ Tambah Kota</a>
</div>

<?php

$queryKota = mysqli_query($koneksi, "SELECT * from kota order by kota asc");

if (mysqli_num_rows($queryKota) == 0) {
    echo "<h5>Saat ini belum ada nama kota di dalam database</h5>";
} else {
    echo "<table class='table-list'>";

    echo "<tr>
            <th class='kiri'>No</th>
            <th class='tengah'>Kota</th>
            <th class='tengah'>Tarif</th>
            <th class='tengah'>Status</th>
            <th class='kanan'>Action</th>
    </tr>";

    $no = 1;
    while ($row = mysqli_fetch_assoc($queryKota)) {
        echo "<tr>
                <td class='kiri'>$no</td>
                <td class='tengah'>$row[kota]</td>
                <td class='tengah'>$row[tarif]</td>
                <td class='tengah'>$row[status]</td>
                <td class='kanan'>
                    <a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=kota&action=form&kota_id=$row[kota_id]'>Edit</a>
                </td>
        </tr>";
        $no++;
    }
    echo "</table>";
}
?>