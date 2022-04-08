<div id="frame-tambah">
    <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=kategori&action=form"; ?>" class="tombol-action">+ Tambah Kategori</a>
</div>

<?php

$queryKategori = mysqli_query($koneksi, "SELECT * from kategori order by kategori asc");

if (mysqli_num_rows($queryKategori) == 0) {
    echo "<h5>Saat ini belum ada nama kategori di dalam database</h5>";
} else {
    echo "<table class='table-list'>";

    echo "<tr>
            <th class='kiri'>No</th>
            <th class='tengah'>Kategori</th>
            <th class='tengah'>Status</th>
            <th class='kanan'>Action</th>
    </tr>";

    $no = 1;
    while ($row = mysqli_fetch_assoc($queryKategori)) {
        echo "<tr>
                <td class='kiri'>$no</td>
                <td class='tengah'>$row[kategori]</td>
                <td class='tengah'>$row[status]</td>
                <td class='kanan'>
                    <a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=kategori&action=form&kategori_id=$row[kategori_id]'>Edit</a>
                </td>
        </tr>";
        $no++;
    }
    echo "</table>";
}
?>