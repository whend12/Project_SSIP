<?php
$search = isset($_GET['search']) ? $_GET['search'] : false;

$where = "";
$search_url = "";
if ($search) {
	$search_url = "&search=$search";
	$where = "WHERE user.nama LIKE '%$search%'";
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
</div>
<?php
$pagination = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
$data_per_halaman = 5;
$mulai_dari = ($pagination - 1) * $data_per_halaman;

$queryUser = mysqli_query($koneksi, "SELECT * from user $where limit $mulai_dari,$data_per_halaman");

if (mysqli_num_rows($queryUser) == 0) {
	echo "<h3><br>Saat ini belum ada user</h3>";
} else {

	echo "<table class='table-list'>";

	echo "<tr class='baris-title'>
				<th class='kolom-nomor'>No</th>
				<th class='kiri'>Nama</th>
				<th class='kiri'>Email</th>
				<th class='kiri'>Phone</th>
				<th class='tengah'>Level</th>
				<th class='tengah'>Status</th>
				<th class='kanan'>Action</th>
			 </tr>";

	$no = 1 + $mulai_dari;
	while ($row = mysqli_fetch_assoc($queryUser)) {

		echo "<tr>
					<td class='kolom-nomor'>$no</td>
					<td class='kiri'>$row[nama]</td>
					<td class='kiri'>$row[email]</td>
					<td class='kiri'>$row[phone]</td>
					<td class='kiri'>$row[level]</td>
					<td class='tengah'>$row[status]</td>
					<td class='tengah'>
						<a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=user&action=form&user_id=$row[user_id]'>Edit</a>
					</td>
				  </tr>";

		$no++;
	}

	echo "</table>";

	$queryHitungUser = mysqli_query($koneksi, "SELECT * from user $where");
	$url = "index.php?page=my_profile&module=user&action=list$search_url";
	pagination($queryHitungUser, $data_per_halaman, $pagination, $url);
}
