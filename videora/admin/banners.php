<?php require 'auth.php'; requireAuth(); ?>
<link rel="stylesheet" href="style.css">
<h2>Banner Galerisi</h2>

<div id="gallery">
<?php
$banners = glob("../banners/*.{jpg,png,webp}", GLOB_BRACE);
foreach ($banners as $banner) {
  $name = basename($banner);
  $labelFile = "../banners/" . $name . ".json";
  $label = file_exists($labelFile) ? json_decode(file_get_contents($labelFile))->label : "Etiket Yok";
  echo "<div class='banner-block' id='b_$name'>";
  echo "<img src='$banner' onclick=\"showPreview('$banner')\" style='width:200px'><br>";
  echo "<small>$label</small><br>";
  echo "<button onclick=\"deleteBanner('$name')\">❌ Sil</button><br>";
  echo "<input type='text' id='label_$name' placeholder='Etiket gir' onchange=\"saveLabel('$name')\">";
  echo "</div>";
}
?>
</div