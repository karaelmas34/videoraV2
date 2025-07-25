<?php
function ensure_directory($path) {
  if (!is_dir($path)) {
    mkdir($path, 0777, true);
  }
}

function sanitize_filename($name) {
  return preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $name);
}

function download_video($url) {
  // URL kontrolü
  if (!$url || !filter_var($url, FILTER_VALIDATE_URL)) {
    return ['error' => 'Geçersiz URL.'];
  }

  // Klasör hazırlanıyor
  $cacheDir = __DIR__ . '/../cache';
  ensure_directory($cacheDir);

  // Dummy veri (gerçek indirme entegre edilebilir)
  $filename = sanitize_filename('video_' . time() . '.mp4');
  $fullPath = "$cacheDir/$filename";

  $dummyData = 'video-data'; // Gerçek veri buraya gelecektir
  $writeResult = file_put_contents($fullPath, $dummyData);

  if ($writeResult === false) {
    return ['error' => 'Video dosyası yazılamadı.'];
  }

  // Log kaydı
  log_download($url, $filename);

  return ['success' => true, 'file' => 'cache/' . $filename];
}

function log_download($url, $filename) {
  require 'config.php';

  try {
    $stmt = $pdo->prepare("INSERT INTO downloads (url, filename) VALUES (:url, :filename)");
    $stmt->execute([
      ':url' => $url,
      ':filename' => $filename
    ]);
  } catch (PDOException $e) {
    // İsteğe bağlı: hata loglanabilir
  }
}