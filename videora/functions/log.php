<?php
function logDownload($url, $format) {
  $log = "[" . date("Y-m-d H:i:s") . "] Format: $format | URL: $url\n";
  file_put_contents(__DIR__ . "/downloads.log", $log, FILE_APPEND);
}