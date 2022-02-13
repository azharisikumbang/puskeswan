<?php 

if (isset($_SESSION['username'])) {
	$page = 'pemilik.php?page=index';
	if ($_SESSION['level'] == 'PETUGAS') {
		$page = 'admin.php?page=index';
	}

	header('Location: ' . $page); 
	exit();
}
?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
    	<div class="row">
    		<div class="mx-auto">
    			<?php if (isset($_GET['status'])): ?>
    				<div class="alert alert-danger" role="alert">
					  Gagal membuat akun, silahkan coba lagi.
					</div>
    			<?php endif ?>
    			<h5 class="text-center mb-5 fw-light fs-5">Daftarkan sebagai pemilik</h5>
    			<form action="./module.php?module=pengguna&action=register" method="post" class="container">
    				<div class="row">
    					<div class="col-sm">
							<div class="col-12 mb-3">
						      <label for="nama" class="form-label">Nama Lengkap</label>
						      <input type="text" name="nama" class="form-control" required="">
						    </div>
							<div class="col-12 mb-3">
						      <label for="nama" class="form-label">No Handphone </label>
						      <input type="text" name="kontak" class="form-control" required="">
						    </div>
							<div class="col-12 mb-3">
						      <label for="nama" class="form-label">Alamat</label>
						      <textarea name="alamat" class="form-control" required=""></textarea>
						    </div>
							<div class="col-12 mb-3">
						      	<div>
						      		<label for="nama" class="form-label">Jenis Kelamin</label>
						      	</div>
						      	<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="jenis_kelamin" value="1">
									<label class="form-check-label">Laki laki</label>
								</div>
						      	<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="jenis_kelamin" value="2">
									<label class="form-check-label">Perempuan</label>
								</div>
						    </div>
    					</div>
    					<div class="col-sm">	
		    				<div class="mb-3">
								<label class="form-label">Username Akun</label>
								<input type="text" name="username" class="form-control" required="">
							</div>
							<div class="mb-3">
								<label class="form-label">Password Akun</label>
								<input type="password" name="password" class="form-control" required="">
							</div>
							<div class="mb-3">
								<label class="form-label">Ulangi Password Akun</label>
								<input type="password" name="password_ulang" class="form-control" required="">
							</div>
    					</div>
    				</div>
					<div class="mb-3 text-center">
						<button type="submit" class="btn btn-danger w-100">Daftar</button>
					</div>
					<div class="text-center mb-3">
						<p>Sudah punya akun ? <a href="./index.php?page=login">Login disini.</a></p>
					</div>
				</form>
    		</div>
    	</div>
	</div>
</section>