<?php
session_start();
function isLoggedIn() {
  return isset($_SESSION['admin']);
}
function requireAuth() {
  if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
  }
}