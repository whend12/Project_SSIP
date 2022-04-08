<?php
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : false;

$button = "Update";

$queryUser = mysqli_query($koneksi, "SELECT * FROM user where user_id='$user_id'");

$row = mysqli_fetch_array($queryUser);

$nama = $row["nama"];
$email = $row["email"];
$phone = $row["phone"];
$alamat = $row["alamat"];
$status = $row["status"];
$level = $row["level"];

?>

<form action="<?php echo BASE_URL . "module/user/action.php?user_id=$user_id"; ?>" method="POST">

	<div class="form-login">
		<label class="form-label">Nama</label>
		<input type="text" required name="nama" value="<?php echo $nama; ?>" class="form-control">
	</div>
	<div class="form-login">
		<label class="form-label">Email</label>
		<input type="text" required name="email" value="<?php echo $email; ?>" class="form-control">
	</div>
	<div class="form-login">
		<label class="form-label">Phone</label>
		<input type="text" required name="phone" value="<?php echo $phone; ?>" class="form-control">
	</div>
	<div class="form-login">
		<label class="form-label">Alamat</label>
		<input type="text" required name="alamat" value="<?php echo $alamat; ?>" class="form-control">
	</div>
	<div class="form-login">
		<label class="form-label">Level</label>
		<input type="text" required name="level" value="<?php echo $level; ?>" class="form-control">
	</div>
	<div class="form-login">
		<label class="form-label">Status</label>
		<span>
			<input type="radio" name="status" value="on" <?php if ($status == "on") {
																echo "checked='true'";
															} ?> /> On
			<input type="radio" name="status" value="off" <?php if ($status == "off") {
																echo "checked='true'";
															} ?> /> Off
		</span>
	</div>

	<br>
	<input type="submit" name="button" value="<?php echo $button; ?>" class="btn btn-primary">
</form>