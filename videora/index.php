<?php
$theme = $_COOKIE['theme'] ?? 'light';
?>
<!DOCTYPE html>
<html lang="tr" class="<?= $theme ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Videora V2</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/theme-switch.js" defer></script>
</head>
<body>
  <!-- Tema Switch Butonu -->
  <div class="theme-toggle">
    <label>
      <input type="checkbox" id="toggle-theme" <?= $theme === 'dark' ? 'checked' : '' ?>>
      <span class="icons">
        <img src="assets/img/sun.png" alt="Güneş" class="sun">
        <img src="assets/img/moon.png" alt="Ay" class="moon">
      </span>
    </label>
  </div>

  <div class="container">
    <h1>🎬 Videora V2</h1>
    <p class="intro">Favori videonu MP3 ya da MP4 formatında indir!</p>

    <form action="download.php" method="get">
      <input type="text" name="url" placeholder="YouTube bağlantısı girin..." required>
      <select name="format">
        <option value="mp4">🎥 MP4 Video</option>
        <option value="mp3">🎵 MP3 Ses</option>
      </select>
      <button type="submit">📥 İndir</button>
    </form>

    <footer>
      <p>&copy; 2025 Videora | <a href="mailto:destek@videora.com">İletişim</a></p>
    </footer>
  </div>
</body>
</html>