<?php require 'auth.php'; requireAuth(); ?>
<h2>Genel İstatistikler</h2>
<?php
$logFile = "../functions/downloads.log";
$lines = file($logFile);
$total = count($lines);
$mp3 = count(array_filter($lines, fn($l) => strpos($l, "mp3")));
$mp4 = $total - $mp3;
?>
<ul>
  <li>Toplam indirme: <?= $total ?></li>
  <li>MP3: <?= $mp3 ?></li>
  <li>MP4: <?= $mp4 ?></li>
</ul>