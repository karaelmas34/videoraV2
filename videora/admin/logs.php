<form method="GET">
  Tarih Aralığı: 
  <input type="date" name="start"> - 
  <input type="date" name="end">
  <button type="submit">Filtrele</button>
</form>

<?php
$start = strtotime($_GET['start'] ?? '2000-01-01');
$end = strtotime($_GET['end'] ?? '3000-01-01');
$lines = file("../functions/downloads.log");

foreach ($lines as $line) {
  preg_match('/\[(.*?)\]/', $line, $match);
  $date = strtotime($match[1] ?? '');
  if ($date >= $start && $date <= $end) {
    echo htmlspecialchars($line) . "<br>";
  }
}
?>