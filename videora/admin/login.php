<?php

//$allowed_ips = ['192.168.1.1', '85.100.200.34']; // kendi IP'lerini buraya gir
//$user_ip = $_SERVER['REMOTE_ADDR'];
//if (!in_array($user_ip, $allowed_ips)) {
//  die("Yetkisiz IP!");
//}

session_start();
if (isset($_GET['logout'])) {
  unset($_SESSION['admin']);
}
if ($_POST) {
  $user = $_POST['user'] ?? '';
  $pass = $_POST['pass'] ?? '';
  if ($user === 'admin' && $pass === '1234') {
    $_SESSION['admin'] = true;
    header('Location: dashboard.php');
    exit;
  } else {
    $error = "Hatalı giriş!";
  }
}
?>
<form method="POST">
  <h2>Admin Giriş</h2>
  <input name="user" placeholder="Kullanıcı Adı"><br>
  <input name="pass" type="password" placeholder="Şifre"><br>
  <button type="submit">Giriş Yap</button>
  <?= $error ?? '' ?>
</form>