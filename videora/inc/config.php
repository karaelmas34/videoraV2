<?php
$host = 'localhost';
$dbname = 'videora_db';
$user = 'root';
$pass = '';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
} catch (PDOException $e) {
  die("DB bağlantı hatası: " . $e->getMessage());
}