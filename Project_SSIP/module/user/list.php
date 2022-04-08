<?php

$queryUser = mysqli_query($koneksi, "SELECT * from user");

if (mysqli_num_rows($queryUser) == 0) {
	echo "<h3>Saat ini belum ada user</h3>";
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

	$no = 1;
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
}
