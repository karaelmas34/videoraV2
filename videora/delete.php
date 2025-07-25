<?php
$file = $_GET['file'] ?? '';
if ($file && str_starts_with($file, 'cache/') && file_exists($file)) {
  unlink($file);
}
?>