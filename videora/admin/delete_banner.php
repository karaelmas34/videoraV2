<?php require 'auth.php'; requireAuth();
$file = basename($_POST['file'] ?? '');
$path = "../banners/" . $file;
if (file_exists($path)) {
  unlink($path);
  echo "OK";
} else {
  echo "Dosya bulunamadı";
}