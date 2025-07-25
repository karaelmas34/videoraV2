<?php
// Hedef video linki (istemciden alınabilir, sabit kalabilir)
$videoUrl = isset($_POST['video']) ? $_POST['video'] : null;

// Dosya alındı mı kontrolü
if (!isset($_FILES['cookie'])) {
    die("Cookie dosyası eksik!");
}

// Dosyayı geçici klasöre taşı
$cookiePath = __DIR__ . '/temp_cookie.txt';
move_uploaded_file($_FILES['cookie']['tmp_name'], $cookiePath);

// yt-dlp komutu
$cmd = 'yt-dlp --cookies ' . escapeshellarg($cookiePath) . ' -o "downloads/%(title)s.%(ext)s" ' . escapeshellarg($videoUrl);

// Komutu çalıştır ve çıktıyı al
$output = shell_exec($cmd . ' 2>&1');

// Cookie dosyasını sil → güvenlik
unlink($cookiePath);

// Sonucu göster
echo "<pre>$output</pre>";
?>