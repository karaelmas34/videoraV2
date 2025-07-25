<?php
$url = $_GET['url'] ?? null;
$format = $_GET['format'] ?? 'mp4';

if (!$url) die("🎯 Video bağlantısı eksik!");

$cacheDir = 'cache/';
$safeName = uniqid('video_');
$downloadName = $safeName . '.' . $format;
$finalPath = $cacheDir . $downloadName;

// 🍪 Cookie dosyasını tanımla
$cookieFile = 'all_cookies.txt';

// Komut: Cookie ile, tüm codec destekli ve sabit formatta
$cmd = ($format === 'mp3')
  ? "yt-dlp --cookies $cookieFile -f bestaudio --extract-audio --audio-format mp3 -o \"$finalPath\" " . escapeshellarg($url)
  : "yt-dlp --cookies $cookieFile -f bestvideo+bestaudio --merge-output-format mp4 -o \"$finalPath\" " . escapeshellarg($url);

$output = shell_exec($cmd . ' 2>&1');
$fileExists = file_exists($finalPath);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>İndirme Sonucu</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script>
    function autoDelete(filePath) {
      setTimeout(() => {
        fetch('delete.php?file=' + encodeURIComponent(filePath));
      }, 5000);
    }
  </script>
</head>
<body>
  <div class="container">
    <h2>✅ Dosya Hazır (Cookie ile)</h2>
    <pre><?= htmlspecialchars($output) ?></pre>
    <?php if ($fileExists): ?>
      <p>
        <a href="<?= htmlspecialchars($finalPath) ?>" download onclick="autoDelete('<?= htmlspecialchars($finalPath) ?>')">
          📥 <?= htmlspecialchars($downloadName) ?> dosyasını indir
        </a>
      </p>
    <?php else: ?>
      <p>❌ Dosya oluşturulamadı. Cookie hatası olabilir.</p>
    <?php endif; ?>
  </div>
</body>
</html>