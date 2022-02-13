<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connection = mysqli_connect('localhost', 'root', '', 'kesehatan');

if (mysqli_connect_errno()) {
	echo "Database error : " . mysqli_connect_error();
	exit();
}