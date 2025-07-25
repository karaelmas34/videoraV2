<?php require 'auth.php'; requireAuth();
$data = json_decode(file_get_contents("php://input"), true);
$file = basename($data['file']);
$label = $data['label'];
file_put_contents("../banners/$file.json", json_encode(["label"=>$label]));
echo "Etiket kaydedildi!";