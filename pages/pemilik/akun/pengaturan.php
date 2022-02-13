<?php 

$akun = require './modules/pengguna/single.php';

if (isset($_GET['status'])) {
	$message = 'Terjadi kesalahan ! Mohon untuk mencoba kembali.';
if ($_GET['status'] == 'success') {
		$message = 'Selamat ! Data akun berhasil diperbaharui.';
} ?>
<div class="alert alert-<?= $_GET['status'] ?> alert-dismissible fade show" role="alert">
  <span><?= $message ?></span>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<h4 class="mb-3">Pengaturan Akun</h4>

<form action="./module.php?module=pengguna&action=edit" method="post">
	<div class="row">
		<div class="col-sm">
			<div class="col-12 mb-3">
		      <label for="nama" class="form-label">Nama Lengkap</label>
		      <input type="text" name="nama" class="form-control" required="" value="<?= $akun['nama'] ?>">
		    </div>
			<div class="col-12 mb-3">
		      <label for="nama" class="form-label">No Handphone </label>
		      <input type="text" name="kontak" class="form-control" required="" value="<?= $akun['kontak'] ?>">
		    </div>
			<div class="col-12 mb-3">
		      <label for="nama" class="form-label">Alamat</label>
		      <textarea name="alamat" class="form-control"><?= $akun['alamat'] ?></textarea>
		    </div>
			<div class="col-12 mb-3">
		      	<div>
		      		<label for="nama" class="form-label">Jenis Kelamin</label>
		      	</div>
		      	<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="jenis_kelamin" value="1"<?= ($akun['jenis_kelamin'] == '1') ? 'checked=checked' : '' ?>>
					<label class="form-check-label">Laki laki</label>
				</div>
		      	<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="jenis_kelamin" value="2"<?= ($akun['jenis_kelamin'] == '2') ? 'checked=checked' : '' ?>>
					<label class="form-check-label">Perempuan</label>
				</div>
		    </div>
		</div>
		<div class="col-sm">	
			<div class="mb-3">
				<label class="form-label">Username Akun</label>
				<input type="text" name="username" class="form-control" required="" value="<?= $_SESSION['username'] ?>" disabled>
			</div>
			<div class="mb-3">
				<label class="form-label">Password Akun</label>
				<input type="password" name="password" class="form-control" required="">
			</div>
		</div>
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-success">Simpan</button>
	</div>
</form>