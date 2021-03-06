<?php 

session_start();

if (count($_SESSION) < 1) {
	header('Location: index.php?page=login'); 
	exit();
}

if ($_SESSION['level'] !== 'PEMILIK') {
	header('Location: index.php?page=login'); 
	exit();
}

$page = $_GET['page'] ?? 'index';
$page = __DIR__ . '/pages/pemilik/' . $page . '.php';

if (!file_exists($page)) {
	$page = 'not-found';
	$page = __DIR__ . '/pages/' . $page . '.php';
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Pusat Kesehatan Hewan Pariaman</title>
        <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="./bootstrap/css/style.css" rel="stylesheet" />
    </head>
    <body>
    	<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
		  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="./index.php">PUSKESWAN Pariaman</a>
		  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="navbar-nav">
		    <div class="nav-item text-nowrap">
		      <a class="nav-link px-3" href="./module.php?module=pengguna&action=logout">Keluar</a>
		    </div>
		  </div>
		</header>

		<div class="container-fluid">
			<div class="row">
				<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
			      <div class="position-sticky pt-3">
			        <ul class="nav flex-column">
			          <li class="nav-item">
			            <a class="nav-link active" aria-current="page" href="./pemilik.php">
			              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
			              Beranda
			            </a>
			          </li>
			          <li class="nav-item">
			            <a class="nav-link secondary" href="./pemilik.php?page=pendaftaran/index">
			              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file" aria-hidden="true"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
			              Pendaftaran
			            </a>
			          </li>
			          <li class="nav-item">
			            <a class="nav-link" href="./pemilik.php?page=jadwal/index">
			              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart" aria-hidden="true"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
			              Jadwal
			            </a>
			          </li>
			          <li class="nav-item">
			            <a class="nav-link" href="./pemilik.php?page=riwayat/index">
			              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart" aria-hidden="true"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
			              Riwayat
			            </a>
			          </li>
			          <li class="nav-item">
			            <a class="nav-link" href="./pemilik.php?page=akun/pengaturan">
			              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
			              Akun
			            </a>
			          </li>
			        </ul>
			      </div>
			    </nav>
			    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
			    	<?php require_once $page; ?>
			    </main>
			</div>
		</div>
        
        <!-- Bootstrap core JS-->
        <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>