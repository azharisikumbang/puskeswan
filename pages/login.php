<?php 

if (isset($_SESSION['username'])) {
	$page = 'member.php?page=index';
	if ($_SESSION['level'] == 'ADMIN') {
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
    		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto py-5">
    			<h5 class="text-center mb-5 fw-light fs-5">Masuk Ke Akun</h5>
    			<form action="./module.php?module=pengguna&action=login" method="post">
    				<div class="mb-3">
						<label class="form-label">Username</label>
						<input type="text" name="username" class="form-control" required="">
					</div>
					<div class="mb-3">
						<label class="form-label">Password</label>
						<input type="password" name="password" class="form-control" required="">
					</div>
					<div class="mb-3 text-center">
						<button type="submit" class="btn btn-danger w-100">Login</button>
					</div>
					<div class="text-center mb-3">
						<p>Belum punya akun ? <a href="./index.php?page=register">Daftar disini.</a></p>
					</div>
				</form>
    		</div>
    	</div>
	</div>
</section>