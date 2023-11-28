<?php
// Mendapatkan jalur root proyek saat ini
$basePath = rtrim(dirname($_SERVER['PHP_SELF']), '/');

// Membuat URL lengkap ke public/index.php
$redirectUrl = $basePath . '/public/index.php';

// Melakukan redirect
header('Location: ' . $redirectUrl);
exit();
?>
