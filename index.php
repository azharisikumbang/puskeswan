<?php 

session_start();

$page = $_GET['page'] ?? 'home';
$page = __DIR__ . '/pages/' . $page . '.php';

if (!file_exists($page)) {
	$page = 'not-found';
	$page = __DIR__ . '/pages/' . $page . '.php';
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Pusat Kesehatan Hewan</title>
        <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="./index.php">Pusat Kesehatan Hewan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <!-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="./index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Jadwal</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li> -->
                    </ul>
                    <form class="d-flex">
                        <?php if (isset($_SESSION['username'])) { ?>
                            <a href="./module.php?module=pengguna&action=logout" class="btn btn-light">Logout</a>
                        <?php } else { ?>
                            <a href="./index.php?page=login" class="btn btn-light">Login</a>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </nav>
        <?php require_once $page; ?>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Puskeswan Padang</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>